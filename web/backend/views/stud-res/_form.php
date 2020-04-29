<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use wokster\ltewidgets\BoxWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<style>

.preloader {
  height: 100%;
  width: 100%;
  background: #fff;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10000;
  perspective: 1600px;
  perspective-origin: 20% 50%;
  transition: 0.5s all;
  opacity: 1;
}

.spinner {
  width: 80px;
  height: 80px;
  border: 2px solid #f3f3f3;
  border-top: 3px solid #0088cf;
  border-radius: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: spin 1s infinite linear;
}

.preloader.fade {
  opacity: 0;
}

.b-ico-preloader {
  background: url(http://weblaboratory.in.ua/wp-content/themes/graphy/images/new_logo.svg);
  background-size: cover;
  width: 52px;
  height: 67px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: ico 5s infinite linear;
  transform-style: preserve-3d;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes ico {
  from {
    transform: rotateY(0deg);
  }
  to {
    transform: rotateY(360deg);
  }
}

</style>

        <script>

         function reloadAll(){

var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  preload.style.display = 'none';
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})
}

</script>

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

 <?php 
         $data2 = [
          "Mr" => "Mr",
          "Mrs" => "Mrs",
          "Miss" => "Miss",
          "Ms" => "Ms",
          "Others" => "Others"
         
      ];
         
         ?>          

<?= $form->field($model, 'sex')->widget(Select2::classname(), [
    'data' => $data2,
    'language' => 'de',
    'options' => ['placeholder' => 'Select your title ...','multiple' => false],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]) ?>
      

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model,'day_birth')->widget(DatePicker::className(),['options' => ['placeholder' => 'Select date ...']]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'example@emai...']) ?>

 <?= $form->field($model, 'place_birth')->textInput(['maxlength' => true,'placeholder' => 'Place...']) ?>
 
    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>


   

    <?= $form->field($model, 'langs_array')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Langs::find()->all(),'id','name'),
    'language' => 'de',
   // 'value' => \yii\helpers\ArrayHelper::map($model->tags,'name','name'),
    'options' => ['placeholder' => 'Select a state ...','multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]) ?>

 <?= $form->field($model, 'lang_array')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\LangsW::find()->all(),'id','name'),
    'language' => 'de',
   // 'value' => \yii\helpers\ArrayHelper::map($model->tags,'name','name'),
    'options' => ['placeholder' => 'Select a state ...','multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 1
    ],
]) ?>

<?= $form->field($model, 'categor')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\TagsTt::find()->all(),'id','name'),
    'language' => 'de',
   // 'value' => \yii\helpers\ArrayHelper::map($model->tags,'name','name'),
    'options' => ['placeholder' => 'Select a state ...','multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 1
    ],
]) ?>

 <?= $form->field($model, 'active_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


<?php BoxWidget::end();?>
