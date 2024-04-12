<h2 class="block-title">Авторизация</h2>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post" class="form">
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
        <button class="butt-form">Войти</button>
    </form>
<?php endif;