<h1 class="block-title">Успеваемость</h1>

<div  class="filtermainblock">
    <div class="filterblock">
        <h3 class="block-title"> Дисциплины</h3>
        <?php

        echo '<ol  class="olioli">';
        foreach ($disciplines as $discipline) {
            echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?discipline_groop_id=' . $discipline->id. '">' . $discipline->name. '</a>' . '</li>';
        }
        echo '</ol>';
        ?>
    </div>
    <div class="filterblock">
        <h3 class="block-title">Группы</h3>

        <?php

        echo '<ol  class="olioli">';
        foreach ($groops as $groop) {
            if($ll['ff']){
                echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?discipline_groop_id='.$ll['ff'].'&groop_id=' . $groop->id. '">' . $groop->name. '</a>' . '</li>';
            }else{
                echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/disciplines?groop_id=' . $groop->id. '">' . $groop->name. '</a>' . '</li>';
            }
        }
        echo '</ol>';
        ?>
        </ol></div>
</div>
<?php
if ($ll['findGrades']) {
    echo '<div class="findspis">';
    foreach ($ll['findGrades'] as $dis) {
        echo '<div  class="findelemspis">';
        echo '<li>' . $dis->name . '</li>';
        echo '</div>';
    }
    echo '</div>';
}
?>
