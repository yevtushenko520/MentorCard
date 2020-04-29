<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quesions */

$this->title = Yii::t('app', 'Update Quesions: ' . $model->amtl_frage_nr, [
    'nameAttribute' => '' . $model->amtl_frage_nr,
]);

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }
  

if(Yii::$app->user->identity->role!=1){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

?>
<div class="quesions-update">

    
    

    <?= $this->render('_form', [
        'model' => $model,
        'modelsQuestion' => $modelsQuestion,
    ]) ?>


</div>
