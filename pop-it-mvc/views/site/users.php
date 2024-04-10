<h1>Список cотрудников</h1>
<ol>
    <?php
    foreach ($users as $user) {
        echo '<li>'. $user->name . " " . $user->login .  " " . $user->password . $user->roles_id .'</li>';
    }
    ?>
</ol>
<br>
<div><a href="/pop-it-mvc/signup">Добавить сотрудника</a></div>