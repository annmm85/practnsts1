<?php

use Src\Route;

Route::add('GET', '/', [Controller\Api::class, 'index']);
Route::add('POST', '/login', [Controller\Api::class, 'login']);
Route::add('POST', '/logout', [Controller\Api::class, 'logout']);
Route::add('POST', '/signup', [Controller\Api::class, 'signup']);
Route::add('POST', '/echo', [Controller\Api::class, 'echo']);
