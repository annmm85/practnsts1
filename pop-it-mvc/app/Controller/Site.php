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
            $gro=['groops' => $groops, 'students' => $students, 'idgr' => $idgr];
            if ($request->get('student_id')){
                $disciplines = Disciplines::all();
                $studentik=$request->get('student_id');
                if ($request->method === 'POST' && Grades::create($request->all())) {
                    app()->route->redirect('/students');
                }
                $gro = ['groops' => $groops,'students' => $students, 'idgr' => $idgr,'studentik' => $studentik, 'disciplines' => $disciplines ];
            }
        }else{
            $groops = Groops::all();
            $gro=['groops' => $groops];
        }

        return (new View())->render('site.groops', ['gro' => $gro]);
    }
    public function grades(Request $request): string
    {
        $groops = Groops::all();
        $disciplines=Disciplines::all();

        if ($request->get('discipline_id')&&$request->get('groop_id')){
            $findgr = Discipline_groops::where(['groop_id' => $request->groop_id])->get();
            $finddisc = Discipline_groops::where(['discipline_id' => $request->discipline_id])->get();
            $grades=Grades::where(['discipline_groop_id' => $findgr->id])->get();
            $grad=Grades::where(['discipline_groop_id' => $finddisc->id])->get();
            $rew=array_merge($grades,$grad);
            $gro=['rew' => $rew];
        }else{
             if ($request->get('groop_id')){
                 $findgr = Discipline_groops::where(['groop_id' => $request->groop_id])->get();
                 $grades=Grades::where(['discipline_groop_id' => array_keys($findgr)])->get();
                 $gro=['grades' => $grades];
             } else if ($request->get('discipline_id')) {
                 $finddisc = Discipline_groops::where(['discipline_id' => $request->discipline_id])->get();
                 $grad=Grades::where(['discipline_groop_id' => array_keys($finddisc)])->get();
                 $gro=['grad' => $grad];
             }
        }
        return (new View())->render('site.grades', ['gro' => $gro,'groops' => $groops,'disciplines' => $disciplines ]);
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

    public function signup(Request $request): string
    {   $roles = Roles::all();
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/login');
        }
        return new View('site.signup',['roles' => $roles]);
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
        app()->route->redirect('/login');
    }

}
