<?php
namespace backend\models;
use common\models\User;
use backend\models\Students;
use yii\base\Model;
use Yii;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $day_birth;
    public $place_birth;
    public $country;
    public $street;
    public $phone_number;
    public $langs_array;
    public $lang_array;
    public $activation_code;
    public $category;
    public $sex;
    public $house_no;
    public $post_code;
    public $city;
    public $rap_email;
    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
           
            ['langs_array','safe'],
            ['langs_array', 'required'],

            ['lang_array','safe'],
            ['langs_array', 'required'],

            ['sex','safe'],
            ['sex', 'required'],

            ['street', 'string', 'max' => 255],
            ['house_no', 'string', 'max' => 255],
            ['post_code', 'string', 'max' => 255],
            ['city', 'string', 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'common\models\User', 'message' => 'This email address has already been taken.'],

            ['rap_email', 'string', 'max' => 255],

            ['rap_email', 'required'],
            ['rap_email', 'compare', 'compareAttribute'=>'email', 'message'=>"Emails don't match" ],

            ['place_birth', 'string', 'max' => 255],
            ['place_birth', 'required'],
            ['country', 'string', 'max' => 255],
            ['country', 'required'],
            ['phone_number', 'string', 'max' => 255],
            ['phone_number', 'required'],
            ['activation_code', 'string', 'max' => 255],
           
            ['first_name', 'string', 'max' => 255],
            ['first_name', 'required'],
            ['day_birth', 'string', 'max' => 255],
            ['day_birth', 'required'],
            ['last_name', 'string', 'max' => 255],
            ['last_name', 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => 'common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 5, 'max' => 255],
           
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {

        
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();

  
}else{
    
    $posts1001 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id=1')->queryAll();
    $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id=1'   )->queryAll();

}


        return [
            
            'lang_array' => 'Select your language to take the original test',
            'langs_array' => 'Select your language to study',
            'sex' => $posts1001[0]['title']

            
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

   

    public function signup()
    {
        if ($this->validate()) {

            
            $pizza  = $this->place_birth;
            $pieces = explode("/", $pizza);
            echo $pieces[2]; // piece1
            $gate = date('o') - $pieces[2];

            if($gate>=16.5){

                

            $posts334 = Yii::$app->db->createCommand('SELECT * FROM active_code WHERE code="'.$this->activation_code.'"')->queryAll();

            if($posts334!=null){

              

          if( $posts334[0]['status']=="OFF"){

       //     $posts455 = Yii::$app->db->createCommand('INSERT INTO ban_list (user_id,plahe_2) VALUES (2, "tyt3")')->execute();

                $posts5 = Yii::$app->db->createCommand('INSERT INTO students (username,first_name,last_name,password,day_birth,
place_birth,country,phone_number,email,activation_code,categor,gender) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'","'.$this->password.'","'.$this->day_birth.'",
"'.$this->place_birth.'","'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","'.$this->activation_code.'","B","'.$this->sex.'")')->execute();


$posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();

$new_id = $posts33[0]['id'];


$posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$new_id.', 2)')->execute();


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

   
   $posts126 = Yii::$app->db->createCommand('UPDATE active_code SET status="ON" WHERE code="'.$this->activation_code.'"')->execute();

   
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


   $posts566 = Yii::$app->db->createCommand('INSERT INTO stud_res (username,first_name,last_name,password,day_birth,
      country,phone_number,email,active_code,categor,res_id) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'","'.$this->password.'","'.$this->day_birth.'",
      "'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","'.$this->activation_code.'","B",0)')->execute();


      $eol = PHP_EOL;
      $separator = md5(time());
      
      
      // email stuff (change data below)
      $to = $this->email; 
      $from = "info@mentorcar.de"; 
      $subject = "Registration"; 
      $message = "Welcome to Mentorcard! You are successfully registered.\n\nUsername: ".$this->email."\nPassword: ".$this->password;
      
      // main header
      $headers  = "From: ".$from.$eol;
      $headers .= "MIME-Version: 1.0".$eol; 
      $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
      
      // no more headers after this, we start the body! //
      
      $body = "--".$separator.$eol;
      $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
      $body .= $eol;
      
      // message
      $body .= "--".$separator.$eol;
      $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
      $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
      $body .= $message.$eol;
      
      
      
      // send message
      mail($to, $subject, $body, $headers);


$length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

     $posts5021 = Yii::$app->db->createCommand('SELECT * FROM students WHERE email="'.$this->email.'"')->queryAll();

    $str_G = 'STU-'.$randomString;

    $posts126 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts5021[0]['id'].',"stu","'.$str_G.'")')->execute();

                return $user;
            }

        }else{

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
              } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
              } else {
                $ip = $_SERVER['REMOTE_ADDR'];
              }

            $posts126 = Yii::$app->db->createCommand('INSERT INTO check_active_code (user_id) VALUES ("'.$ip.'")')->execute();

            return null;
        }

        


    }else{



            


        $posts5 = Yii::$app->db->createCommand('INSERT INTO students (username,first_name,last_name,password,day_birth,
        place_birth,country,phone_number,email,activation_code,categor,gender) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'","'.$this->password.'","'.$this->day_birth.'",
        "'.$this->place_birth.'","'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","","B","'.$this->sex.'")')->execute();
        
        
        $posts33 = Yii::$app->db->createCommand('SELECT id FROM students WHERE username="'.$this->email.'"')->queryAll();
        
        $new_id = $posts33[0]['id'];
        
        
        $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$new_id.', 2)')->execute();
        
        
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
        
          
        
        
        
        
           $posts566 = Yii::$app->db->createCommand('INSERT INTO stud_res (username,first_name,last_name,password,day_birth,
              country,phone_number,email,active_code,categor,res_id) VALUES ("'.$this->email.'","'.$this->first_name.'","'.$this->last_name.'",'.$this->password.',"'.$this->day_birth.'",
              "'.$this->country.'","'.$this->phone_number.'","'.$this->email.'","","B",0)')->execute();
        



  $eol = PHP_EOL;
$separator = md5(time());


// email stuff (change data below)
$to = $this->email; 
$from = "info@mentorcar.de"; 
$subject = "Registration"; 
$message = "Welcome to Mentorcard! You are successfully registered.\n\nUsername: ".$this->email."\nPassword: ".$this->password;

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= $eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;



// send message
mail($to, $subject, $body, $headers);


  $length = 10;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

     $posts5021 = Yii::$app->db->createCommand('SELECT * FROM students WHERE email="'.$this->email.'"')->queryAll();

    $str_G = 'OU-'.$randomString;

    $posts126 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts5021[0]['id'].',"stu","'.$str_G.'")')->execute();
    
  
                        return $user;
                    }
    
         
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }

    $posts126 = Yii::$app->db->createCommand('INSERT INTO check_active_code (user_id) VALUES ("'.$ip.'")')->execute();
    
    return null;

    }


}else{
    return null;
}
    
        }
        return null;
    }
}