<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LangsQuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="langs-question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question_id') ?>

    <?= $form->field($model, 'languege') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'answer_yes') ?>

    <?php // echo $form->field($model, 'answer_no1') ?>

    <?php // echo $form->field($model, 'answer_no2') ?>

    <?php // echo $form->field($model, 'one') ?>

    <?php // echo $form->field($model, 'two') ?>

    <?php // echo $form->field($model, 'three') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
