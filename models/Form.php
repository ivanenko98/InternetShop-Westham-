<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegForm extends Model
{
    public $name;
    public $email;
    
    public function rules() {
        return [
            [['name', 'email'], 'required', 'message' => 'Не заполнено поле'],
            ['email', 'email', 'message' => 'Некоректный e-mail адрес'],
        ];
    }


}

?>

