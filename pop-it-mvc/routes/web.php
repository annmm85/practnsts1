<?php

use Src\Route;

Route::add('GET', '/students', [Controller\Site::class, 'students'])->middleware('auth');
Route::add('GET', '/groops', [Controller\Site::class, 'groops'])->middleware('auth');
Route::add('GET', '/users', [Controller\Site::class, 'users'])->middleware('auth');
Route::add('GET', '/disciplines', [Controller\Site::class, 'disciplines'])->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/discipline_groops', [Controller\Site::class, 'discipline_groops']);
Route::add(['GET', 'POST'], '/create_students', [Controller\Site::class, 'create_students']);
Route::add(['GET', 'POST'], '/roles', [Controller\Site::class, 'roles']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
