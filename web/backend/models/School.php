<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property int $id
 * @property string $school_name
 * @property string $first_name
 * @property string $last_name
 * @property string $date_birth
 * @property int $telephone_no
 * @property int $mobile_number
 * @property string $email
 * @property string $street
 * @property int $post_code
 * @property string $city
 * @property int $iban
 * @property int $bic
 */
class School extends \yii\db\ActiveRecord
{
    public $langs_array;
    public $lang_array;
    public $categor;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_name', 'first_name', 'last_name', 'date_birth',  'email', 'street', 'post_code', 'city','categor','langs_array','lang_array'], 'required'],
            [['telephone_no', 'mobile_number', 'post_code', 'iban', 'bic'], 'integer'],
            [['school_name', 'first_name', 'last_name', 'password', 'date_birth', 'email', 'street','telephone_no', 'mobile_number', 'city'], 'string', 'max' => 255],
            [['school_name'], 'unique'],
            [['email'], 'unique'],
            [['categor'],'safe'],
            [['langs_array'],'safe'],
            [['lang_array'],'safe'],
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

        $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();
        
        $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

        $set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
        
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();

  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web%20/index.php?r=site%2Fchoose_lang");
die();
   

}


        return [
            'id' => 'ID',
            'school_name' => $posts1003[0]['school_name'],
            'first_name' => $posts1002[0]['first_name'],
            'last_name' => $posts1002[0]['last_name'],
            'date_birth' => $posts1002[0]['day_birth'],
            'telephone_no' => $posts1003[0]['telephone_no'],
            'mobile_number' => $posts1003[0]['mobile_number'],
            'email' => $posts1002[0]['email'],
            'password' => $posts1002[0]['password'],
            'street' => $posts1003[0]['street'],
            'post_code' => $posts1003[0]['post_code'],
            'city' => $posts1003[0]['city'],
            'iban' => $posts1003[0]['iban'],
            'bic' => $posts1003[0]['bic'],
            'lang_array' => $posts1002[0]['lang_array'],
            'langAsString'=> $posts1002[0]['lang_array'],
            'categor' => $posts1002[0]['category'],
            'tagsAsString' => $posts1002[0]['category'],
            'langs_array' => $posts1002[0]['langs_array'],
            'langsAsString'=> $posts1002[0]['langs_array'],
            'iban' =>'iban',
            'bic' => 'bic',
             'customIDAsString' => 'Customer ID',
        ];
    }

    public function getCustomIDAsString()
    {

        $posts3 = Yii::$app->db->createCommand('SELECT * FROM school WHERE school_name="'.$this->school_name.'"')->queryAll();
        $posts4 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE user_id='.$posts3[0]['id'])->queryAll();
      
        return $posts4[0]['customer'];

    }

    public function getStudLangsStud(){
        return $this -> hasMany(StudLangsStud::className(),['stud_id'=>'id']);
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
        
        if(Yii::$app->user->identity->role==3 || Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==1){
            

            return $this -> hasMany(AdminLangs::className(),['id'=>'langs_id'])->via('studLangsStud');
        }else{
            return $this -> hasMany(Langs::className(),['id'=>'langs_id'])->via('studLangsStud');
        }
    }
    public function getLangsW(){

        if(Yii::$app->user->identity->role==3 || Yii::$app->user->identity->role==2 || Yii::$app->user->identity->role==1){
            
            return $this -> hasMany(AdminLangs::className(),['id'=>'lang_id'])->via('studLangsWrite');
        }else{
            return $this -> hasMany(LangsW::className(),['id'=>'lang_id'])->via('studLangsWrite');
        }
        
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

    }


    public function afterSave($insret, $changedAttributes)
    {

        parent::afterSave($insret, $changedAttributes);

        $posts03 = Yii::$app->db->createCommand('SELECT * FROM school WHERE school_name="'.$this->school_name.'"')->queryAll();



        $article = Yii::$app->security->generateRandomString();
        $article2 = Yii::$app->security->generatePasswordHash($this->password);

        if($posts03!=null){

$posts333 = Yii::$app->db->createCommand('SELECT max(id) FROM school')->queryAll();

if($posts333[0]['max(id)']<=20000){

 $new_id = $posts333[0]['max(id)'] +20000;

 $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $this->school_name.'"')->execute();

}else{

    $new_id = $posts333[0]['max(id)'] +1;

    $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $this->school_name.'"')->execute();

}

            $posts126 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$article2.'", email="'.$this->email.'" WHERE username="'.$this->email.'"')->execute();

            $posts40 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$this->school_name.'"')->queryAll();

        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  user_tags WHERE user_id='.$posts40[0]['id'])->execute();
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_stud WHERE stud_id='.$posts40[0]['id'])->execute();
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_write WHERE student_id='.$posts40[0]['id'])->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE user_id='.$posts40[0]['id'])->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_practice WHERE user_id='.$posts40[0]['id'])->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_buttons WHERE user_id='.$posts40[0]['id'])->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_practice WHERE user_id='.$posts40[0]['id'])->execute();

        $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$posts40[0]['id'])->execute();
     //   $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_mock WHERE user_id='.$posts40[0]['id'])->execute();
        $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_mock WHERE user_id='.$posts40[0]['id'])->execute();

        foreach($this->categor as $role):
               
    
            $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$posts40[0]['id'].', '.$role.')')->execute();
    
        endforeach;

        $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$posts40[0]['id'].','.$this->lang_array.')')->execute();

        foreach($this->langs_array as $role):
             
             
             
           $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$posts40[0]['id'].','.$role.')')->execute();
           
           endforeach;

 $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$this->school_name.'"')->queryAll();

           if($posts33!=null){

            $posts1262 = Yii::$app->db->createCommand('UPDATE school_name SET name="'.$this->school_name.'" WHERE id='. $posts33[0]['id'])->execute();

           }else{

            $posts45 = Yii::$app->db->createCommand('INSERT INTO school_name (name) VALUES ("'.$this->school_name.'")')->execute();

           }




        }else{


            $posts02 = Yii::$app->db->createCommand('INSERT INTO user (username,auth_key,password_hash,email,status
        ,role) VALUES ("'.$this->email.'","'.$article.'", "'.$article2.'","'.$this->email.'",10,3)')->execute();



$posts333 = Yii::$app->db->createCommand('SELECT max(id) FROM school')->queryAll();

if($posts333[0]['max(id)']<=20000){

 $new_id = $posts333[0]['max(id)'] +20000;

 $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $this->school_name.'"')->execute();

}else{

    $new_id = $posts333[0]['max(id)'] +1;

    $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $this->school_name.'"')->execute();

}


        $posts40 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$this->school_name.'"')->queryAll();

        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  user_tags WHERE user_id='.$posts40[0]['id'])->execute();
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_stud WHERE stud_id='.$posts40[0]['id'])->execute();
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_write WHERE student_id='.$posts40[0]['id'])->execute();
       
       

        foreach($this->categor as $role):
               
    
            $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$posts40[0]['id'].', '.$role.')')->execute();
    
        endforeach;

        $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$posts40[0]['id'].','.$this->lang_array.')')->execute();

        foreach($this->langs_array as $role):
             
             
             
           $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$posts40[0]['id'].','.$role.')')->execute();
           
           endforeach;

           $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$this->school_name.'"')->queryAll();

           if($posts33!=null){

            $posts1262 = Yii::$app->db->createCommand('UPDATE school_name SET name="'.$this->school_name.'" WHERE id='. $posts33[0]['id'])->execute();

           }else{

            $posts45 = Yii::$app->db->createCommand('INSERT INTO school_name (name) VALUES ("'.$this->school_name.'")')->execute();

           }


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
   
   
    $posts55 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE customer="'.$this->$custom_id.'"')->queryAll();
   
    if($posts55==null){
   
       $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$this->school_name.'"')->queryAll();
   
       $posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts33[0]['id'].',
       "res","'.$custom_id.'")')->execute();
   
   
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
   
          $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$this->school_name.'"')->queryAll();
   
          $posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$posts33[0]['id'].',"res","'.$custom_id.'")')->execute();
   
    }

         //
        }
        
       



}

}
