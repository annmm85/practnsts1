
<div class="topbutt" ><a class="abutt" href="<?= app()->route->getUrl('/disciplines') ?>">Все дисциплины</a>
    <a class="abutt" href="/pop-it-mvc/create_disciplines">Добавить дисциплину</a>
</div>
<h1 class="block-title">Дисциплины</h1>

<form style="display: flex" name="search" method="get" action="<?= app()->route->getUrl('/search') ?>"">
<input type="text" id="s" name="s" placeholder="Поиск">
<button class="searbt" type="submit">Найти</button>
</form>

<div  class="filtermainblock">
    <div class="filterblock">
        <h3 class="block-title"> Курсы</h3>
        <?php

        echo '<ol  class="olioli">';
        foreach ($courses as $course) {
            echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?course_id=' . $course->id. '">' . $course->id. '</a>' . '</li>';
        }
        echo '</ol>';
        ?>
    </div>
<div class="filterblock">
<h3 class="block-title">Семестры</h3>

    <?php

    echo '<ol  class="olioli">';
    foreach ($semesters as $semester) {
        if($ll['ff']){
            echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?course_id='.$ll['ff'].'&semester_id=' . $semester->id. '">' . $semester->id. '</a>' . '</li>';
        }else{
            echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?semester_id=' . $semester->id. '">' . $semester->id. '</a>' . '</li>';
        }
    }
    echo '</ol>';
    ?>
</ol></div>
</div>

<?php
if ($ll['findDisciplines']) {
    echo '<div class="findspis">';
    foreach ($ll['findDisciplines'] as $dis) {
        echo '<div  class="findelemspis">';
        echo '<li>' . $dis->name . '</li>';
        echo '</div>';
    }
    echo '</div>';
}
?>


