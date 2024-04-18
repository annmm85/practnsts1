<?php

use Model\Students;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CreateStudentsTest extends TestCase
{
    #[DataProvider('additionProvider')]
    public function testCreateStudents(string $httpMethod, array $studentsData, string $message): void
    {

        // Создаем заглушку для класса Request.
        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($studentsData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Site())->create_students($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли студент в базу данных
        $this->assertTrue((bool)Students::where(['name' => $request->get('name'), 'birthdate' => $request->get('birthdate'),'groop_id' => $request->get('groop_id')]));
        //Удаляем созданного пользователя из базы данных
        Students::where(['name' => $request->get('name'), 'birthdate' => $request->get('birthdate'),'groop_id' => $request->get('groop_id')])->delete();
    }

//Метод, возвращающий набор тестовых данных
    public static function additionProvider(): array
    {
        return [
            ['GET', ['surname' => '', 'name' => '', 'patronymic' => '', 'birthdate' => '', 'adress' => '', 'groop_id' => '1'],
                '<h3></h3>'
            ],
            ['POST', ['surname' => '', 'name' => '', 'patronymic' => '', 'birthdate' => '', 'adress' => '', 'groop_id' => '1'],
                '<h3>{"surname":["Поле surname пусто"],"name":["Поле name пусто"],"birthdate":["Поле birthdate пусто"],"adress":["Поле adress пусто"]}</h3>',
            ],
            ['POST', ['surname' => 'Иванов', 'name' => 'Арсений', 'patronymic' => 'Михайлович', 'birthdate' => '2052-07-22', 'adress' => 'Томск', 'groop_id' => '1'],
                '<h3>{"birthdate":["Поле birthdate должно быть позже текущей даты"]}</h3>',
            ],
            ['POST', ['surname' => 'Ivanov', 'name' => 'Ivan', 'patronymic' => 'Olegovich', 'birthdate' => '2002-07-22', 'adress' => 'Tomsk', 'groop_id' => '1'],
                '<h3>{"surname":["Поле surname должно содержать только кириллицу"],"name":["Поле name должно содержать только кириллицу"],"patronymic":["Поле patronymic должно содержать только кириллицу"],"adress":["Поле adress должно содержать только кириллицу"]}</h3>',
            ],
            ['POST', ['surname' => 'Иванов', 'name' => 'Арсений', 'patronymic' => 'Михайлович', 'birthdate' => '2002-07-22', 'adress' => 'Томск', 'groop_id' => '1'],
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
