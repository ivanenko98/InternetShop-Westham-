<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Request;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\ContactForm;
use app\models\Signup;
use app\models\Product;
use app\models\Category;
use yii\data\Pagination;

class UserController extends Controller
{
    public function actionIndex()
    {
    
        return $this->render('index');
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup() {
        
        if (!Yii::$app->user->isGuest) {
             return $this->goHome();
         }

        $model = new Signup();

    
        
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
                return $this->redirect(['regcomplete']);
            }
        }
       
        return $this->render('reg',
                ['model' => $model,
                    ]
        );
    }
    public function actionRegcomplete() {
       
        return $this->render('regcomplete');
    }
  
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
         if (!Yii::$app->user->isGuest) {
             return $this->goHome();
         }

        $login_model = new Login();


        if (Yii::$app->request->post('Login')) {

            $login_model->attributes = Yii::$app->request->post('Login');
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }

        }
        return $this->render('login', [
            'login_model' => $login_model,
        ]);
    }



    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
  }