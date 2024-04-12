<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class SotrudnikMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не сотрудник, то редирект на страницу группы
        if (Auth::checkRole()) {
            app()->route->redirect('/mainik');
        }
    }
}