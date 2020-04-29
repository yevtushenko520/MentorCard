<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LangsQuestion */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

$this->title = Yii::t('app', 'Create Langs Question');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Langs Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langs-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
