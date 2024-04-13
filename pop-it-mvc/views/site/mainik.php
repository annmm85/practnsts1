<h1 class="block-title">Главная</h1>
<br>
<h2 class="block-title">Добро пожаловать на сайт Деканата</h2>
<div class="news">
    <?php
    foreach ($bests as $best) {
        echo '<div class="newsbl">';
        echo '<img src="'.  $best->image  .' " alt="фото студента'.' " width="150px"></img>';
        echo '<div >'. $best->name .'</div>';
        echo '</div>';
    }
    ?>
</div>
<a class="abutt" href="/pop-it-mvc/create_bests">Добавить новость</a>
<br>