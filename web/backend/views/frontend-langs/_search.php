<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendLangsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-langs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>


    <?php // echo $form->field($model, 'sec_title_about') ?>

    <?php // echo $form->field($model, 'one_about') ?>

    <?php // echo $form->field($model, 'one_title_about') ?>

    <?php // echo $form->field($model, 'two_about') ?>

    <?php // echo $form->field($model, 'two_title_about') ?>

    <?php // echo $form->field($model, 'three_about') ?>

    <?php // echo $form->field($model, 'three_title_about') ?>

    <?php // echo $form->field($model, 'four_about') ?>

    <?php // echo $form->field($model, 'four_title_about') ?>

    <?php // echo $form->field($model, 'five_about') ?>

    <?php // echo $form->field($model, 'five_title_about') ?>

    <?php // echo $form->field($model, 'six_about') ?>

    <?php // echo $form->field($model, 'six_title_about') ?>

    <?php // echo $form->field($model, 'first_title_feature') ?>

    <?php // echo $form->field($model, 'sec_title_feature') ?>

    <?php // echo $form->field($model, 'three_title_feature') ?>

    <?php // echo $form->field($model, 'rec_feature') ?>

    <?php // echo $form->field($model, 'satif_feature') ?>

    <?php // echo $form->field($model, 'follow_feature') ?>

    <?php // echo $form->field($model, 'first_title_creative') ?>

    <?php // echo $form->field($model, 'sec_titlee_creative') ?>

    <?php // echo $form->field($model, 'three_title_creative') ?>

    <?php // echo $form->field($model, 'first_title_design') ?>

    <?php // echo $form->field($model, 'sec_title_design') ?>

    <?php // echo $form->field($model, 'up_design') ?>

    <?php // echo $form->field($model, 'sat_design') ?>

    <?php // echo $form->field($model, 'rec_design') ?>

    <?php // echo $form->field($model, 'galery_first') ?>

    <?php // echo $form->field($model, 'galery_sec') ?>

    <?php // echo $form->field($model, 'first_title_easy') ?>

    <?php // echo $form->field($model, 'sec_title_easy') ?>

    <?php // echo $form->field($model, 'three_title_easy') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
