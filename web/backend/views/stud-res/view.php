<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use app\models\Langs;
use dosamigos\chartjs\ChartJs;
use antishov\Morris;
use yii\web\JsExpression;

if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}


/* @var $this yii\web\View */
/* @var $model app\models\StudRes */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stud Res'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


if(Yii::$app->user->identity->role!=3){

  header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}
?>

<?php 

$posts33 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

$posts44 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts33[0]['username'].'"')->queryAll();


$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts44[0]['id'])->queryAll();

$posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

$posts4 = Yii::$app->db->createCommand('SELECT id,categor FROM students WHERE username="'.$model->username.'"')->queryAll();
    
    $posts229 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer  WHERE cande_quest="practice" AND user_id='.$posts4[0]['id'])->queryAll();

    $posts2228 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice"')->queryAll();



if($posts2228[0]['COUNT(*)']!=0 && $posts229[0]['COUNT(*)']!=0){



  $proc_practice = $posts229[0]['COUNT(*)']*100/$posts2228[0]['COUNT(*)'];

}else{

  $proc_practice =0;

}
    
$posts223 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer WHERE cande_quest="mock_test" AND user_id='.$posts4[0]['id'])->queryAll();
    

$posts218 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="Basic Material"')->queryAll();

$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts4[0]['id'])->queryAll();

$pop_up = 0;

foreach($posts09 as $role):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();

  $posts219 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $pop_up =  $pop_up+$posts219[0]['COUNT(*)'];

endforeach;



$all_cat_mock = $posts218[0]['COUNT(*)'] + $pop_up;


$proc_mock_end = $posts223[0]['COUNT(*)']*100/$all_cat_mock;


$count_true_mock=0;

$posts221 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE cande_quest="mock_test" AND user_id='.$posts4[0]['id'])->queryAll();

foreach ($posts221 as $gnida):

  $posts222 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gnida['quest_id'])->queryAll();

if($posts222!=null){

if($posts222[0]['cande_quest']=='mock_test' ){


  foreach($posts09 as $role):

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


    if($posts222[0]['cat']==$posts02[0]['name']){


      $count_true_mock++;

    }

  endforeach;

  

}


}

endforeach;


$proc_cat_9_true = $count_true_mock*100/$all_cat_mock;


$proc_again = 0;

$posts19 = Yii::$app->db->createCommand('SELECT id FROM tags WHERE name="'.$model->categor.'"')->queryAll();


$posts20 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags WHERE tags_id="'.$posts19[0]['id'].'"')->queryAll();




$num_vorp = 0;




foreach($posts09 as $role):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


  $posts20 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags WHERE tags_id='.$posts02[0]['id'])->queryAll();
  
  $num_vorp = $num_vorp+$posts20[0]['COUNT(*)'];

endforeach;


$count_false_mock=0;


$posts224 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE cande_quest="mock_test" AND user_id='.$posts4[0]['id'])->queryAll();

foreach ($posts224 as $gnida):

  $posts225 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gnida['quest_id'])->queryAll();

  

  if($posts225!=null){

    if($posts225[0]['cande']=='mock_test' ){

      

      foreach($posts09 as $role):

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


    if( $posts225[0]['cat']==$posts02[0]['name']){

      
      $count_false_mock++;

    }

  endforeach;
     
    
    }


  }

endforeach;


$proc_false_mock_9 =  $count_false_mock*100/$all_cat_mock;
$proc_all_quest_mock = ($num_vorp-$count_true_mock-$count_true_again_answer-$count_false_mock)*100/$num_vorp;

    ?>


<div class="stud-res-view">


  
    <div class="row">
        <div class="col-xs-6">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $posts1002[0]['prac']?></span>
              <span class="info-box-number"><?php echo round($proc_practice)?>% <?php echo $posts1002[0]['made']?></span>
      
              <div class="progress">
              <?php echo '<div class="progress-bar" style="width:'.round($proc_practice).'%"></div>'?>
                
              </div>
                  <span class="progress-description">
                  <?php echo $posts1002[0]['last_on']?> <?php echo $posts349[0]['date']?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
      
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $posts1002[0]['mock']?></span>
              <span class="info-box-number"><?php echo $posts223[0]['COUNT(*)'] ?> <?php echo $posts1002[0]['of']?> <?php echo $all_cat_mock?> <?php echo $posts1002[0]['done']?></span>
      
              <div class="progress">
              <?php echo '<div class="progress-bar" style="width:'.round($proc_mock_end).'%"></div>'?>
              </div>
                  <span class="progress-description">
                  <?php echo $posts1002[0]['not_allowed']?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
        </div>

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'username',
            'first_name',
            'last_name',
            'day_birth',
            'country',
            'place_birth',
            'phone_number',
            'active_code',
            'categor',
            'email:email',
        ],
    ]) ?>


   

     <?php BoxWidget::begin([
        'title' => $posts1002[0]['quest_status'], //string
        'border' => true,       //boolean
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

    <div class="row">
 
  <canvas id="myChart" ></canvas>


  
  
  
</div>
     
<script>
      var data = {
  labels: [
    "<?php echo round($proc_cat_9_true)?>% <?php echo $posts1002[0]['quest_ready']?> <?php echo $count_true_mock?> <?php echo $posts1002[0]['out_of']?> <?php echo $num_vorp?> <?php echo $posts1002[0]['questions']?>",
    "<?php echo round($proc_again)?>% <?php echo $posts1002[0]['quest_right']?> <?php echo $count_true_again_answer?> <?php echo $posts1002[0]['out_of']?> <?php echo $num_vorp?>",
    "<?php echo round($proc_false_mock_9)?>% <?php echo $posts1002[0]['quest_wrong']?> <?php echo $count_false_mock?> <?php echo $posts1002[0]['out_of']?> <?php echo $num_vorp?>",
    "<?php echo round($proc_all_quest_mock)?>% <?php echo $posts1002[0]['quest_un']?> <?php echo $num_vorp - ($count_true_mock +$count_true_again_answer+ $count_false_mock)?> <?php echo $posts1002[0]['out_of']?> <?php echo $num_vorp?>"
  ],
  datasets: [
    {
      data: [<?php echo round($proc_cat_9_true)?>, <?php echo round($proc_again)?>,<?php echo round($proc_false_mock_9)?>,<?php echo round($proc_all_quest_mock)?>],
      backgroundColor: [
        "#008000",
        "#FFFF00",
        "#FF0000",
        "#DCDCDC",
      ],
      hoverBackgroundColor: [
        "#008000",
        "#FFFF00",
        "#FF0000",
        "#DCDCDC",
      ]
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('myChart'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
    
        maintainAspectRatio: false,
    legend: {
      position: 'right'
    }
    
  }
});

Chart.pluginService.register({
  beforeDraw: function(chart) {
    var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

    ctx.restore();
    var fontSize = 3/2;
    ctx.font = fontSize + "em sans-serif";
    


    var text = '<?php echo $num_vorp." ".$posts1002[0]['ask']?>',
        textX = Math.round((width - ctx.measureText(text).width) /3),
        textY = height /2;

    ctx.fillText(text, textX, textY);
    ctx.save();
  }
});
</script>
    </script>
    <?php BoxWidget::end();?>

</div>
