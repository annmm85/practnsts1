<?php
if (count($groops)==1){
    foreach ($groops as $groop) {
        echo '<h1>'. $groop->name.'группа</h1>';
        echo '<h2>Студенты</h2>';
        foreach ($students as $student) {
            echo '<li>'. $student->surname . " " . $student->name .  " " . $student->patronymic .'</li>';
        }
    }
}else{
    echo '<h1> Все группы </h1>';
    echo '<ol>';
    foreach ($groops as $groop) {
        echo '<li>'.'<a href="/pop-it-mvc/groops?id=' . $groop->id . '">' . $groop->name .'</a>'.'</li>';
    }
    echo '</ol>';
}
?>
<div>
    <a href="<?= app()->route->getUrl('/discipline_groops') ?>">Прикрепить дисциплину</a>
</div>
