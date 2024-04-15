<?php

namespace Controller;


use Src\Validator\Validator;

use Model\Courses;
use Model\Grades;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

use Model\User;
use Model\Students;
use Model\Groops;
use Model\Disciplines;
use Model\Roles;
use Model\Discipline_groops;
use Model\Bests;
use Model\Semesters;

class Site
{
    public function students(Request $request): string
    {
        $students = Students::all();
        return (new View())->render('site.students', ['students' => $students]);
    }


    public function create_groops(Request $request): string
    {
        if ($request->method === 'POST' && Groops::create($request->all())) {
            app()->route->redirect('/groops');
        }
        return new View('site.create_groops');
    }

    public function create_students(Request $request): string
    {
        $groops = Groops::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'birthdate' => ['dater']
            ], [
                'dater' => 'Дата в поле :field некорректна'
            ]);


            if ($validator->fails()) {
                return new View('site.create_students',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (Students::create($request->all())) {
                app()->route->redirect('/groops?id='.$request->get('groop_id').'/');
            }
        }
        return new View('site.create_students', ['groops' => $groops]);
    }

    public function signup(Request $request): string
    {
        $roles = Roles::all();
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required', 'language'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required', 'number']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'number' => 'Поле :field должен содержать буквы',
                'language' => 'Поле :field должен содержать только кириллицу'
            ]);


            if ($validator->fails()) {
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/users');
            }
        }
        return new View('site.signup', ['roles' => $roles]);
    }

    public function create_disciplines(Request $request): string
    {
        $courses = Courses::all();
        $semesters = Semesters::all();
        if ($request->method === 'POST' && Disciplines::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.create_disciplines', ['courses' => $courses, 'semesters' => $semesters ]);
    }

    public function users(Request $request): string
    {
        $users = Students::all();
        return (new View())->render('site.users', ['users' => $users]);
    }

    public function discipline_groops(Request $request): string
    {
        $disciplines = Disciplines::all();
        $groops = Groops::all();
        if ($request->method === 'POST' && Discipline_groops::create($request->all())) {
            app()->route->redirect('/groops');
        }
        return new View('site.discipline_groops', ['groops' => $groops, 'disciplines' => $disciplines]);
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/mainik');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/login');
    }

    public function groops(Request $request): string
    {
        if ($request->get('id')) {
            $idgr = $request->get('id');
            $students = Students::where('groop_id', $request->id)->get();
            $groops = Groops::where('id', $request->id)->get();
            $studentik = null;
            $gro = ['groops' => $groops, 'students' => $students, 'idgr' => $idgr, 'studentik' => $studentik];
            if ($request->get('student_id')) {
                $disciplines = Discipline_groops::where('groop_id', $request->id)->get();
                $discip= Disciplines::all();
                $studentik = $request->get('student_id');
                $stud = Students::where('id', $request->get('student_id'))->get();
                $gro = ['disciplines' => $disciplines,'discip' => $discip,'groops' => $groops, 'students' => $students, 'idgr' => $idgr, 'studentik' => $studentik, 'stud' => $stud];
            }
        } else {
            $groops = Groops::all();
            $studentik = null;
            $gro = ['groops' => $groops, 'studentik' => $studentik];
        }
        if ($request->method === 'POST' && Grades::create($request->all())) {
            app()->route->redirect('/grades/');
        }
        return (new View())->render('site.groops', ['gro' => $gro]);
    }

    public function grades(Request $request): string
    {
        $grades = Grades::all();
        $disciplines = Disciplines::all();
        $dgr = Discipline_groops::all();
        $groops = Groops::all();
        $students = Students::all();
        $finreq = $request->get('discipline_id');
        $finreqgr = $request->get('groop_id');
        
        return (new View())->render('site.grades', ['finreq' => $finreq,'finreqgr' => $finreqgr,'groops' => $groops, 'disciplines' => $disciplines,'grades' => $grades,'dgr' => $dgr,'students' => $students]);
    }

    public function mainik(Request $request): string
    {
        $bests = Bests::all();
        return (new View())->render('site.mainik', ['bests' => $bests]);
    }


}
