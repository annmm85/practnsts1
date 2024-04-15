
<div class="topbutt" ><a class="abutt" href="<?= app()->route->getUrl('/disciplines') ?>">Все дисциплины</a>
    <a class="abutt" href="/pop-it-mvc/create_disciplines">Добавить дисциплину</a>
</div>
<h1 class="block-title">Дисциплины</h1>

<form style="display: flex" name="search" method="get" action="<?= app()->route->getUrl('/disciplines') ?>"">
<?php
    if(isset($_GET['s'])) {
        echo '<input type="text" id="s" name="s" placeholder="Поиск" value="' . $_GET['s'] . '">';
    }else{?>
<input type="text" id="s" name="s" placeholder="Поиск">
<?php }?>
<button class="searbt" type="submit">Найти</button>
</form>

<div  class="filtermainblock">
    <div class="filterblock">
        <h3 class="block-title"> Курсы</h3>
        <?php

        echo '<ol  class="olioli">';
        foreach ($courses as $course) {
            if(isset($_GET['semester_id'])){
                if($reqqa==$course->id){
                    echo '<li >' . '<a class="yesfilterelem"  href="/pop-it-mvc/disciplines?semester_id=' . $_GET['semester_id'] . '&course_id=' . $course->id . '">' . $course->id . '</a>' . '</li>';
                }else {
                    echo '<li >' . '<a class="filterelem"  href="/pop-it-mvc/disciplines?semester_id=' . $_GET['semester_id'] . '&course_id=' . $course->id . '">' . $course->id . '</a>' . '</li>';
                }}else {
                if($req==$course->id){
                  echo '<li>' . '<a  class="yesfilterelem"  href="/pop-it-mvc/disciplines?course_id=' . $course->id. '">' . $course->id. '</a>' . '</li>';
                }else{
                    echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?course_id=' . $course->id. '">' . $course->id. '</a>' . '</li>';
                }
            }
        }
        ?>
    </div>
<div class="filterblock">
<h3 class="block-title">Семестры</h3>

    <?php
    echo '<ol  class="olioli">';
    foreach ($semesters as $semester) {
        if(isset($_GET['course_id'])){
            if($reqqas==$semester->id){
                echo '<li >' . '<a class="yesfilterelem"  href="/pop-it-mvc/disciplines?course_id=' . $_GET['course_id'] . '&semester_id=' . $semester->id . '">' . $semester->id . '</a>' . '</li>';
            }else {
                echo '<li >' . '<a class="filterelem"  href="/pop-it-mvc/disciplines?course_id=' . $_GET['course_id'] . '&semester_id=' . $semester->id . '">' . $semester->id . '</a>' . '</li>';
        }}else{
            if($req==$semester->id){
                echo '<li >' . '<a class="yesfilterelem"  href="/pop-it-mvc/disciplines?semester_id='. $semester->id. '">' . $semester->id. '</a>' . '</li>';
            }else{
                echo '<li >' . '<a class="filterelem"  href="/pop-it-mvc/disciplines?semester_id='. $semester->id. '">' . $semester->id. '</a>' . '</li>';
            }
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


