<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LangsQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="langs-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_id')->textInput() ?>

    <?= $form->field($model, 'languege')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_yes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_no1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_no2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'one')->textInput() ?>

    <?= $form->field($model, 'two')->textInput() ?>

    <?= $form->field($model, 'three')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
