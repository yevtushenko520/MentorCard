<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">


    <?php $form = ActiveForm::begin(); ?>

<?php BoxWidget::begin([
        'title' => "Create Product", //string    
        'border' => false,       //boolean
        'color' => 'default',     //bootstrap color name 'success', 'danger' еtс.
        'solid' => false,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   //boolean or html to render footer
        
    ]);
    ?>

        <?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'prod_code')->textInput() ?>


      <div class="row">
  <div class="col-sm-3 col-md-3">
  <?= $form->field($model, 'price')->textInput() ?>
  </div>


   <div class="col-sm-3 col-md-3">
   <?= $form->field($model, 'tax')->textInput() ?>
</div>

 <div class="col-sm-3 col-md-3">
 <?= $form->field($model, 'gross_price')->textInput() ?>
</div>

 <div class="col-sm-3 col-md-3">

 <div class="form-group">
                  <label for="exampleInputPassword1">Currency</label>
                  <input type="text" class="form-control"  value="EUR" disabled>
                </div>

</div>


  </div>


 

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Create Product'), ['class' => 'btn btn-success']) ?>
    </div>


     <?php BoxWidget::end();?>

    <?php ActiveForm::end(); ?>

</div>
