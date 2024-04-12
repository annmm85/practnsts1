<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'sotrudnik' => \Middlewares\SotrudnikMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'noAuth' => \Middlewares\NoAuthMiddleware::class,
    ]
];
