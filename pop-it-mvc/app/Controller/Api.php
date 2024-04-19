<?php

namespace Controller;

use Model\Bests;
use Model\User;
use Src\Auth\Auth;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class Api
{

    public function index(): void
    {
        $bests = Bests::all()->toArray();

        (new View())->toJSON($bests);
    }
    public function login(Request $request):void
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = md5(time());
            $user->save();
            (new View())->toJSON(['token' => $user->token], 200);
        }
        (new View())->toJSON(['message' => 'Something went wrong'], 401);
    }

    public function signup(Request $request)
    {
        $validator = new Validator($request->all(), [
            'name' => ['required','language'],
            'login' => ['required', 'unique:users,login'],
            'password' => ['required', 'number']
        ], [
            'required' => 'Поле :field пусто',
            'unique' => 'Поле :field должно быть уникально',
            'language' => 'Поле :field должно содержать только кириллицу',
            'number' => 'Поле :field должно содержать буквы',
        ]);
        if ($validator->fails()) {
            (new View())->toJSON(['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)], 401);
        }

        if (User::create($request->all())) {
            $users = User::where('login', $request->login)->get();
            (new View())->toJSON($users->toArray());
        }

        (new View())->toJSON(['message' => 'Something went wrong'], 401);
    }

    public function echo(Request $request): void
    {
        (new View())->toJSON($request->all());
    }

    public function logout(Request $request)
    {
        $credentials = $request->all();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = '';
            $user->save();
            (new View())->toJSON(['message' => 'Вы успешно вышли'], 200);
        }
    }
}
