<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Reg extends ActiveRecord
{

    public function rules() {
        return [
            [['email', 'password', 'username'], 'required', 'message' => 'Поле не заповнене'],
            ['email', 'email', 'message' => 'Некоректний e-mail адрес'],
        ];
    }

   


}

?>

