<?php

use app\models\Record;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\RecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Records');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Record'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surname',
            'name',
            'patronymic',
            'telephone',
            'surname_child',
            'name_child',
            'patronymic_child',
            'category_id',
            'section_id',
            ['attribute'=>'status',
                'value' =>function($data){
                    return $data->getStatus();
                }],
            [
                'attribute'=>'Администрирование',
                'format'=>'html',
                'value'=>function($date){
                    switch ($date->status){
                        case 0:
                            return Html::a('Одобрить','good/?id='.$date->id)."|".
                                Html::a('Отклонить','verybad/?id='.$date->id);
                        case 1:
                            return Html::a('Одобрить','good/?id='.$date->id);
                        case 2:
                            return Html::a('Отклонить','verybed/?id='.$date->id);
                    }
                }
            ],
            'user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Record $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
