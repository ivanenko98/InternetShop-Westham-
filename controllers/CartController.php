<?php

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd() // Добавить товар в корзину
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $this->layout = false;

        return $this->render('cart-modal',
            [
                'session' => $session
            ]
            );
    }

    public function actionClear() // Очистить корзину
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;

        return $this->render('cart-modal',
            [
                'session' => $session
            ]
        );
    }

    public function actionDelItem() // Удалить товар из корзины
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);

        $this->layout = false;

        return $this->render('cart-modal',
            [
                'session' => $session
            ]
        );

    }

    public function actionShow() // Показать модальное окно корзины
    {
        $session = Yii::$app->session;
        $session->open();

        $this->layout = false;

        return $this->render('cart-modal',
            [
                'session' => $session
            ]
        );
    }

    public function actionView() // Показать вид корзины
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order;
        if($order->load(Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if ($order->save())
            {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваше замовлення прийнято. Менеджер зв`яжеться з вами.');
                Yii::$app->mailer->compose('order', ['session' => $session])
                            ->setFrom(['ivanenko.oleg.m@gmail.com' => 'Інтернет-магазин WESTHAM'])
                            ->setTo($order->email)
                            ->setSubject('Заказ')
                            ->send();
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');

                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Помилка оформлення замовлення.');
            }
        }


        return $this->render('view',
            [
                'session' => $session,
                'order' => $order,
            ]
        );
    }

    protected function saveOrderItems($items, $order_id)
    {
           foreach ($items as $id => $item){

               $order_items = new OrderItems();
               $order_items->order_id = $order_id;
               $order_items->product_id = $id;
               $order_items->name = $item['name'];
               $order_items->price = $item['price'];
               $order_items->qty_item = $item['qty'];
               $order_items->sum_item = $item['qty'] * $item['price'];
               $order_items->save(false);
           }
    }

}