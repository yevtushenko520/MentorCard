<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Students */

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }
  

if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>