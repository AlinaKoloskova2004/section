<h2>Записи</h2>
<?php foreach ($records as $record):?>
<div class="card" style="margin-top:20px;">
    <div class="card-body">
        <h3>ФИО ребёнка: </h3><p class="" style="font-size: 20px;"><?php echo $record->surname_child.' '.$record->name_child .' '.$record->patronymic_child; ?></p>
        <h3>Возраст: </h3><p class="" style="font-size: 20px;"><?php echo $record->age_child; ?></p>
        <h3>Статус записи: </h3><p class="" style="font-size: 20px;"><?php echo $record->getStatus(); ?></p>
        <h3>Секция: </h3><p class="" style="font-size: 20px;"><?php echo $record->section->name; ?></p>
    </div>
</div>
<?php endforeach;?>