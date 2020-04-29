<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActiveCode */

$this->title = Yii::t('app', 'Create Active Code');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Active Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

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
<div class="active-code-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
