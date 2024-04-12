<a class="oneabutt" href="<?= app()->route->getUrl('/groops') ?>">Все группы</a>
<h2>Добавление группы</h2>
<form method="post" class="form">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label>Номер группы <input type="text" name="name"></label>
    <button class="butt-form">Добавить</button>
</form>
