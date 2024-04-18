
<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" class="form">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Имя <input type="text" name="name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <div><label for="role_id">Выберите роль:</label>
        <select class="selectl" name="role_id" id="role_id">
            <?php
            foreach ($roles as $role) {
                echo '<option value="'. $role->id. '">' .$role->name. '</option>';
            }
            ?>
        </select>
    </div>
    <button class="butt-form">Зарегистрироваться</button>

</form>
