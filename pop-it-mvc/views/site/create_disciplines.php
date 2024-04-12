<a class="oneabutt" href="<?= app()->route->getUrl('/disciplines') ?>">Все дисциплины</a>
<h2>Добавление дисциплины</h2>
<form method="post" class="form">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Наименование дисциплины<input type="text" name="name"></label>
    <div>
        <label for="course_id">Выберите курс:</label>
        <select class="selectl" name="course_id" id="course_id">
            <?php
            foreach ($courses as $course) {
                echo '<option value="'. $course->id. '">' .$course->course_name. '</option>';
            }
            ?>
        </select>
    </div>
    <button class="butt-form">Добавить</button>
</form>
