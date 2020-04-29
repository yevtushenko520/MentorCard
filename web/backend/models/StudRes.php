<?php

namespace app\models;
use common\models\User;

use backend\models\Students;

use Yii;

/**
 * This is the model class for table "stud_res".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $day_birth
 * @property string $country
 * @property string $place_birth
 * @property string $phone_number
 * @property string $active_code
 * @property string $categor
 * @property int $res_id
 * @property string $email
 */
class StudRes extends \yii\db\ActiveRecord
{

    public $langs_array;
    public $lang_array;
    public $sex;
   

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stud_res';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'password', 'day_birth', 'country', 'place_birth', 'phone_number', 'active_code', 'categor',  'email'], 'required'],
            [['res_id'], 'integer'],
            [['username', 'first_name', 'last_name', 'password', 'day_birth', 'country', 'place_birth', 'phone_number', 'active_code', 'email','sex'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['categor'], 'safe'],
            [['phone_number'], 'unique'],
            [['langs_array'],'safe'],
            [['lang_array'],'safe'],
            [['active_code'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        
        $posts33 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

        $posts44 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts33[0]['username'].'"')->queryAll();
        
        
        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts44[0]['id'])->queryAll();
        
        $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

                              
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}
        
        return [
            'id' => 'ID',
            'username' => $posts1002[0]['username'],
            'first_name' => $posts1002[0]['first_name'],
            'last_name' => $posts1002[0]['last_name'],
            'password' => $posts1002[0]['password'],
            'day_birth' => $posts1002[0]['day_birth'],
            'country' => $posts1002[0]['country'],
            'place_birth' => $posts1002[0]['place_birth'],
            'phone_number' => $posts1002[0]['phone_number'],
            'active_code' => $posts1002[0]['active_code'],
            'langs_array' => $posts1002[0]['langs_array'],
            'lang_array' => $posts1002[0]['lang_array'],
            'categor' => $posts1002[0]['category'],
            'res_id' => $posts1002[0]['res_id'],
            'email' => $posts1002[0]['email'],
        ];
    }

    public function afterSave($insret, $changedAttributes)
    {

        parent::afterSave($insret, $changedAttributes);

        //$posts33423 = Yii::$app->db->createCommand('UPDATE stud_res SET username="'.$this->email.'" WHERE id ='.$this->id)->queryAll();

        $posts334 = Yii::$app->db->createCommand('SELECT * FROM active_code WHERE code="'.$this->active_code.'"')->queryAll();

        if($posts334!=null && $posts334[0]['status']=="OFF"){

            $posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

            $posts40 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts3[0]['username'].'"')->queryAll();




            foreach($this->categor as $role):
        
                $posts41 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$role)->queryAll();
        
               // $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$new_id.', '.$role.')')->execute();
        
            endforeach;


            $posts5 = Yii::$app->db->createCommand('INSERT INTO students (username,first_name,last_name,password,day_birth,
place_birth,country,phone_number,email,activation_code,categor,res_id) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'","'.$this->password.'","'.$this->day_birth.'",
"'.$this->place_birth.'","'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","'.$this->active_code.'","'.$posts41[0]['name'].'",'.$posts40[0]['id'].')')->execute();


$posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();

$new_id = $posts33[0]['id'];



foreach($this->categor as $role):
        
    $posts41 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$role)->queryAll();

    $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$new_id.', '.$role.')')->execute();

endforeach;


$posts4 = Yii::$app->db->createCommand('INSERT INTO date_answer (date,id_user) VALUES ("'.date('m').'", '.$new_id.')')->execute();



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}

$posts44 = Yii::$app->db->createCommand('INSERT INTO users_ip (user_id,ip,zap) VALUES ('.$new_id.', "'.$ip.'",1)')->execute();

        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();


        if ($user->save()) {



$posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$new_id.','.$this->lang_array.')')->execute();



foreach($this->langs_array as $role):



$posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$new_id.','.$role.')')->execute();

endforeach;



$posts126 = Yii::$app->db->createCommand('UPDATE active_code SET status="ON" WHERE code="'.$this->active_code.'"')->execute();

$length = 5;
 
            $user_ip = "OFF"; 

for($x=0;$x<=999;$x++){

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    $posts5021 = Yii::$app->db->createCommand('SELECT * FROM active_code WHERE code="'.$randomString.'"')->queryAll();

    if($posts5021!=null){

      

    }else{

        $x = 1000;

        $posts126 = Yii::$app->db->createCommand('INSERT INTO active_code (code,status) VALUES ("'.$randomString.'","'.$user_ip.'")')->execute();


    }

}

            //return $user;
        }

    }else{

        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_res WHERE username="'.$this->email.'"')->execute();

       // return null;
    }

    //$posts33423 = Yii::$app->db->createCommand('UPDATE stud_res SET username="'.$this->email.'" WHERE id ='.$this->id)->queryAll();

    $msg = "Welcome to Mentorcard! You are successfully registered.\n\nUsername: ".$this->email."\nPassword: ".$this->password;


    $header = "From: info@mentrocard.de";
    
 $mail = $this->email;

// send email
mail($mail,"MentorCard",$msg,$header);

    }
}
