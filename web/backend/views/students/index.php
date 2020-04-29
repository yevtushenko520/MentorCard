<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
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

    $posts11 = Yii::$app->db->createCommand('SELECT id FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

   }
  
  
   $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();
  
  
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$posts1001[0]['lang_id'])->queryAll();


$this->title = Yii::t('app', $posts1003[0]['students']);
$this->params['breadcrumbs'][] = $this->title;

if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Students'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="w0" class="grid-view">
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th>
<th>Customer ID</th>
<th><a href="index.php?r=students%2Findex&amp;sort=first_name" data-sort="first_name">First Name</a></th>
<th><a href="index.php?r=students%2Findex&amp;sort=last_name" data-sort="last_name">Last Name</a></th>
<th><a href="index.php?r=students%2Findex&amp;sort=email" data-sort="email">Email</a></th>
<th class="action-column">&nbsp;</th></tr><tr id="w0-filters" class="filters"><td>&nbsp;</td>
</thead>
<tbody>

<?php 
$posts02 = Yii::$app->db->createCommand('SELECT * FROM students ')->queryAll();

$count = 1;

foreach($posts02 as $kola):

    $posts03 = Yii::$app->db->createCommand('SELECT * FROM school WHERE id='.$kola['res_id'])->queryAll();

    

    $posts04 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$kola['id'])->queryAll();


?>

<tr data-key="<?php echo $kola['id']?>">
<td>1</td>
<td><?php 


$posts03 = Yii::$app->db->createCommand('SELECT * FROM customer_id WHERE user_id='.$kola['id'])->queryAll();

echo $posts03[0]['customer'];
?></td>

<td><?php echo $kola['first_name']?></td>
<td><?php echo $kola['last_name']?></td>
<td><a href="mailto:<?php echo $kola['email']?>"><?php echo $kola['email']?></a></td>



<td><a href="index.php?r=students%2Fview&amp;id=<?php echo $kola['id']?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
 </td></tr>

<?php $count++; 
endforeach;
?>
</tbody></table>
</div>
</div>
