<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use wokster\ltewidgets\BoxWidget;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?php BoxWidget::begin([
        'title' => 'Fill the form', //string
        'border' => true,       //boolean
        'color' => 'success',    //bootstrap color name 'success', 'danger' еtс.
        'solid' => true,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   
    ]);
    ?>

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

 <?= $form->field($model, 'lang_array')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\AdminLangs::find()->all(),'id','name'),
    'language' => 'de',
   // 'value' => \yii\helpers\ArrayHelper::map($model->tags,'name','name'),
    'options' => ['placeholder' => 'Select a state ...','multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 1
    ],
]) ?>
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>
