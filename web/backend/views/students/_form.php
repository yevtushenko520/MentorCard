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
         

<?php 

if($model->gender!=null){



    if($model->gender == "Mr"){

            
echo $form->field($model, 'sex')->widget(Select2::classname(), [
    'data' => $data2,
    'language' => 'de',
    'options' => ['placeholder' => 'Select your gender ...','multiple' => false,'value' => "Mr"],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]);


    }else if($model->gender == "Mrs"){

        echo $form->field($model, 'sex')->widget(Select2::classname(), [
            'data' => $data2,
            'language' => 'de',
            'options' => ['placeholder' => 'Select your gender ...','multiple' => false,'value' => "Mrs"],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'maximumInputLength' => 2
            ],
        ]);

    }else if($model->gender == "Miss"){

        echo $form->field($model, 'sex')->widget(Select2::classname(), [
            'data' => $data2,
            'language' => 'de',
            'options' => ['placeholder' => 'Select your gender ...','multiple' => false,'value' => "Miss"],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'maximumInputLength' => 2
            ],
        ]);

    }else if($model->gender == "Ms"){

        echo $form->field($model, 'sex')->widget(Select2::classname(), [
            'data' => $data2,
            'language' => 'de',
            'options' => ['placeholder' => 'Select your gender ...','multiple' => false,'value' => "Ms"],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'maximumInputLength' => 2
            ],
        ]);

    }else if($model->gender == "Others"){

        echo $form->field($model, 'sex')->widget(Select2::classname(), [
            'data' => $data2,
            'language' => 'de',
            'options' => ['placeholder' => 'Select your gender ...','multiple' => false,'value' => "Others"],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'maximumInputLength' => 2
            ],
        ]);

    }else{


            
echo $form->field($model, 'sex')->widget(Select2::classname(), [
    'data' => $data2,
    'language' => 'de',
    'options' => ['placeholder' => 'Select your gender ...','multiple' => false],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]);



    }



}else{


    
echo $form->field($model, 'sex')->widget(Select2::classname(), [
    'data' => $data2,
    'language' => 'de',
    'options' => ['placeholder' => 'Select your gender ...','multiple' => false],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]);

}

 ?>
    

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'placeholder' => 'First Name...']) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'placeholder' => 'Last Name...']) ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

   <?= $form->field($model,'day_birth')->widget(DatePicker::className(),['options' => ['placeholder' => 'Select date ...']]) ?>

    <?= $form->field($model, 'place_birth')->textInput(['maxlength' => true,'placeholder' => 'Place...']) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true,'placeholder' => 'Country...']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true,'placeholder' => '+12345...']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder' => 'example@emai...']) ?>


<?php

if(Yii::$app->user->identity->role!=4){

echo $form->field($model, 'school')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\SchoolName::find()->all(),'id','name'),
    'language' => 'de',
   // 'value' => \yii\helpers\ArrayHelper::map($model->tags,'name','name'),
    'options' => ['placeholder' => 'Select a school ...','multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 1
    ],
]) ;

}

?>

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

    <?php
    if(Yii::$app->user->identity->id==4 || Yii::$app->user->identity->id==3 || Yii::$app->user->identity->id==2 || Yii::$app->user->identity->id==1){


    }else{

        $form->field($model, 'activation_code')->textInput();
    }
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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php BoxWidget::end();?>

