<?php

namespace backend\models;

use Yii;
use app\models\Langs;
use app\models\School;
use app\models\StudLangsStud;
use app\models\StudLangsWrite;
use app\models\LangsW;
use app\models\Tags;
use app\models\UserTags;
use app\models\User;
use app\models\SchoolName;
use app\models\StudSchool;
/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $day_birth
 * @property string $place_birth
 * @property string $country
 * @property string $phone_number
 * @property string $email
 * @property string $lang_study
 * @property string $lang_write
 * @property int $activation_code
 */
class Students extends \yii\db\ActiveRecord
{
    public $langs_array;
    public $lang_array;
    public $school;
    public $sex;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }
    /**
     * {@inheritdoc}
     */ 
    public function rules()
    {
        return [
            [['first_name', 'last_name','password', 'day_birth', 'place_birth', 'country', 'phone_number', 'email','categor','langs_array','lang_array'], 'required'],
            [['res_id'], 'integer'],
            [['first_name', 'last_name','username', 'day_birth', 'place_birth', 'country', 'phone_number','activation_code', 'email','sex'], 'string', 'max' => 255],
            [['activation_code'], 'unique'],
            [['phone_number'], 'unique'],

            [['password'], 'string', 'max' => 50],
           
            [['categor'],'safe'],
            [['langs_array'],'safe'],
            [['lang_array'],'safe'],
            [['school'],'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {

        if(Yii::$app->user->identity->role ==4){

            $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==3){
          
            $posts11 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==2){
          
            $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
             
           }else{

            $posts11 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
    
           }
          
          
           $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();
          
       ;

                                
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
          
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

         
        return [
            'id' => 'ID',
            'first_name' => $posts1002[0]['first_name'],
            'last_name' => $posts1002[0]['last_name'],
            'day_birth' => $posts1002[0]['day_birth'],
            'place_birth' => $posts1002[0]['place_birth'],
            'country' => $posts1002[0]['country'],
            'phone_number' => $posts1002[0]['phone_number'],
            'email' => $posts1002[0]['email'],
            'password' => $posts1002[0]['password'],
            'lang_array' => $posts1002[0]['lang_array'],
            'langAsString'=> $posts1002[0]['lang_array'],
            'username' => $posts1002[0]['username'],
            'categor' => $posts1002[0]['category'],
            'tagsAsString' => $posts1002[0]['category'],
            'langs_array' => $posts1002[0]['langs_array'],
            'langsAsString'=> $posts1002[0]['langs_array'],
            'activation_code' => $posts1002[0]['active_code'],
            'schoolAsString' => $posts1002[0]['res_id'],
            'school' => $posts1002[0]['res_id'],
            'customID' => 'Customer ID',
        ];
    }
    public function getStudLangsStud(){
        return $this -> hasMany(StudLangsStud::className(),['stud_id'=>'id']);
    }



    ///////////////

    public function getUserSchool(){
        return $this -> hasMany(StudSchool::className(),['user_id'=>'id']);
    }

    public function getUSchool(){
        return $this -> hasMany(SchoolName::className(),['id'=>'school_id'])->via('userSchool');
    }

    public function getSchoolAsString()
    {

        $posts3 = Yii::$app->db->createCommand('SELECT * FROM students WHERE username="'.$this->username.'"')->queryAll();
        $posts4 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE id='.$posts3[0]['res_id'])->queryAll();
       // $arr2 = \yii\helpers\ArrayHelper::map($this->uSchool,'id','name');
        return $posts4[0]['school_name'];

    }
/////////////


public function getCustomID()
    {

        $posts3 = Yii::$app->db->createCommand('SELECT * FROM students WHERE username="'.$this->username.'"')->queryAll();
        $posts4 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE user_id='.$posts3[0]['id'])->queryAll();
      
        return $posts4[0]['customer'];

    }

    public function getUserTags(){
        return $this -> hasMany(UserTags::className(),['user_id'=>'id']);
    }

   
    public function getStudLangsWrite(){
        return $this -> hasMany(StudLangsWrite::className(),['student_id'=>'id']);
    }

    public function getUteg(){
        return $this -> hasMany(Tags::className(),['id'=>'tag_id'])->via('userTags');
    }

    public function getLangs(){
        return $this -> hasMany(Langs::className(),['id'=>'langs_id'])->via('studLangsStud');
    }
    public function getLangsW(){
        return $this -> hasMany(LangsW::className(),['id'=>'lang_id'])->via('studLangsWrite');
    }

    public function getLangsAsString()
    {
        $arr2 = \yii\helpers\ArrayHelper::map($this->langs,'id','name');
        return implode(',',$arr2);

    }

    public function getTagsAsString()
    {
        $arr2 = \yii\helpers\ArrayHelper::map($this->uteg,'id','name');
        return implode(',',$arr2);

    }


   
    public function getLangAsString()
    {
        $arr3 = \yii\helpers\ArrayHelper::map($this->langsW,'id','name');
        return implode(',',$arr3);

    }
    public function afterFind()
    {
      $this->langs_array = $this->langs;
      $this->lang_array = $this->langsW;
      $this->categor = $this->uteg;
      $this->school = $this->uSchool;
  

    }

    public function afterSave($insret, $changedAttributes)
    {

        parent::afterSave($insret, $changedAttributes);

    
    
        $posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();
      

        foreach($this->categor as $role):
        
            $posts41 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$role)->queryAll();

        endforeach;

        $posts38 = Yii::$app->db->createCommand('SELECT * FROM stud_res WHERE username="'.$this->email.'"')->queryAll();

        if($posts38!=null){

            if($this->school!=null){

                $id_res = $this->school;
            }else{

                $id_res = 0;
            }

    

            $posts1262 = Yii::$app->db->createCommand('UPDATE students SET username ="'.$this->email.'" WHERE id ='.$this->id)->execute();



            $posts126 = Yii::$app->db->createCommand('UPDATE stud_res SET username= "'.$this->email.'", first_name="'.$this->first_name.'",last_name="'.$this->last_name.'",
            password="'.$this->password.'", day_birth="'.$this->day_birth.'",country="'.$this->country.'",phone_number="'.$this->phone_number.'",
            email="'.$this->email.'",active_code="'.$this->activation_code.'",categor="'.$posts41[0]['name'].'",res_id='.$id_res.' WHERE id="'.$this->id.'"')->execute();

             $posts33 = Yii::$app->db->createCommand('SELECT * FROM students WHERE id="'.$this->id.'"')->queryAll();

             $new_id = $posts33[0]['id'];

             $posts126 = Yii::$app->db->createCommand('UPDATE students SET categor="'.$posts41[0]['name'].'" WHERE id='.$new_id)->execute();

             $posts1262 = Yii::$app->db->createCommand('UPDATE students SET res_id='.$id_res.' WHERE id='.$new_id)->execute();

             $posts12622 = Yii::$app->db->createCommand('UPDATE stud_school SET school_id='.$id_res.' WHERE user_id='.$new_id)->execute();
            


             $posts1375 = Yii::$app->db->createCommand('DELETE FROM  user_tags WHERE user_id='.$new_id)->execute();

             $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE user_id='.$new_id)->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_practice WHERE user_id='.$new_id)->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_buttons WHERE user_id='.$new_id)->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_practice WHERE user_id='.$new_id)->execute();

        $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$new_id)->execute();
       // $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_mock WHERE user_id='.$new_id)->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_mock WHERE user_id='.$new_id)->execute();

             foreach($this->categor as $role):
               
               $posts41 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$role)->queryAll();
       
               $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$new_id.', '.$role.')')->execute();
       
           endforeach;

           $posts13751 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_stud WHERE stud_id='.$new_id)->execute();

           $posts13752 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_write WHERE student_id='.$new_id)->execute();


 $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$new_id.','.$this->lang_array.')')->execute();

 foreach($this->langs_array as $role):
      
      
      
    $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$new_id.','.$role.')')->execute();
    
    endforeach;
    

    setcookie("govno", $this->lang_array);


        }else{

            if($this->school!=null){

                $id_res = $this->school;
            }else{

                $id_res = 0;
            }

           

            $posts1262 = Yii::$app->db->createCommand('UPDATE students SET username ="'.$this->email.'" WHERE id ='.$this->id)->execute();
        

      $posts5 = Yii::$app->db->createCommand('INSERT INTO stud_res (username,first_name,last_name,password,day_birth,
      country,phone_number,email,active_code,categor,res_id) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'","'.$this->password.'","'.$this->day_birth.'",
      "'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","'.$this->activation_code.'","'.$posts41[0]['name'].'",'.$id_res.')')->execute();
      
         $posts12622 = Yii::$app->db->createCommand('INSERT INTO stud_school (school_id,user_id) VALUES ('.$id_res.', '.$this->id.')')->execute();
      
      $posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();
      
      $new_id = $posts33[0]['id'];

      $posts1262 = Yii::$app->db->createCommand('UPDATE students SET res_id='.$id_res.' WHERE id='.$new_id)->execute();

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
              $user->auth_key = Yii::$app->security->generateRandomString();
              $user->email = $this->email;
              $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
              $user->role = 4;
    
              $user->save();
             
      
            
          //    $posts41 = Yii::$app->db->createCommand('SELECT * FROM user WHERE username="'.$this->email.'"')->queryAll();

        //      $posts1262 = Yii::$app->db->createCommand('UPDATE user SET username ="'.$this->email.'" , email = "'.$this->email.'" WHERE id ='.$posts41[0]['id'])->execute();

              
      
      
      $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$new_id.','.$this->lang_array.')')->execute();
      
      
      
      foreach($this->langs_array as $role):
      
      
      
      $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$new_id.','.$role.')')->execute();
      
      endforeach;
      
    
if($this->activation_code!=null){
      
      $posts126 = Yii::$app->db->createCommand('UPDATE active_code SET status="ON" WHERE code="'.$this->activation_code.'"')->execute();
      
                  //return $user;
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

}
setcookie("govno", $this->lang_array);




$msg = "Welcome to Mentorcard! You are successfully registered.\n\nUsername: ".$this->email."\nPassword: ".$this->password;


$header = "From: info@mentrocard.de";

$mail = $this->email;

// send email
mail($mail,"MentorCard",$msg,$header);



$length = 10;

for($x=0;$x<=999;$x++){

$characters = '0123456789';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}

}

$custom_id = "RS-".$randomString;


$posts55 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE customer="'.$custom_id.'"')->queryAll();

if($posts55==null){

$posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();

$posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts33[0]['id'].',
"stud","'.$custom_id.'")')->execute();


}else{


for($x=0;$x<=999;$x++){

$characters = '0123456789';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}

}

$custom_id = "RS-".$randomString;

$posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();

$posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts33[0]['id'].',"stud","'.$custom_id.'")')->execute();

}

            }



    }
}
