<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LangsW */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

$this->title = Yii::t('app', 'Create Langs W');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Langs Ws'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langs-w-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
