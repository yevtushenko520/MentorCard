<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FrontendLangs */
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

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Frontend Langs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-langs-view">

    <h1>Frontend Content</h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'lang_id',
            'first_title_home',
            'sec_title_home',
            'first_title_about',
            'sec_title_about',
            'one_about',
            'one_title_about',
            'two_about',
            'two_title_about',
            'three_about',
            'three_title_about',
            'four_about',
            'four_title_about',
            'five_about',
            'five_title_about',
            'six_about',
            'six_title_about',
            'first_title_feature',
            'sec_title_feature',
            'three_title_feature',
            'rec_feature',
            'satif_feature',
            'follow_feature',
            'first_title_creative',
            'sec_titlee_creative',
            'three_title_creative',
            'first_title_design',
            'sec_title_design',
            'up_design',
            'sat_design',
            'rec_design',
            'galery_first',
            'galery_sec',
            'first_title_easy',
            'sec_title_easy:ntext',
            'three_title_easy:ntext',
        ],
    ]) ?>

</div>
