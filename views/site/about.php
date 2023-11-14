<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

$items=\app\models\Category::find()
    ->select(['name','id'])
    ->indexBy('id')
    ->column();
$items2=\app\models\Section::find()
    ->select(['name','id'])
    ->indexBy('id')
    ->column();
$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .btn{
        background-color:rebeccapurple;
        color:white;
    }

</style>
<h3 style="font-family:'Gothic'">Подробное описание кружка</h3>

<div class="site-index d-flex justify-content-center">

    <?php foreach ($sections as $section):?>

        <div class="card " style="width: 20rem; margin-left:20px; height:100%;">

            <div class="card-body">
                <img src="../img/<?php echo $section['img'];?>" class="card-img-top" style="height: 100px;" alt="...">
                <h5 class="card-title" ><?php echo $section['name'];?></h5>
                <p class="card-title"><?php echo $section['description'];?></p>
                <p class="card-title" style="color:rebeccapurple; font-weight:bold;"><?php echo $section['price'];?> руб.</p>

            </div>
        </div>

    <?php endforeach;?>
    </div>


        </div>
<div class="d-flex justify-content-center mt-3">
    <div class="card w-50s align-items-center shadow p-3 mb-5 rounded" style="background: -webkit-linear-gradient(top, #7579ff, #b224ef);">
        <div class="card-body w-100">
            <div class="d-flex justify-content-center">
            <h2>Запись на кружок</h2>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    /*'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],*/
                ],
            ]); ?>

            <h5>Данные родителя:</h5>
            <div class="d-flex justify-content-between">
                <div class="w-25 me-2"><?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25"><?= $form->field($model, 'telephone')->widget(MaskedInput::class, ['mask' => '+7(999)-999-99-99']) ?></div>
            </div>
            <h5>Данные ребенка:</h5>
            <div class="d-flex justify-content-between">
                <div class="w-25 me-2"><?= $form->field($model, 'surname_child')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'name_child')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25 me-2"><?= $form->field($model, 'patronymic_child')->textInput(['autofocus' => true]) ?></div>

                <div class="w-25"><?= $form->field($model, 'age_child')->textInput(['autofocus' => true]) ?></div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-50 me-2"><?= $form->field($model, 'category_id')->dropdownList($items,['prompt' => 'Выбрать возрастную категорию']) ?></div>

                <div class="w-50 me-2"><?= $form->field($model, 'section_id')->dropdownList($items2,['prompt' => 'Выбрать кружок']) ?></div>
            </div>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Отправить', ['class' => 'btn', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
