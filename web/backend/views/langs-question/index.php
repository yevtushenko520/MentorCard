<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LangsQuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

$this->title = Yii::t('app', 'Langs Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="langs-question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Langs Question'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'question_id',
            'languege',
            'question',
            'answer_yes',
            //'answer_no1',
            //'answer_no2',
            //'one',
            //'two',
            //'three',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
