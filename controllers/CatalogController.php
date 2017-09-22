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

class CatalogController extends Controller
{

	public function actionIndex()
    {
        $category = Category::find()->all();
        
        $categoryName = Yii::$app->request->get('category');

        $query = Product::find()->where(['availability' => '1']);

    	$pages = new Pagination(['defaultPageSize' => 4, 'totalCount' => $query->count()]);
    	$product = $query
            ->offset($pages->offset)
            ->orderBy('id DESC')
            ->limit($pages->limit)
            ->all();

        return $this->render('index',
            ['category' => $category,
             'product' => $product,
             'categoryName' => $categoryName,
             'pages' => $pages
            ]
        );
    }

	public function actionSelection()
    {
        $category = Category::find()->all();
        
        $categoryName = Yii::$app->request->get('category');

        $query = Product::find()->where(['category_id' => $categoryName]);
        $pages = new Pagination(['defaultPageSize' => 4,'totalCount' => $query->count()]);
        $product = $query
            ->offset($pages->offset)
            ->orderBy('id DESC')
            ->limit($pages->limit)
            ->all();

   






        // $product = Product::find()->where(['category_id' => $categoryName])->all();

        return $this->render('index',
            ['category' => $category,
             'product' => $product,
             'categoryName' => $categoryName,
             // 'pagination' => $pagination,
             // 'models' => $models,
         	 'pages' => $pages,
            ]
        );
    }

    public function actionSearch()
    {
        $search = trim(Yii::$app->request->get('search'));

        if(!$search)
                return $this->render('search');

        $query = Product::find()->where(['like', 'name', $search]);

        $pages = new Pagination(['defaultPageSize' => 4, 'totalCount' => $query->count()]);

        $product = $query
            ->offset($pages->offset)
            ->orderBy('id DESC')
            ->limit($pages->limit)
            ->all();

        return $this->render('search',
            [
                'product' => $product,
                'pages' => $pages,
                'search' => $search,
            ]
        );
    }

}


?>