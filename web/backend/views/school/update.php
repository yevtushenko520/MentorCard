<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = Yii::t('app', 'Update School: ' . $model->school_name, [
    'nameAttribute' => '' . $model->school_name,
]);

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
$posts112 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

if(Yii::$app->user->identity->role==4 || $posts112[0]['id']!=$model->id){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

?>
<div class="school-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
