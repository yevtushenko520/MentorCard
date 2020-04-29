<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FrontendLangsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if(Yii::$app->user->identity->role==3 ||  Yii::$app->user->identity->role==4){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}

$posts527 = Yii::$app->db->createCommand('SELECT * FROM ban_list')->queryAll();

$this->title = Yii::t('app', 'Ban List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-langs-index">

    <h1><?= Html::encode($this->title) ?></h1>

   <div id="w0" class="grid-view">
<table class="table table-striped table-bordered"><thead>
<tr><th>User ID</th><th>Username</th><th>Email</th><th class="action-column">&nbsp;</th></tr>
</thead>
<tbody>

<?php foreach($posts527 as $kola):?>

<?php 

$posts101= Yii::$app->db->createCommand('SELECT * FROM students WHERE id='.$kola['user_id'])->queryAll();

?>

<tr data-key="1"><td><?php echo $kola['user_id']?></td><td><?php echo $posts101[0]['username']?></td><td> <?php echo $posts101[0]['email']?> </td><td> <a id='<?php echo $kola['user_id']?>' onclick='del(this)'><span  class="glyphicon glyphicon-trash" ></span></a> </td></tr>

<?php endforeach; ?>
</tbody></table>
</div>
</div>


<script>

function del(b){

   

    $.ajax({
    url: 'index.php?r=site/ban_list',
    type: "POST",
    data: {
        
        user_id:b.id
       
    },
    success: function(res){


if(res =="yes"){

  console.log(res);

  location.reload();
 

}else{

  console.log(res);
}




},

error: function(){

alert('Error!');

}
})

}


    </script>
