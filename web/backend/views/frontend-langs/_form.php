<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FrontendLangs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="frontend-langs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_title_home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title_home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'one_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'one_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'two_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'two_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'three_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'three_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'four_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'four_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'five_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'five_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'six_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'six_title_about')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_title_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'three_title_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'satif_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'follow_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_title_creative')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_titlee_creative')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'three_title_creative')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_title_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'up_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sat_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rec_design')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'galery_first')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'galery_sec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_title_easy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_title_easy')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'three_title_easy')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
