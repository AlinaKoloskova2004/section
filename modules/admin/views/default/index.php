<?php

use yii\helpers\Url;

?>
<div class="admin-default-index">
    <h1>Добро пожаловать в админ панель!</h1>

    <div class="my-3">
        <a href="<?php echo Url::toRoute(['category/index']) ;?>" class="btn btn-danger btn-lg m-2">Категории кружков</a>
        <a href="<?php echo Url::toRoute(['section/index']) ;?>" class="btn btn-danger btn-lg m-2">Кружки</a>
        <a href="<?php echo Url::toRoute(['record/index']) ;?>" class="btn btn-danger btn-lg m-2">Записи на кружок</a>
        <a href="<?php echo Url::toRoute(['schedule/index']) ;?>" class="btn btn-danger btn-lg m-2">Расписание кружков</a>

    </div>
</div>
