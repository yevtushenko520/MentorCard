<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudResSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  
$this->title = Yii::t('app', 'Stud Res');
$this->params['breadcrumbs'][] = $this->title;

if(Yii::$app->user->identity->role!=3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}
  
?>
<div class="stud-res-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Stud Res'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'first_name',
            'last_name',
            'password',
            //'day_birth',
            //'country',
            //'place_birth',
            //'phone_number',
            //'active_code',
            //'categor',
            //'res_id',
            //'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
