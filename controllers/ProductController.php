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
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Form;
use app\models\Product;
use app\models\Category;
use yii\data\Pagination;

class ProductController extends Controller
{

	public function actionIndex()
  {
      $request = Yii::$app->request;
      $id = $request->get('id');
      $product = Product::find()->where(['id' => $id])->all();
    

  return $this->render('index',
                ['id' => $id,
                 'product' => $product,                
                    ]
        );
  }
}