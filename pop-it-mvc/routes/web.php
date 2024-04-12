<?php

use Src\Route;

Route::add('GET', '/users', [Controller\Site::class, 'users'])->middleware('auth', 'admin');
Route::add('GET', '/students', [Controller\Site::class, 'students'])->middleware('auth','sotrudnik');