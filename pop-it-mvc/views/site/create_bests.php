<h1 class="block-title">Создание новостей</h1>
<form method="post" class="form" enctype="multipart/form-data">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label>Введите объявление <input type="text" name="name"></label>
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">

    <button class="butt-form" type="submit">Сохранить</button>
</form>