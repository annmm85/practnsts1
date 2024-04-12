<?php

use Src\Route;

Route::add('GET', '/users', [Controller\Site::class, 'users'])->middleware('auth', 'admin');
Route::add('GET', '/students', [Controller\Site::class, 'students'])->middleware('auth','sotrudnik');
Route::add(['GET', 'POST'], '/create_disciplines', [Controller\Site::class, 'create_disciplines'])->middleware('auth','sotrudnik');
Route::add('GET', '/groops', [Controller\Site::class, 'groops'])->middleware('auth','sotrudnik');
Route::add('GET', '/disciplines', [Controller\Site::class, 'disciplines'])->middleware('auth','sotrudnik');











