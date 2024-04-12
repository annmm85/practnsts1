
<div class="topbutt" ><a class="abutt" href="<?= app()->route->getUrl('/disciplines') ?>">Все дисциплины</a>
    <a class="abutt" href="/pop-it-mvc/create_disciplines">Добавить дисциплину</a>
</div>
<h1 class="block-title">Дисциплины</h1>

<form name="search" method="get" action="<?= app()->route->getUrl('/search') ?>"">
    <input type="text" id="s" name="s" placeholder="Поиск">
    <button type="submit">Найти</button>
</form>
<div  class="filtermainblock">
    <div class="filterblock">
        <h3 class="block-title"> Курсы</h3>
        <?php

        echo '<ol  class="olioli">';
        foreach ($findDisciplines as $dis) {
            echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?course_id=' . $dis->course_id. '">' . $dis->course_id. '</a>' . '</li>';
        }
        echo '</ol>';
        ?>
    </div>

    <div class="filterblock">
<h3 class="block-title">Семестры</h3>
<ol class="olioli">
    <li class="filterelem">1</li>
    <li class="filterelem">2</li>
</ol></div>
    </div>

<?php
if ($findDisciplines) {
    echo '<div class="findspis">';
    foreach ($findDisciplines as $dis) {
        echo '<div  class="findelemspis">';
        echo '<li>' . $dis->name . '</li>';
        echo '</div>';
    }
    echo '</div>';
}
?>


