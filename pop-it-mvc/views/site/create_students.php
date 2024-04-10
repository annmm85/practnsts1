<h2>Добавление студента</h2>
<form method="post">
    <label>Фамилия <input type="text" name="surname"></label>
    <label>Имя <input type="text" name="name"></label>    <label>Имя <input type="text" name="name"></label>
    <label>Отчество <input type="text" name="patronymic"></label>
    <label>Дата рождения <input type="date" value="2002-07-22" name="birthdate"></label>
    <label>Адресс <input type="text" name="adress"></label>
    <label for="groop_id">Выберите группу:</label>
    <select name="groop" id="groop_id">
        <option value="">-Выберите группу-</option>
        <?php
        foreach ($groops as $groop) {
            echo '<option value="'. $groop->id. '">' .$groop->name. '</option>';
        }
        ?>
    </select>
    <button>Добавить</button>
</form>
