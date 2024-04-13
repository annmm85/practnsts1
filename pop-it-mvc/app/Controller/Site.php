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

    public function create_bests(Request $request): string
    {
        if ($request->method === 'POST') {
            if ($_FILES) {
                if (move_uploaded_file($_FILES['image']['tmp_name'],
                    'uploads/' . $_FILES['image']['name'])) {
                    echo 'Файл успешно загружен';
                } else {
                    echo 'Ошибка загрузки файла';
                }
            }
            if (Bests::create( ['name'=>$request->name, 'image' => 'uploads/' . $_FILES['image']['name']])) {
                app()->route->redirect('/mainik');
            }
        }
        return new View('site.create_bests');
    }
    public function disciplines(Request $request): string
    {
        $courses = Courses::all();
        $semesters = Semesters::all();

        if ($request->get('course_id')) {
            $ff=$request->get('course_id');
            $findDisciplines = Disciplines::where(['course_id' => $request->get('course_id')])->get();
            $ll=['ff' => $ff,'findDisciplines' => $findDisciplines] ;
            if ($request->get('semester_id')) {
                $findDisciplines = Disciplines::where(['course_id' => $request->get('course_id'), 'semester_id' => $request->semester_id])->get();
                $ll=['findDisciplines' => $findDisciplines] ;
            }
        } else {
            $findDisciplines = Disciplines::all();
            $ll=['findDisciplines' => $findDisciplines] ;
        }

        return (new View())->render('site.disciplines', ['ll' => $ll, 'courses' => $courses, 'semesters' => $semesters]);
    }


    public function search(Request $request): string
    {
        $s = $request->get('s');
        $findDisciplines = Disciplines::where('name', 'like', "%{$s}%")->get();
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
                app()->route->redirect('/students');
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
        if ($request->method === 'POST' && Disciplines::create($request->all())) {
            app()->route->redirect('/disciplines');
        }
        return new View('site.create_disciplines', ['courses' => $courses]);
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
                $disciplines = Disciplines::all();
                $studentik = $request->get('student_id');
                $stud = Students::where('id', $request->get('student_id'))->get();
                if ($request->method === 'POST' && Grades::create($request->all())) {
                    app()->route->redirect('/students');
                }
                $gro = ['groops' => $groops, 'students' => $students, 'idgr' => $idgr, 'studentik' => $studentik, 'stud' => $stud, 'disciplines' => $disciplines];
            }
        } else {
            $groops = Groops::all();
            $studentik = null;
            $gro = ['groops' => $groops, 'studentik' => $studentik];
        }

        return (new View())->render('site.groops', ['gro' => $gro]);
    }
    public function grades(Request $request): string
    {
        $disciplines = Disciplines::all();
        $groops = Groops::all();

        if ($request->get('discipline_groop_id')) {
            $ff=$request->get('discipline_groop_id');
            $findGrades = Grades::where(['discipline_groop_id' => $request->get('discipline_groop_id')])->get();
            $ll=['ff' => $ff,'findGrades' => $findGrades] ;
            if ($request->get('groop_id')) {
                $findGrades = Grades::where(['discipline_groop_id' => $request->get('discipline_groop_id'), 'groop_id' => $request->groop_id])->get();
                $ll=['findGrades' => $findGrades] ;
            }
        }else {
            $findGrades = Grades::all();
            $ll=['findGrades' => $findGrades] ;
        }
        return (new View())->render('site.grades', ['ll' => $ll, 'groops' => $groops, 'disciplines' => $disciplines]);
    }

    public function mainik(Request $request): string
    {
        $bests = Bests::all();
        return (new View())->render('site.mainik', ['bests' => $bests]);
    }


}
