<h1>Дисциплины</h1>

<a href="<?= app()->route->getUrl('/disciplines') ?>">Все дисциплины</a>

<h3>Курсы</h3>
<?php

echo '<ol>';
foreach ($findDisciplines as $dis) {
    echo '<li>' . '<a href="/pop-it-mvc/disciplines?course_id=' . $dis->course_id. '">' . $dis->course_id. '</a>' . '</li>';
}
echo '</ol>';
?>

<h3>Семестры</h3>
<ol>
    <li>1</li>
    <li>2</li>
</ol>

<?php
if ($findDisciplines) {
    foreach ($findDisciplines as $dis) {
        echo '<li>' . $dis->name . '</li>';
    }
}
?>
<div><a href="/pop-it-mvc/create_disciplines">Добавить дисциплину</a></div>

