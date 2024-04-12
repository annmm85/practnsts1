<h2 class="block-title">Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <form method="post" class="form">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
        <button class="butt-form">Войти</button>
    </form>
<?php endif;