<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="card-group">
    <?php foreach ($sections as $section):?>

        <div class="card " style="width: 200px; margin-left:20px; ">

            <div class="card-body" >
                <img src="../img/<?php echo $section['img'];?>" class="card-img-top" style="height: 200px;" alt="...">
                <h5 class="card-title"><?php echo $section['name'];?></h5>
                <a href="<?php echo Url::toRoute(['site/about' ,'id'=>$section['id']]);?>" class="btn btn-primary">Подробнее</a>
            </div>
        </div>

    <?php endforeach;?>
    </div>



    <div class="row d-flex align-items-center-center justify-content-center" style="margin-top:40px;">

        <div class="col-lg-5">
            <h2>Напишите свой отзыв!</h2>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>
            <div style="width:800px; height:120px;">
            <?= $form->field($model, 'text')->textarea() ?>
            </div>




            <div class="form-group">
                <div>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


</div>
    </div>
        </div>


            <div class="koguvcavis-varazdel">
                <div class="sestim-donials">
                    <h1 style="color: white">Отзывы</h1>
                    <div class="sectionesag"></div>
                    <div class="sagestim-lonials">
                        <div class="vemotau-vokusipol">
                            <?php foreach ($goodstatus as $comment):?>
                            <div class="testimonial">

                                <div class="gecedanam"><?php echo $comment->user->username;?></div>
                                <div class="apogered-gselected">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>

                                <p><?php echo $comment['text']?></p>
                            </div>
                            <?php endforeach;?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
                    </div>

                </div>

