<?php

use yii\helpers\Html;
use yii\grid\GridView;
use wokster\ltewidgets\BoxWidget;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
if(Yii::$app->user->identity->role ==4){

    $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==3){
  
    $posts11 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==2){
  
    $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }else{

    $posts11 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

   }

   $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();
          
   
   $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();

$this->title = Yii::t('app', $posts1003[0]['schools']);

if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

?>

   <h2 style="margin-bottom:20px;"><span><?php echo $posts1003[0]['schools']?>
</span></h2>

    <p>
        <?= Html::a(Yii::t('app', 'Create Reseller'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php BoxWidget::begin([
        'title' => $posts1003[0]['school_list'], //string
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

    <div id="w0" class="grid-view">
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th>
<th>Customer ID</th>
<th><a href="index.php?r=school%2Findex&amp;sort=school_name" data-sort="school_name">School Name</a></th>
<th><a href="index.php?r=school%2Findex&amp;sort=first_name" data-sort="first_name">First Name</a></th>
<th><a href="index.php?r=school%2Findex&amp;sort=last_name" data-sort="last_name">Last Name</a></th>
<th><a href="index.php?r=school%2Findex&amp;sort=mobile_number" data-sort="mobile_number">Mobile Number</a></th>
<th><a href="index.php?r=school%2Findex&amp;sort=email" data-sort="email">Email</a></th>
<th><a href="index.php?r=school%2Findex&amp;sort=city" data-sort="city">City</a></th>
<th class="action-column">&nbsp;</th></tr><tr id="w0-filters" class="filters"><td>&nbsp;</td>
</thead>
<tbody>


<?php 
$posts02 = Yii::$app->db->createCommand('SELECT * FROM school ')->queryAll();

$count = 1;

foreach($posts02 as $kola):

    if($kola['id']!=20020)
    
?>
<tr data-key="<?php echo $kola['id']?>">
<td><?php echo $count;?></td>
<td><?php 


$posts03 = Yii::$app->db->createCommand('SELECT * FROM customer_id WHERE user_id='.$kola['id'])->queryAll();

echo $posts03[0]['customer'];
?></td>
<td><?php echo $kola['school_name']?></td>
<td><?php echo $kola['first_name']?></td>
<td><?php echo $kola['last_name']?></td>
<td><?php echo $kola['mobile_number']?></td>
<td><a href="mailto:<?php echo $kola['email']?>"><?php echo $kola['email']?></a></td>
<td><?php echo $kola['city']?></td>
<td><a href="index.php?r=school%2Fview&amp;id=<?php echo $kola['id']?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
</td></tr>

<?php $count++; 
endforeach;
?>
</tbody></table>
</div>
<?php BoxWidget::end();?>
