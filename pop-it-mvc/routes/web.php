<?php

use Src\Route;

Route::add('GET', '/users', [Controller\Site::class, 'users'])->middleware('auth', 'admin');
Route::add('GET', '/students', [Controller\Site::class, 'students'])->middleware('auth', 'sotrudnik');
Route::add('GET', '/search', [Controller\Site::class, 'search'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/create_disciplines', [Controller\Site::class, 'create_disciplines'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/groops', [Controller\Site::class, 'groops'])->middleware('auth', 'sotrudnik');
Route::add('GET', '/disciplines', [Controller\Site::class, 'disciplines'])->middleware('auth', 'sotrudnik');
Route::add('GET', '/grades', [Controller\Site::class, 'grades'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/discipline_groops', [Controller\Site::class, 'discipline_groops'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/create_students', [Controller\Site::class, 'create_students'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/create_groops', [Controller\Site::class, 'create_groops'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/create_bests', [Controller\Site::class, 'create_bests'])->middleware('auth', 'sotrudnik');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login'])->middleware('noAuth');
Route::add('GET', '/logout', [Controller\Site::class, 'logout'])->middleware('auth');
Route::add('GET', '/mainik', [Controller\Site::class, 'mainik']);
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup'])->middleware('auth', 'admin');









