<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $username;

    public function rules()
    {
        return [
            [['username','email','password'],'required', 'message' => 'Заповніть поле'],
            ['username','string','min'=>4,'max'=>10],
            ['email','email', 'message' => 'Некоректний email'],
            ['email','unique','targetClass'=>'app\models\User'],
            ['password','string','min'=>2,'max'=>10]
        ];
    }
    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save(); //вернет true или false
    }

    
}