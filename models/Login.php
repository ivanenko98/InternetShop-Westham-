<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Login extends Model
{
    public $email;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required', 'message' => 'Заповніть поле'],

            ['email','email', 'message' => 'Некоректний email'],

            // password is validated by validatePassword()
            ['password', 'validatePassword', 'message' => 'Неправильний e-mail, або пароль'],
        ];
    }

    public function attributeLabels()
    {
        return ['username' => '',
                'email' => '',
                'password' => '',
                'rememberMe' => '',
                ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильний логін або пароль');
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['email'=>$this->email]);
    }
    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
//    public function login()
//    {
//        if ($this->validate()) {
//            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
//        }
//        return false;
//    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */

}
