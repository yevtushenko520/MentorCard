<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestAddSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

$this->title = Yii::t('app', 'Quest Adds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quest-add-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Quest Add'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_lang_quest',
            'answer',
            'yes_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
