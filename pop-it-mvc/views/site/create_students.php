<h2>Добавление студента</h2>
<form method="post" class="form">
    <label>Фамилия <input type="text" name="surname"></label>
    <label>Имя <input type="text" name="name"></label>
    <label>Отчество <input type="text" name="patronymic"></label>
    <label>Дата рождения <input type="date" value="2002-07-22" name="birthdate"></label>
    <label>Адрес <input type="text" name="adress"></label>
    <div>
        <label for="groop_id">Выберите группу:</label>
        <select class="selectl" name="groop_id" id="groop_id">
            <?php
            foreach ($groops as $groop) {
                echo '<option value="'. $groop->id. '">' .$groop->name. '</option>';
            }
            ?>
        </select>
    </div>
    <button class="butt-form">Добавить</button>
</form>
