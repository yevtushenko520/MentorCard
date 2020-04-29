<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FrontendLangsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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

$this->title = Yii::t('app', 'Frontend Content');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-langs-index">

    <h1><?= Html::encode($this->title) ?></h1>

   <div id="w0" class="grid-view">
<table class="table table-striped table-bordered"><thead>
<tr><th>Languages</th><th>Editing</th><th class="action-column">&nbsp;</th></tr>
</thead>
<tbody>
<tr data-key="1"><td>ENGLISH</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=1" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=1" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="3"><td>GERMAN</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=3" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=3" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="4"><td>HINDI</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=4" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=4" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="5"><td>PUNJABI</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=5" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=5" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
<tr data-key="6"><td>SPANISH</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=6" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=6" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="7"><td>FRENCH</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=7" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=7" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="8"><td>ITALIAN</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=8" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=8" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="9"><td>RUSSIAN</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=9" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=9" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="10"><td>ROMANIAN</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=10" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=10" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="11"><td>POLISH</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=11" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=11" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="12"><td>GREEK</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=12" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=12" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="13"><td>TURKISH</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=13" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=13" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="14"><td>PORTUGESE</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=14" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=14" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="15"><td>CHINA</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=15" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=15" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>
<tr data-key="17"><td>ARABIC</td><td><a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fview&amp;id=17" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="http://www.mentorcard.de/backend/web/index.php?r=frontend-langs%2Fupdate&amp;id=17" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a> </td></tr>

</tbody></table>
</div>
</div>
