<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
                $this->addError($attribute, 'Incorrect username or password.');
            }

            $user = $this->getIp();

            if(!$user){

               
                $this->addError($attribute, 'This account is already used by someone');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;

        ///TYTY
    }

    protected function getIp(){

    $check_mail = $this->username;



        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $posts2 = Yii::$app->db->createCommand('SELECT * FROM  aouth_users  WHERE ip="'.$ip.'" AND username="'.$check_mail.'"')->queryAll();
        
        if($posts2!=null){

                return true;

        }else{

            $posts3 = Yii::$app->db->createCommand('SELECT * FROM  aouth_users  WHERE  username="'.$check_mail.'"')->queryAll();

            if($posts3!=null){

                $posts121 = Yii::$app->db->createCommand('INSERT INTO log_out (ip,username) VALUES ("'.$posts3[0]['ip'].'","'.$check_mail.'")')->execute();

                $posts121 = Yii::$app->db->createCommand('UPDATE aouth_users SET ip="'.$ip.'" WHERE username="'.$check_mail.'"')->execute();

                return true;

            }else{

                $posts121 = Yii::$app->db->createCommand('INSERT INTO aouth_users (ip,username) VALUES ("'.$ip.'", "'.$check_mail.'")')->execute();

            }
  
            
            return true;

        }

        

    }
}
