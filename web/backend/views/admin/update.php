<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
if(Yii::$app->user->identity->role==4 || Yii::$app->user->identity->role==3){

    header("Location: http://www.mentorcard.de/backend/web/index.php");
die();

}else{

}
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
