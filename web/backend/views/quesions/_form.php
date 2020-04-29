<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use wokster\ltewidgets\BoxWidget;
use wbraganca\dynamicform\DynamicFormWidget;

$y = 1;

?>
<h2 style="margin-bottom:20px;"><span>Create Quesion
</span></h2>

<style>

.text-warning {
    color: #8a6d3b;
    visibility: hidden;
}

.file-sortable .file-drag-handle:hover {
    opacity: 0.7;
    visibility: hidden !important;
}

.file-actions{
    visibility: hidden !important;
}

.clearfix{
    visibility: hidden !important;
}

.file-thumbnail-footer{
    visibility: hidden !important;
}


.fileinput-upload {
    visibility: hidden !important;
}

.fileinput-remove-button{
    visibility: hidden !important;
}


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
    
<?php $form = ActiveForm::begin(['id' => 'dynamic-form'],[ 'options' => ['enctype' => 'multipart/form-data']
]); ?>

 <?= $form->field($model, 'choose_test')->widget(Select2::classname(), [
    
    'name' => 'status',
    'hideSearch' => true,
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Tests::find()->all(),'id','name'),
    'options' => ['placeholder' => 'Select a test ...','multiple' => false],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 50
    ],
    
   ]) ?>

    <?= $form->field($model, 'amtl_frage_nr')->textInput() ?>

    <?= $form->field($model, 'fehlerpunkte')->textInput() ?>

 <?= $form->field($model, 'tags_array')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Tags::find()->all(),'id','name'),
    'language' => 'de',
    'options' => ['placeholder' => 'Select a categories ...','multiple' => true],
    'pluginOptions' => [
        'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 50
    ],
]) ?>


<?= $form->field($model, 'image')->widget(FileInput::classname(), [
    
//1.1.01-109
    'pluginOptions' => [
        'initialPreview'=>[
            Html::img('@studentImgUrl' .'/'. $model->image)
        ],
        'overwriteInitial'=>true
    ]

    
]); ?>



<?= $form->field($model, 'points')->textInput() ?>


<div class="panel panel-default">
        <div class="panel-heading"><h4><i class="fa fa-question-circle"></i> Quesions</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsQuestion[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'languege',
            'question',
            'answer_yes',
            'answer_no1',
            'answer_no2',
                    
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsQuestion as $i => $modelsQuestion): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Quesion <?= ($y ++) ?></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsQuestion->isNewRecord) {
                                echo Html::activeHiddenInput($modelsQuestion, "[{$i}]question_id");
                            }
                        ?>
                    
                        <div class="row">

                            <div class="col-sm-6">

                              
                                <?= $form->field($modelsQuestion, "[{$i}]languege")->textInput(['maxlength' => true]) ?>

                                

                            </div>

                            <div class="col-sm-6">

                                <?= $form->field($modelsQuestion, "[{$i}]question")->textInput(['maxlength' => true]) ?>

                              

                            </div>

                        </div><!-- .row -->

                        <div class='row'>
                        <div class="col-sm-4">
                                <?= $form->field($modelsQuestion, "[{$i}]answer_yes")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($modelsQuestion, "[{$i}]one")->checkbox() ?>
                                
                                
                            </div>
                            <div class="col-sm-4">
                           
                       

         </div>
                            <div>
       
    </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-sm-4">
                                <?= $form->field($modelsQuestion, "[{$i}]answer_no1")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($modelsQuestion, "[{$i}]two")->checkbox() ?>
                            </div>
                            
                            <div class="col-sm-4">
                                <?= $form->field($modelsQuestion, "[{$i}]answer_no2")->textInput(['maxlength' => true]) ?>
                                <?= $form->field($modelsQuestion, "[{$i}]three")->checkbox() ?>

       
                            </div>
                        </div><!-- .row -->
                       
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>


<div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>


<?php BoxWidget::end();?>