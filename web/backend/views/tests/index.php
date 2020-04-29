<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){
    header("Location: http://www.mentorcard.de/backend/web/index.php");
    die();
    
    }else{
    
    }

$this->title = Yii::t('app', 'Chapters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tests-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Chapters'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
