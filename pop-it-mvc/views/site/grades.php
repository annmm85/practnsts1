<h1 class="block-title">Успеваемость</h1>

<div  class="filtermainblock">
    <div style="width: 50%">
        <h3 class="block-title"> Дисциплины</h3>
    <div class="filterblock">

        <?php
        foreach ($disciplines as $discipline){
            if($finreq==$discipline->id){
                echo '<li>' . '<a  class="yesfilterelem"  href="/pop-it-mvc/grades?discipline_id=' . $discipline->id. '">' . $discipline->name. '</a>' . '</li>';
            }else{echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/grades?discipline_id=' . $discipline->id. '">' . $discipline->name. '</a>' . '</li>';
                }
        }
        ?>
    </div>
    </div>
    <div style="width: 50%">
        <h3 class="block-title">Группы</h3>
    <div class="filterblock">

        <?php
        echo '<ol  class="olioli">';
        foreach ($groops as $groop) {
            if($finreqgr==$groop->id){
                echo '<li>' . '<a  class="yesfilterelem"  href="/pop-it-mvc/grades?groop_id=' . $groop->id. '">' . $groop->name. '</a>' . '</li>';
            }else{
                echo '<li>' . '<a  class="filterelem"  href="/pop-it-mvc/grades?groop_id=' . $groop->id. '">' . $groop->name. '</a>' . '</li>';
            }
        }
        echo '</ol>';
        ?>
        </ol>
    </div>
    </div>
</div>

<?php
echo '<div class="findspis">';
    if(isset($_GET['discipline_id'])){
        foreach ($dgr as $discipline_groop) {
            if($discipline_groop->discipline_id==$_GET['discipline_id']){
                foreach ($grades as $grade) {
                    if($grade->discipline_groop_id==$discipline_groop->id){
                        foreach ($students as $student) {
                            if($student->id==$grade->student_id){
                                echo '<div class="filteel">';
                                echo '<div class="filtename">' . $student->name .'</div>';
                                echo '<div class="filtemark">' . $grade->mark .'</div>';
                                echo '</div>';
                            }
                        }
                    }

                }
            }
        }
    }
if(isset($_GET['groop_id'])){
    foreach ($dgr as $discipline_groop) {
        if($discipline_groop->groop_id==$_GET['groop_id']){
            foreach ($grades as $grade) {
                if($grade->discipline_groop_id==$discipline_groop->id){
                    foreach ($students as $student) {
                        if($student->id==$grade->student_id){
                            echo '<div class="filteel">';
                            echo '<div class="filtename">' . $student->name .'</div>';
                            echo '<div class="filtemark">' . $grade->mark .'</div>';
                            echo '</div>';
                        }
                    }
                }
            }
        }
    }
}
echo '</div>';
?>