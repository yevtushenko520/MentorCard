<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuesionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quesions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
 
    <?= //$form->field($model, 'id') ?>

    <?= $form->field($model, 'amtl_frage_nr') ?>

    <?= $form->field($model, 'fehlerpunkte') ?>

    <?= $form->field($model, 'categorie') ?>

    <?= //$form->field($model, 'image') ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
