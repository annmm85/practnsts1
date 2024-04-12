<?php

namespace Controller;

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


class Site
{
    public function students(Request $request): string
    {
        $students = Students::all();
        return (new View())->render('site.students', ['students' => $students]);
    }

    public function groops(Request $request): string
    {
        if ($request->get('id')) {
            $idgr=$request->get('id');
            $students = Students::where('groop_id', $request->id)->get();
            $groops = Groops::where('id', $request->id)->get();
            $studentik=null;
            $gro=['groops' => $groops, 'students' => $students, 'idgr' => $idgr,'studentik' => $studentik];
            if ($request->get('student_id')){
                $disciplines = Disciplines::all();
                $studentik=$request->get('student_id');
                $stud=Students::where('id', $request->get('student_id'))->get();
                if ($request->method === 'POST' && Grades::create($request->all())) {
                    app()->route->redirect('/students');
                }
                $gro = ['groops' => $groops,'students' => $students, 'idgr' => $idgr,'studentik' => $studentik,'stud' =>$stud, 'disciplines' => $disciplines ];
            }
        }else{
            $groops = Groops::all();
            $studentik=null;
            $gro=['groops' => $groops,'studentik' => $studentik];
        }

        return (new View())->render('site.groops', ['gro' => $gro]);
    }
    public function grades(Request $request): string
    {
        $groops = Groops::all();
        $disciplines=Disciplines::all();
        $grades=Grades::all();
        $students = Students::all();
        return (new View())->render('site.grades', ['groops' => $groops, 'students' => $students,'disciplines' => $disciplines ]);
    }

    public function disciplines(Request $request): string
    {
        if ($request->get('course_id')) {
                $findDisciplines = Disciplines::where(['course_id' => $request->course_id])->get();
            }else{
                $findDisciplines = Disciplines::all();
            }
        return (new View())->render('site.disciplines', ['findDisciplines' => $findDisciplines]);
    }
    public function create_disciplines(Request $request): string
    {   $courses=Courses::all();
        if ($request->method === 'POST' && Disciplines::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.create_disciplines', ['courses' => $courses]);
    }
    public function create_groops(Request $request): string
    {
        if ($request->method === 'POST' && Groops::create($request->all())) {
            app()->route->redirect('/groops');
        }
        return new View('site.create_groops');
    }
    public function create_students(Request $request): string
    {   $groops = Groops::all();
        if ($request->method === 'POST' && Students::create($request->all())) {
            app()->route->redirect('/students');
        }
        return new View('site.create_students',['groops' => $groops]);
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
    public function mainik(Request $request): string
    {
        return new View('site.mainik');
    }
    public function signup(Request $request): string
    {   $roles = Roles::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/users');
        }
        return new View('site.signup',['roles' => $roles]);
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

}
