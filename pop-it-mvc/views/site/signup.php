<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Имя <input type="text" name="name"></label>
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <div><label for="roles_id">Выберите роль:</label>
        <select name="roles_id" id="roles_id">
            <option value="">-Выберите роль-</option>
            <?php
            foreach ($roles as $role) {
                echo '<option value="'. $role->id. '">' .$role->name. '</option>';
            }
            ?>
        </select>
    </div>
    <button>Зарегистрироваться</button>
</form>
