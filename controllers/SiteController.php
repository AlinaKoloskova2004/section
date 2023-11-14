<?php

namespace app\controllers;

use app\models\Children;
use app\models\Comment;
use app\models\Record;
use app\models\RegisterForm;
use app\models\Review;
use app\models\Schedule;
use app\models\Teacher;
use app\models\User;
use app\models\Category;
use app\models\Section;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\Pagination;

use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionHome(){
        return $this->render('home');
    }
    public function actionIndex()
    {

        $query = Section::find();
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>2]);
        $sections = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $categories=Category::find()->all();



        return $this->render('index',['categories'=>$categories, 'pages'=>$pages,'sections'=>$sections]);


    }
    public function actionSchedules(){
        $schedules=Schedule::find()->where(['date_id'=>'5'])->all();
        $scheduless=Schedule::find()->all();


        return $this->render('schedules',['schedules'=>$schedules,'scheduless'=>$scheduless]);
    }
    public function actionTeachers()
    {
        $teachers = Teacher::find()->all();



        return $this->render('teachers',['teachers'=>$teachers]);


    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->isAdmin()) {
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['site/kabinet']);
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('register', [
            'model' => $model,
        ]);
    }




    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {

        $model = new Comment();
        $comments = Comment::find()->orderBy('id desc')->all();
        $goodstatus = Comment::find()->where(['status'=>1])->all();
        if ($model->load(Yii::$app->request->post()) && $model->saveComment()) {
            Yii::$app->session->setFlash('success', 'Ваш отзыв успешно отправлен!');

            return $this->refresh();
        }
        if(isset($_GET['id']) && $_GET['id']!=""){
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $sections = Section::find()->where(['category_id'=>$_GET['id']])->asArray()->all();

            return $this->render('contact', [
                'model'=>$model,
                'categories'=>$categories,
                'sections'=>$sections,
                'comments' =>$comments,
                'goodstatus'=>$goodstatus,




            ]);

        }
        else
            return $this->redirect(['site/index']);
    }
    public function actionKabinet(){
        $user = User::findOne(Yii::$app->user->id);
        $records = $user->record;
        $section= Section::find()->all();
        return $this->render('kabinet',['records'=>$records,'section'=>$section]);
    }
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = new Record();
        $records = Record::find()->orderBy('id desc')->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Ваша запись успешно отправлена!');

            return $this->refresh();
        }


        if(isset($_GET['id']) && $_GET['id']!=""){
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $teachers = Teacher::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $sections = Section::find()->where(['id'=>$_GET['id']])->asArray()->all();
            return $this->render('about', [
                'categories'=>$categories,
                'sections'=>$sections,
                'model'=>$model,
                'records'=>$records,
                'teachers'=>$teachers,





            ]);

        }
        else
            return $this->redirect(['site/index']);
    }
}
