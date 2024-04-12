<h1 class="block-title">Успеваемость</h1>

<div  class="filtermainblock">
<div class="filterblock">
<h3 class="block-title">Группы</h3>

<?php

echo '<ol class="olioli">';
foreach ($groops as $gr) {
    echo '<li>' . '<a class="filterelem" href="/pop-it-mvc/grades?groop_id=' . $gr->id. '">' . $gr->name. '</a>' . '</li>';
}
echo '</ol>';
?>
</div>
<div class="filterblock">
<h3 class="block-title">Дисциплину</h3>
<?php

echo '<ol class="olioli">';
foreach ($disciplines as $ds) {
    echo '<li >' . '<a class="filterelem" href="/pop-it-mvc/grades?discipline_id=' . $ds->id. '">' . $ds->name. '</a>' . '</li>';
}
echo '</ol>';
?>
</div>
</div>
<ol>
    <?php
    echo '<div class="findspis">';
    foreach ($students as $student) {
        echo '<div  class="findelemspis">';
        echo '<li>'. $student->surname . " " . $student->name .  " " . $student->patronymic .'</li>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</ol>

