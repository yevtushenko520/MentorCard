<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FrontendLangs */



    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();



$this->title = Yii::t('app', 'Create Frontend Langs');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Frontend Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-langs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
