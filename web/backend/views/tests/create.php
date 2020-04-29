<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tests */

if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){
header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

$this->title = Yii::t('app', 'Create Tests');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
