<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use app\models\Langs;
/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://www.mentorcard.de/backend/web/images/mini_logo.png">
   

    <?= Html::csrfMetaTags() ?>
    <title>MentorCard</title>
    <?php $this->head() ?>

     <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/backend/web/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet"  href="css/datepicker.css">
	<link rel="stylesheet"  href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="js/main2.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
 


  
</head>
<body class="login-page">

<?php
$all_size;
$langsView228 = Langs::find()->all();
foreach ($langsView228 as $value) {
	$all_size = $value['name'] .',';
}

$this->beginBody() ?>


<script>

jQuery(document).ready(function($) {
  $('#datepickerInput').datepicker({ dateFormat: 'dd/mm/yy' }).val();
});

jQuery(document).ready(function($){
 
 $('#skill1').tokenfield({
  autocomplete:{
   source: ['CROATIAN','ENGLISH','FRENCH','GERMAN','GREEK','HINDI','ITALIAN','POLISH','PORTUGESE','PUNJABI','ROMANIAN','RUSSIAN','SPANISH','TURKISH',],
   delay:0,
   limit:1
  },
  showAutocompleteOnFocus: true
 });
});

jQuery(document).ready(function($){
 
 $('#skill2').tokenfield({
  autocomplete:{
   source: ['CROATIAN','ENGLISH','FRENCH','GERMAN','GREEK','HINDI','ITALIAN','POLISH','PORTUGESE','PUNJABI','ROMANIAN','RUSSIAN','SPANISH','TURKISH',],
   delay:0,
   limit:1
  },
  showAutocompleteOnFocus: true
 });
});
</script>

   <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
