<h1>Прикрепление дисциплины</h1>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <div>
        <label for="gr-select">Выберите группу:</label>
        <select name="groop_id" id="gr-select">
            <option value="">-Выберите группу-</option>
            <?php
            foreach ($groops as $groop) {
                echo '<option value="'. $groop->id. '">' .$groop->name. '</option>';
            }
            ?>
        </select>
    </div>
    <div>
        <label for="disc-select">Выберите дисциплину:</label>
        <select name="discipline_id" id="disc-select">
            <option value="">Выберите дисциплину</option>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<option value="'. $groop->id. '">' .$discipline->name. '</option>';
            }
            ?>
        </select>
    </div>
    <label>Количество часов <input type="text" name="all_count_hour"></label>
    <label>Вид контроля <input type="text" name="type_control"></label>
    <button>Прикрепить дисциплину</button>
</form>

