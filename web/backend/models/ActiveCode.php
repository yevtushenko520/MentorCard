<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "active_code".
 *
 * @property int $id
 * @property string $code
 * @property string $status
 */
class ActiveCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'active_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code', 'status'], 'string', 'max' => 255],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        if(Yii::$app->user->identity->role ==4){

            $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==3){
          
            $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
          
           }else  if(Yii::$app->user->identity->role ==2){
          
            $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
             
           }else{
    
            $posts228 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
    
           }

           
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$set)->queryAll();
    
    
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web%20/index.php?r=site%2Fchoose_lang");
die();
   

}
    
    
           

        return [
            'id' => 'ID',
            'code' => $posts1003[0]['code'],
            'status' => $posts1003[0]['status'],
            'student' => $posts1003[0]['students'],
            'res' => $posts1003[0]['schools'],
        ];
    }

    public function getStudent(){


    $posts1001 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE activation_code="'.$this->code.'"')->queryAll();

    if($posts1001!=null){
        $name_stud =  $posts1001[0]['username'];
    }else{
        $name_stud =  null;
    }

    return $name_stud;

    }

    public function getRes(){

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE activation_code="'.$this->code.'"')->queryAll();

        if($posts1001!=null){
        $posts1002 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE id='.$posts1001[0]['res_id'])->queryAll();

        $name_school = $posts1002[0]['school_name'];

        }else{
            $name_school = null;
        }

        return $name_school;

    }
}
