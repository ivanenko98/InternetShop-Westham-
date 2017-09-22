<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 22.05.2017
 * Time: 21:19
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($product, $qty = 1)
    {
        if(isset($_SESSION['cart'][$product->id])){         // Если такой товар в корзине уже есть
            $_SESSION['cart'][$product->id]['qty'] += $qty; // то добавляем к тому количеству которое было, то что передали
        }else{                                              // если такого товара нет в корзине
            $_SESSION['cart'][$product->id] = [             // то создаем для него новый елемент масива сессии
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }
        // Создаем новый ел масива сессии для общего количества товаров в корзине, если есть такой елемент, то добавляем переданое кол-во
        // если он пустой, то записываем переданое кол-во
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;

        // Создаем новый ел масива сессии для общей суммы за товары в корзине, если есть такой елемент, то добавляем переданную сумму
        // если он пустой, то записываем переданную сумму
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;

    }

    public function recalc($id)
    {
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }


}