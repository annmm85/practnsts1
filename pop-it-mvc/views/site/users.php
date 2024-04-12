<a class="rightabutt"href="/pop-it-mvc/signup">Добавить сотрудника</a>
<h1 class="block-title">Список cотрудников</h1>
    <?php
    echo '<div  class="sotrspis">';
    foreach ($users as $user) {
        echo '<div  class="sotrelemspis">';
        echo '<li class="sotrinfo">'. $user->name . " " . $user->login .  " " . $user->password . $user->roles_id .'</li>';
        echo '</div>';
    }
    echo '</div>';
    ?>
<br>
ы