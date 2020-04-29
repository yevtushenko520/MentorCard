<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $day_birth
 * @property string $country
 * @property string $phone_number
 * @property string $email
 */
class Admin extends \yii\db\ActiveRecord
{
    public $langs_array;
    public $lang_array;
    public $categor;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'password', 'day_birth', 'country', 'phone_number', 'email'], 'required'],
            [['username', 'first_name', 'last_name', 'password', 'day_birth', 'country', 'phone_number', 'email'], 'string', 'max' => 255],
            [['username'], 'unique'],
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
            $posts11 = Yii::$app->db->createCommand('SELECT id FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

           }
          
          
           $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();

                      
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
            'username' => $posts1002[0]['username'],
            'first_name' => $posts1002[0]['first_name'],
            'last_name' => $posts1002[0]['last_name'],
            'password' => $posts1002[0]['password'],
            'day_birth' => $posts1002[0]['day_birth'],
            'country' => $posts1002[0]['country'],
            'phone_number' => $posts1002[0]['phone_number'],
            'email' => $posts1002[0]['email'],
            'lang_array' => $posts1002[0]['lang_array'],
            'langAsString'=> $posts1002[0]['lang_array'],
            'categor' => $posts1002[0]['category'],
            'tagsAsString' => $posts1002[0]['category'],
            'langs_array' => $posts1002[0]['langs_array'],
            'langsAsString'=> $posts1002[0]['langs_array'],
        ];
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

        $posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

        $posts40 = Yii::$app->db->createCommand('SELECT id FROM admin WHERE username="'.$posts3[0]['username'].'"')->queryAll();

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
        

    }
}
