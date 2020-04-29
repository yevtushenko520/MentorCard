<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= //$form->field($model, 'id') ?>
    <?= $form->field($model, 'username') ?>
   
    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= //$form->field($model, 'day_birth') ?>

    <?= //$form->field($model, 'place_birth') ?>

    <?php $form->field($model, 'country') ?>
    
    <?php $form->field($model, 'phone_number') ?>

    <?php $form->field($model, 'email') ?>

     <?php $form->field($model, 'categor') ?>

    <?php //$form->field($model, 'activation_code') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
