<?php

use Model\User;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class SiteTest extends TestCase
{
    #[DataProvider('additionProvider')]
    public function testSignup(string $httpMethod, array $userData, string $message): void
    {
        //Выбираем занятый логин из базы данных
        if ($userData['login'] === 'lim') {
            $userData['login'] = User::get()->first()->login;
        }

        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Site())->signup($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли пользователь в базу данных
        $this->assertTrue((bool)User::where('login', $userData['login'])->count());
        //Удаляем созданного пользователя из базы данных
        User::where('login', $userData['login'])->delete();
//
//        //Проверяем редирект при успешной регистрации
//        $this->assertContains($message, xdebug_get_headers());
    }


//Метод, возвращающий набор тестовых данных
    public static function additionProvider(): array
    {
        return [
            ['GET', ['name' => '', 'login' => '', 'password' => '', 'role_id' => '1'],
                '<h3></h3>'
            ],
            ['POST', ['name' => '', 'login' => '', 'password' => '', 'role_id' => '1'],
                '<h3>{"name":["Поле name пусто"],"login":["Поле login пусто"],"password":["Поле password пусто"]}</h3>',
            ],
            ['POST', ['name' => 'админ', 'login' => 'lim', 'password' => 'admin123', 'role_id' => '1'],
                '<h3>{"login":["Поле login должно быть уникально"]}</h3>',
            ],
            ['POST', ['name' => 'admin', 'login' => md5(time()), 'password' => 'admin123', 'role_id' => '1'],
                '<h3>{"name":["Поле name должно содержать только кириллицу"]}</h3>',
            ],
            ['POST', ['name' => 'админ', 'login' => md5(time()), 'password' => '123', 'role_id' => '1'],
                '<h3>{"password":["Поле password должно содержать буквы"]}</h3>',
            ],
            ['POST', ['name' => 'админ', 'login' => md5(time()), 'password' => 'admin123', 'role_id' => '1'],
                '<h3></h3>'
            ],
        ];
    }
    //Настройка конфигурации окружения
    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';

       //Создаем экземпляр приложения
       $GLOBALS['app'] = new Src\Application(new Src\Settings([
           'app' => include $_SERVER['DOCUMENT_ROOT'] . '/pop-it-mvc/config/app.php',
           'db' => include $_SERVER['DOCUMENT_ROOT'] . '/pop-it-mvc/config/db.php',
           'path' => include $_SERVER['DOCUMENT_ROOT'] . '/pop-it-mvc/config/path.php',
       ]));

       //Глобальная функция для доступа к объекту приложения
       if (!function_exists('app')) {
           function app()
           {
               return $GLOBALS['app'];
           }
       }
    }
}
