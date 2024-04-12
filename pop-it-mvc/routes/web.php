<?php

use Src\Route;

Route::add('GET', '/users', [Controller\Site::class, 'users'])->middleware('auth', 'admin');
