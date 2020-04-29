<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuestAdd */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

$this->title = Yii::t('app', 'Create Quest Add');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Quest Adds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quest-add-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
