<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use wokster\ltewidgets\BoxWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Quesions */




$this->title = 'Question - '.$model->amtl_frage_nr;


if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}


if(Yii::$app->user->identity->role!=1){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

$x = 1;
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


<div class="quesions-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary','onClick'=>'reloadAll()']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?php BoxWidget::begin([
        'title' => 'Question info', //string
        'border' => true,       //boolean
        'color' => 'warning',    //bootstrap color name 'success', 'danger' еtс.
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


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
           'testsAsString',
            'amtl_frage_nr',
            'fehlerpunkte',
           
               'tagsAsString',
          /* [
            
              'attribute'=>'iframe',
              'value'=> Yii::getAlias('@studentImgUrl').'/'.$model->image,
                 'format'=>['image',['width'=>'200','height'=>'200']]
           ],*/
            'points',
            
          
        ],
    ]) ?>
<table id="w0" class="table table-striped table-bordered detail-view"><tbody>
<tr ><th>Image/Video</th>
<td>

<?php

if(strpos($model->image, '.m4v') !== false || strpos($model->image, '.mp4') !== false){ ?>



<video width="320" height="240" controls>
  <source src="<?php echo Yii::getAlias('@studentImgUrl').'/'.$model->image?>" type="video/mp4">
Your browser does not support the video tag.
</video>
  
<?php }else{ ?>
  
  <img  width="320" height="240" src="<?php echo Yii::getAlias('@studentImgUrl').'/'.$model->image?>" />
<?php } ?>


</td></tr>
</tbody></table>

   <?php foreach ($langsQuestions as $langs): ?>
   
   <?$x +1;?>

       <?= DetailView::widget([
        'model' => $langsQuestions,
        'attributes' => [
            [
                'label' => 'Question №'.$x++,
                'value' => $langs['languege'],
               ],
           [
            'label' => 'Languege',
            'value' => $langs['languege'],
           ],
           [
            'label' => 'Answer #1',
            'value' => $langs['answer_yes'],
           ],
           [
            'label' => 'Answer #2',
            'value' => $langs['answer_no1'],
           ],
           [
            'label' => 'Answer #3',
            'value' => $langs['answer_no2'],
           ],
           [
            'label' => '-',
            'value' => '-',
           ],
            
            
        ],
    ]) ?>
       
       
   <?php endforeach; ?>


<?php BoxWidget::end();?>
