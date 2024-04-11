<h1>Список студентов</h1>
<ol>
    <?php
    foreach ($students as $student) {
        echo '<li>'. $student->surname . " " . $student->name .  " " . $student->patronymic .'</li>';
    }
    ?>
</ol>
<div><a href="/pop-it-mvc/create_students">Добавить студента</a></div>