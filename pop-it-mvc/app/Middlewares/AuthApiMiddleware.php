<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class AuthApiMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не зашел, то вывод ошибки
        if (!Auth::checkToken()) {
            (new View())->toJSON(['message' => 'Вы не зашли'], 401);
        }
    }
}