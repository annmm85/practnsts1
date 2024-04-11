<h1>Успеваемость</h1>


<h3>Группы</h3>
<?php

echo '<ol>';
foreach ($groops as $gr) {
    echo '<li>' . '<a href="/pop-it-mvc/grades?groop_id=' . $gr->id. '">' . $gr->name. '</a>' . '</li>';
}
echo '</ol>';
?>

<h3>Дисциплину</h3>
<?php

echo '<ol>';
foreach ($disciplines as $ds) {
    echo '<li>' . '<a href="/pop-it-mvc/grades?discipline_id=' . $ds->id. '">' . $ds->name. '</a>' . '</li>';
}
echo '</ol>';
?>

<?php
if ($findDisciplines) {
    foreach ($findDisciplines as $dis) {
        echo '<li>' . $dis->name . '</li>';
    }
}
?>
<div><a href="/pop-it-mvc/create_disciplines">Добавить дисциплину</a></div>

