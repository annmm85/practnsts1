<h1>Выставление оценки</h1>
<h3><?= $message ?? ''; ?></h3>
<form method="post" class="form">
    <?php
    echo '<label><input type="text" name="student_id" value="'. $studentik .'"/></label>';
    ?>

    <label>Введите оценку<input type="text" name="mark"></label>
    <div>
        <label for="discipline_groop_id">Выберите дисциплину группы:</label>
        <select class="selectl" name="discipline_groop_id" id="discipline_groop_id">
            <option value="">-Выберите дисциплину-</option>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<option value="'. $discipline->id. '">' .$discipline->name. '</option>';
            }
            ?>
        </select>
    </div>
    <button class="butt-form">Выставить оценку</button>
</form>
