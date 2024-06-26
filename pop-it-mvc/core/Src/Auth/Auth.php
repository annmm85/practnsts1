<?php

namespace Src\Auth;

use Src\Session;

class Auth
{
    //Свойство для хранения любого класса, реализующего интерфейс IdentityInterface
    private static IdentityInterface $user;

    //Инициализация класса пользователя
    public static function init(IdentityInterface $user): void
    {
        self::$user = $user;
        if (self::user()) {
            self::login(self::user());
        }
    }
    //Вход пользователя по модели
    public static function login(IdentityInterface $user): void
    {
        self::$user = $user;
        Session::set('id', self::$user->getId());
    }
    //Проверка является ли текущий пользователь аутентифицированным
    public static function check(): bool
    {
        if (self::user()) {
            return true;
        }
        return false;
    }
//
//    public static function checkApiRole(): bool
//    {
//        $userRole = self::user()::where('id', '=', self::user()['id'])->first()->role_id;
//        if ($userRole === 4) return true;
//        else return false;
//    }

    public static function checkToken(): bool
    {
        if (self::user()->token) {
            return true;
        }
        return false;
    }

    public static function checkRole(): bool
    {
        $userRole = self::user()::where('id', '=', $_SESSION['id'])->first()->role_id;
        if ($userRole === 4) return true;
        else return false;
    }

    //Возврат текущего аутентифицированного пользователя
    public static function user()
    {
        $id = Session::get('id') ?? 0;
        return self::$user->findIdentity($id);
    }

    //Выход текущего пользователя
    public static function logout(): bool
    {
        Session::clear('id');
        return true;
    }

    //Генерация нового токена для CSRF
    public static function generateCSRF(): string
    {
        $token = md5(time());
        Session::set('csrf_token', $token);
        return $token;
    }

    //Аутентификация пользователя и вход по учетным данным
    public static function attempt(array $credentials): bool
    {
        if ($user = self::$user->attemptIdentity($credentials)) {
            self::login($user);
            return true;
        }
        return false;
    }

}
