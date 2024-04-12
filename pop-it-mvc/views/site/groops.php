<div class="topbutt" ><a class="abutt" href="<?= app()->route->getUrl('/groops') ?>">Все группы</a>
    <a class="abutt" href="<?= app()->route->getUrl('/discipline_groops') ?>">Прикрепить дисциплину</a>
</div>
<?php
if ($gro['studentik']){
    foreach ($gro['groops'] as $groop) {echo '<h1 class="block-title">'. $groop->name.' '.'группа</h1>';}
    echo '<h2 class="block-title">Студенты</h2>';
    echo '<div class="discgroop-block">';
    echo '<div class="mini-block-stud">';
    foreach ($gro['groops'] as $groop) {
        echo '<div class="spis">';
        foreach ($gro['students'] as $student) {
            echo '<div  class="elemspis">';
            echo '<li>'. $student->surname ." " . $student->name ." " . $student->patronymic .'</li>';
            if ($student->id!=$gro['studentik']){
                echo '<div><a class="abutt" href="/pop-it-mvc/groops?id='. $gro['idgr'] . '&student_id='.$student->id.'">Выставить оценку</a></div>';
            }else{

                 echo '<div><a class="abuttgreen" style="background-color: #BDEFA6;">Выставить оценку</a></div>';
            }
            echo '</div>';
        }
        echo '</div>';
        echo '<div>';
        echo '<a class="mini-butt-create-gr"  href="/pop-it-mvc/create_students">Добавить студента</a>';
        echo '</div>';
    }
    echo '</div>';
    echo '<div class="mini-block-gr-disc">';
    echo'<form method="post" class="mini-form">';
    echo '<label class="hiddenn"><input  type="text" name="student_id" value="'. $gro['studentik'] .'"/></label>';
    echo '<label>Введите оценку<input type="text" name="mark"></label>';
    echo'<div>';
    echo  ' <label for="discipline_groop_id">Дисциплина группы:</label>';
    echo '<select class="mini-selectl" name="discipline_groop_id" id="discipline_groop_id">';
    foreach ($gro['disciplines'] as $discipline) {
        echo '<option value="'. $discipline->id. '">' .$discipline->name. '</option>';
    }
    echo '</select>';
    echo'</div>';
    echo'<div>';
    echo  '<button class="mini-butt-form">Выставить оценку</button>';
    echo'</div>';
    echo'</form>';
    echo '</div>';
    echo '</div>';
}
if (count($gro['groops'])==1 && $gro['studentik']==null){
    foreach ($gro['groops'] as $groop) {
        echo '<h1 class="block-title">'. $groop->name.' '.'группа</h1>';
        echo '<h2 class="block-title">Студенты</h2>';
        echo '<div class="spis">';
        foreach ($gro['students'] as $student) {
            echo '<div  class="elemspis">';
            echo '<li>'. $student->surname ." " . $student->name ." " . $student->patronymic .'</li>';
            echo '<div><a class="abutt" href="/pop-it-mvc/groops?id='. $gro['idgr'] . '&student_id='.$student->id.'">Выставить оценку</a></div>';
            echo '</div>';
        }
        echo '</div>';
        echo '<div>';
        echo '<a class="butt-form"  href="/pop-it-mvc/create_students">Добавить студента</a>';
        echo '</div>';
    }
}
if(count($gro['groops'])>1){

    echo '<h1 class="block-title"> Все группы </h1>';
    echo '<ol class="oli">';
    foreach ($gro['groops'] as $groop) {
        echo '<li>'.'<a class="agroops" href="/pop-it-mvc/groops?id=' . $groop->id . '">' . $groop->name .'</a>'.'</li>';
    }
    echo '</ol>';
    echo ' <a class="butt-form" href="/pop-it-mvc/create_groops">Добавить группу</a>';
}
?>

