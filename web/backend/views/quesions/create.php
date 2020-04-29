<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Quesions */

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
if(Yii::$app->user->identity->role ==4){

    $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==3){
  
    $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==2){
  
    $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }else{

    $posts228 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

   }


   $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts228[0]['id'])->queryAll();



   $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

$this->title = Yii::t('app', $posts1003[0]['create_lang']);


if(Yii::$app->user->identity->role!=1){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

?>
<div class="quesions-create">

    
    <?= $this->render('_form', [
        'model' => $model,
        'modelsQuestion' => $modelsQuestion,
       
    ]) ?>

</div>

