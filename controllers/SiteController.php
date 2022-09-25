<?php

namespace app\controllers;

use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @var string
     */
    private $password_hash;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
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
    public function actionIndex()
    {
        return  Yii::$app->getResponse()->redirect(['dashview/index']);
    }

    public function actionIndex1()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     * @throws Exception
     */
    public function actionLogin()
    {
        $this->layout = false;
        if (!Yii::$app->user->isGuest) {
            return  Yii::$app->getResponse()->redirect(['dashview/index']);
        }
//        else{
//            debugPrint(Yii::$app->user);
//            exit;
//        }

        $model = new LoginForm();
//        debugPrint(Yii::$app->request->post());
        $incomingData = Yii::$app->request->post();
//        if (isset($incomingData['email']))
//            $model->username = $incomingData['email'];
//
//        if (isset($incomingData['pass']))
//            $model->password = $incomingData['pass'];

//    exit;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->redirect(['dashview/index']);
        }

        $model->password = '';
        return $this->render('doctor-login', [
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
