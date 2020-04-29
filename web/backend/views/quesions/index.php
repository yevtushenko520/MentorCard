<?php

use yii\helpers\Html;
use yii\grid\GridView;
use wokster\ltewidgets\BoxWidget;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuesionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');

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

?>



<h2 style="margin-bottom:20px;"><span>Quesions
</span></h2>
    


    <?php /*Modal::begin([
        'size' =>'modal-sm',
    'header' => '<h2>Choose test</h2>',
    'toggleButton' => ['label' => 'Create Quesions',
    'class' => 'btn btn-success'
],
]); ?>

<?= Html::a(Yii::t('app', 'Mock Test'), ['create'], ['class' => 'btn btn-primary']); $joker = 1;?>

<?php Modal::end();*/


if(Yii::$app->user->identity->role ==4){

    $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==3){
  
    $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==2){
  
    $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }else{

    $posts228 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

   }



   $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts228[0]['id'])->queryAll();

   $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

   $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();
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

    <p>
    <?= Html::a(Yii::t('app', $posts1003[0]['create_lang']), ['create'], ['class' => 'btn btn-success','onClick'=>'reloadAll()']); $joker = 1;?>
    </p>
    
        <?php BoxWidget::begin([
        'title' => $posts1003[0]['quest_list'], //string
        'border' => false,       //boolean
        'color' => 'primary',    //bootstrap color name 'success', 'danger' еtс.
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
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
           // 'id',
           'testsAsString',
            'amtl_frage_nr',
            'fehlerpunkte',
           /* [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@studentImgUrl').'/'. $data['image'],
                        ['width'=>'200','height'=>'200']);
                },
            ],*/
          
            [
                'attribute'=>'categories',
                'value'=>'tagsAsString',
            ],
           // 'langsQ',
            //'points',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php BoxWidget::end();?>
