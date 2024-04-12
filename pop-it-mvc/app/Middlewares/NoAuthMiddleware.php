<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class NoAuthMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь авторизован, то редирект на страницу входа
        if (Auth::check()) {
            app()->route->redirect('/mainik');
        }
    }
}