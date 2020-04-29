<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
$this->title = Yii::t('app', 'Update Student: ' . $model->username);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');


$posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

if(Yii::$app->user->identity->role == 4){

$posts4 = Yii::$app->db->createCommand('SELECT id,categor FROM students WHERE username="'.$posts3[0]['username'].'"')->queryAll();

if($model->id !=$posts4[0]['id']){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
    die();

}else{
    
}

} else if(Yii::$app->user->identity->role == 3){

  $posts4 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts3[0]['username'].'"')->queryAll();

  if($model->id !=$posts4[0]['id']){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
    die();

}else{

}

}else{
    
}

?>
<div class="students-update">



    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>