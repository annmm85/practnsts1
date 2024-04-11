<h1>Прикрепление дисциплины</h1>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div>
        <label for="groop_id">Выберите группу:</label>
        <select name="groop_id" id="groop_id">
            <option value="">-Выберите группу-</option>
            <?php
            foreach ($groops as $groop) {
                echo '<option value="'. $groop->id. '">' .$groop->name. '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <label for="discipline_id">Выберите дисциплину:</label>
        <select name="discipline_id" id="discipline_id">
            <option value="">Выберите дисциплину</option>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<option value="'. $discipline->id. '">' .$discipline->name. '</option>';
            }
            ?>
        </select>
    </div>
    <label>Количество часов <input type="text" name="all_count_hour"></label>
    <label>Вид контроля <input type="text" name="type_control"></label>
    <button>Прикрепить дисциплину</button>
</form>

