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
    ],
    'validators' => [
        'required' => \Validatecollect\Validators\RequireValidator::class,
        'unique' => \Validatecollect\Validators\UniqueValidator::class,
        'uniq' => \Validatecollect\Validators\UniqValidator::class,
        'number' => \Validatecollect\Validators\NumberValidator::class,
        'language' => \Validatecollect\Validators\LanguageValidator::class,
        'dater' => \Validatecollect\Validators\DaterValidator::class,
    ],
    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        //'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],
];
