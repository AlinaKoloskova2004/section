<?php

namespace app\modules\admin\controllers;

use app\models\Record;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

use Yii;
use yii\data\ActiveDataProvider;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles'=>['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->isAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>Record::find()->where(['user_id'=>Yii::$app->user->getID()])
        ]);
        return $this->render('index', [
            'dataProvider'=>$dataProvider,
        ]);
    }
}
