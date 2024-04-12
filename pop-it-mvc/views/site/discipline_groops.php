<a class="oneabutt" href="<?= app()->route->getUrl('/groops') ?>">Все группы</a>
<h1>Прикрепление дисциплины</h1>
<form method="post" class="form">
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
    <div>
        <label for="discipline_id">Выберите дисциплину:</label>
        <select class="selectl" name="discipline_id" id="discipline_id">
            <?php
            foreach ($disciplines as $discipline) {
                echo '<option value="'. $discipline->id. '">' .$discipline->name. '</option>';
            }
            ?>
        </select>
    </div>
    <label>Количество часов <input type="text" name="all_count_hour"></label>
    <label>Вид контроля <input type="text" name="type_control"></label>
    <button class="butt-form">Прикрепить дисциплину</button>
</form>

