<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tests */
if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){
    header("Location: http://www.mentorcard.de/backend/web/index.php");
    die();
    
    }else{
    
    }
$this->title = Yii::t('app', 'Update Tests: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tests-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
