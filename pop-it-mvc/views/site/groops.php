<div><a href="<?= app()->route->getUrl('/groops') ?>">Все группы</a></div>
<?php
if ($gro['studentik']){

    echo'<form method="post">';
    echo '<label><input type="text" name="student_id" value="'. $gro['studentik'] .'"/></label>';
    echo '<label>Введите оценку<input type="text" name="mark"></label>';
    echo'<div>';
    echo  ' <label for="discipline_groop_id">Выберите дисциплину группы:</label>';
    echo '<select name="discipline_groop_id" id="discipline_groop_id">';
    echo '<option value="">-Выберите дисциплину-</option>';
    foreach ($gro['disciplines'] as $discipline) {
        echo '<option value="'. $discipline->id. '">' .$discipline->name. '</option>';
    }
    echo '</select>';
    echo '</div>';
    echo  '<button>Выставить оценку</button>';
    echo'</form>';
}
if (count($gro['groops'])==1){
    foreach ($gro['groops'] as $groop) {
        echo '<h1>'. $groop->name.'группа</h1>';
        echo '<h2>Студенты</h2>';
        foreach ($gro['students'] as $student) {
            echo '<li>'. $student->surname . " " . $student->name .  " " . $student->patronymic .'</li>';
            echo '<div><a href="/pop-it-mvc/groops?id='. $gro['idgr'] . '&student_id='.$student->id.'">Выставить оценку</a></div>';
        }
        echo '<div><a href="/pop-it-mvc/create_students">Добавить студента</a></div>';
    }
}
if(count($gro['groops'])>1){
    echo '<h1> Все группы </h1>';
    echo '<ol>';
    foreach ($gro['groops'] as $groop) {
        echo '<li>'.'<a href="/pop-it-mvc/groops?id=' . $groop->id . '">' . $groop->name .'</a>'.'</li>';
    }
    echo '</ol>';
}
?>
<div><a href="/pop-it-mvc/create_groops">Добавить сотрудника</a></div>
<div>
    <a href="<?= app()->route->getUrl('/discipline_groops') ?>">Прикрепить дисциплину</a>
</div>
