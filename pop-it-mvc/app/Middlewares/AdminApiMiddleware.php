<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class AdminApiMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь не админ, то вывод ошибки
        if (!Auth::checkApiRole()) {
            (new View())->toJSON(['message' => 'Вы не администратор'], 401);
        }
    }
}