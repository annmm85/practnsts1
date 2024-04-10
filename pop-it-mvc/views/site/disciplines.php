<h1>Дисциплины</h1>
<ol>
    <?php
    foreach ($disciplines as $discipline) {
        echo '<li>'. $discipline->name . '</li>';
    }
    ?>
</ol>
