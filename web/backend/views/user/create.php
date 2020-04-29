<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

header("Location: http://www.mentorcard.de/backend/web/index.php");
die();
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
