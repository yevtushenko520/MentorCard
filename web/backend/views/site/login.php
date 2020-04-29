<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


$posts2 = Yii::$app->db->createCommand('SELECT * FROM  aouth_users  WHERE ip="'.$ip.'"')->queryAll();

if($posts2!=null){

	$posts1375 = Yii::$app->db->createCommand('DELETE FROM  aouth_users  WHERE ip="'.$ip.'"')->execute();

}else{

}


  
   
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
$posts1003 = Yii::$app->db->createCommand('SELECT * FROM ban_list  WHERE user_id='.$set)->queryAll();

  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}


$this->title = $posts1002[0]['login'];




$fieldOptions1 = [
    'options' => ['class' => 'wrap-input100 validate-input m-b-23'],
    'inputTemplate' => "<span class='label-input100'>".$posts1001[0]['username']."</span>{input}<span class='focus-input100' data-symbol='&#xf206;'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'wrap-input100 validate-input'],
    'inputTemplate' => "<span class='label-input100'>".$posts1001[0]['password']."</span>{input}<span class='focus-input100' data-symbol='&#xf190;'></span>"
];
?>

<?php 



?>


<style>

.label-input100{
  font-weight: bold;
}
</style>

<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">


            <?php $form = ActiveForm::begin(['options' => [
                'class' => 'login100-form validate-form'
                
             ], 'enableClientValidation' => false]); ?>
				
					<span class="login100-form-title p-b-49">
						<?php echo $posts1002[0]['login']?>
					</span>
            

                        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel($posts1002[0]['plahe']),'class' => 'input100']) ?>
						
						
			
                        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel($posts1003[0]['plahe_2']),'class' => 'input100','type'=>'password']) ?>
					



                    <div class="text-right p-t-8 p-b-31">
						
						<?= Html::a($posts1002[0]['for_pass'], ['site/forgot_password1'],['class' => 'txt2']) ?>
					</div>



					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <?= Html::submitButton($posts1002[0]['login'], ['class' => 'login100-form-btn', 'name' => 'login-button']) ?>
						</div>
					</div>
                    <div class="flex-col-c p-t-155">
                    <?= Html::a($posts1002[0]['sign_up'], ['site/signup'],['class' => 'txt2']) ?>.<br>
						
					</div>
          <div class="flex-col-c ">
                    <?= Html::a('Go to Web site', 'http://www.mentorcard.de/frontend/web/',['class' => 'txt2']) ?><br>
						
					</div>
				


					

					<?php ActiveForm::end(); ?>
				
			</div>
		</div>
	</div>
	

	
        
<style>

.preloader {
  height: 100%;
  width: 100%;
  background: #fff;
  position: fixed;
  left: 0;
  top: 0;
  z-index: 10000;
  perspective: 1600px;
  perspective-origin: 20% 50%;
  transition: 0.5s all;
  opacity: 1;
}

.spinner {
  width: 80px;
  height: 80px;
  border: 2px solid #f3f3f3;
  border-top: 3px solid #0088cf;
  border-radius: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: spin 1s infinite linear;
}

.preloader.fade {
  opacity: 0;
}

.b-ico-preloader {
  background: url(http://weblaboratory.in.ua/wp-content/themes/graphy/images/new_logo.svg);
  background-size: cover;
  width: 52px;
  height: 67px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  animation: ico 5s infinite linear;
  transform-style: preserve-3d;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

@keyframes ico {
  from {
    transform: rotateY(0deg);
  }
  to {
    transform: rotateY(360deg);
  }
}

</style>

        <script>

         function reloadAll(){

var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  preload.style.display = 'none';
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})
}

</script>


	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


