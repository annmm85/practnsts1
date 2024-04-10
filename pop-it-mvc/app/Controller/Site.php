<?php

namespace Controller;

use Src\View;
use Src\Request;
use Src\Auth\Auth;

use Model\User;
use Model\Students;
use Model\Groops;
use Model\Disciplines;
use Model\Roles;
use Model\Discipline_groops;


class Site
{
    public function students(Request $request): string
    {
        $students = Students::all();
        return (new View())->render('site.students', ['students' => $students]);
    }

    public function groops(Request $request): string
    {
        if ($request->get('id')){
            $students = Students::where('groop_id', $request->id)->get();
            $groops = Groops::where('id', $request->id)->get();
        }else{
        $groops = Groops::all();
        }
        return (new View())->render('site.groops', ['groops' => $groops, 'students' => $students]);
    }
    public function disciplines(Request $request): string
    {
        $disciplines = Disciplines::all();
        return (new View())->render('site.disciplines', ['disciplines' => $disciplines]);
    }
    public function users(Request $request): string
    {
        $users = Students::all();
        return (new View())->render('site.users', ['users' => $users]);
    }
    public function discipline_groops(Request $request): string
    {   $disciplines = Disciplines::all();
        $groops = Groops::all();
        if ($request->method === 'POST' && Discipline_groops::create($request->all())) {
            app()->route->redirect('/groops');
        }
        return new View('site.discipline_groops', ['groops' => $groops, 'disciplines' => $disciplines]);
    }
    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/login');
        }
        return new View('site.signup');
    }
    public function roles(Request $request): string
    {
        if ($request->method === 'POST' && Roles::create($request->all())) {
            app()->route->redirect('/login');
        }
        return new View('site.roles');
    }
    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/students');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

}
