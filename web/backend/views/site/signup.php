<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use wokster\ltewidgets\BoxWidget;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
//$this->context->layout = "blank";


if(Yii::$app->user->identity->id !=null){

  header("Location: http://www.mentorcard.de/backend/web/index.php");
  die();

}else{

}



if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}



$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();

  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}



$this->title = $posts1002[0]['sign_up'];

$fieldOptions1 = [
	'options' => ['class' => 'wrap-input100 validate-input m-b-23'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['username']."</span>{input}"
];


$fieldOptions2 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['password']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Mentorcard PIN.png'></img></span>"
];

$fieldOptions3 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['email']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/email.png'></img></span>"
];
$fieldOptions4 = [
	'options' => ['class' => 'wrap-input100 validate-input m-b-23'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['first_name']."</span>{input}<span class='focus-input100'><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/First Name.png'></img></span>"
];

$fieldOptions5 = [
	'options' => ['class' => 'wrap-input100 validate-input m-b-23'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['last_name']."</span>{input}<span class='focus-input100'><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/First Name.png'></img></span>"
];
$fieldOptions6 = [
	'options' => ['class' => 'wrap-input100 validate-input'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['day_birth']."</span>{input}"
];
$fieldOptions7 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
  'inputTemplate' => "<span style='margin-top:10px;font-weight: bold;' class='label-input100' >".$posts1001[0]['mobile_no'].".</span>{input}
  <span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Mobile.png'></img></span>"
];

$fieldOptions8 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['country']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Country.png'></img></span>"
];

$fieldOptions9 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['phone_number']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Landline.png'></img></span>"
];

$fieldOptions10 = [
	'options' => ['class' => 'wrap-input100 gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['mentor_pin']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Mentorcard PIN.png'></img></span>"
];

$fieldOptions11 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "{input}"
];
$fieldOptions12 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['day_birth']."</span>{input}<span class='focus-input100' ><img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Date of Birth.png'></img></span>"
];
$fieldOptions13 = [
	'options' => ['class' => 'wrap-input100 validate-input gg'],
	'inputTemplate' => "{input}"
];

$fieldOptions14 = [
	'options' => ['class' => 'wrap-input100 gg'],
  'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['street']."</span>{input}<span class='focus-input100' >
  <img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Street.png'></img></span>"
];



$fieldOptions15 = [
	'options' => ['class' => 'wrap-input100 gg'],
  'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['house_no']."</span>{input}<span class='focus-input100' >
  <img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/House No.png'></img></span>"
];


$fieldOptions16 = [
	'options' => ['class' => 'wrap-input100 gg'],
  'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['post_code']."</span>{input}<span class='focus-input100' >
  <img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/Post code.png'></img></span>"
];



$fieldOptions17 = [
	'options' => ['class' => 'wrap-input100 gg'],
  'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['city']."</span>{input}<span class='focus-input100' >
  <img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/City.png'></img></span>"
];



$fieldOptions18 = [
	'options' => ['class' => 'wrap-input100 gg'],
  'inputTemplate' => "<span style='font-weight: bold;'>".$posts1001[0]['rap_email']."</span>{input}<span class='focus-input100' >
  <img class='manImg' width='20' height='20' style='margin-top: 35px;margin-left: 10px;' src='images/email.png'></img></span>"
];





?>

<style>
.gg{
	margin-top:15px;
}
.control-label{
  font-weight: bold;
}


@-webkit-keyframes click-wave {
 0% {
 height:20px;
 width:20px;
 opacity: 0.35;
 position: relative;
}
 100% {
 height: 200px;
 width: 200px;
 margin-left: -80px;
 margin-top: -80px;
 opacity: 0;
}
}
@-moz-keyframes click-wave {
 0% {
 height:20px;
 width:20px;
 opacity: 0.35;
 position: relative;
}
 100% {
 height: 200px;
 width: 200px;
 margin-left: -80px;
 margin-top: -80px;
 opacity: 0;
}
}
@keyframes click-wave {
 0% {
 height:20px;
 width:20px;
 opacity: 0.35;
 position: relative;
}
 100% {
 height: 200px;
 width: 200px;
 margin-left: -80px;
 margin-top: -80px;
 opacity: 0;
}
}
.option-input {
	-webkit-appearance: none;
	-moz-appearance: none;
	-ms-appearance: none;
	-o-appearance: none;
	appearance: none;
	position: relative;
	
	right: 0;
	bottom: 0;
	left: 0;
	height:18px;
	width:18px;
	-webkit-transition: all 0.15s ease-out 0s;
	-moz-transition: all 0.15s ease-out 0s;
	transition: all 0.15s ease-out 0s;
	background: #ffffff;
	border: #ccc solid 1px;
	color: #fff;
	cursor: pointer;
	display: inline-block;
	margin-right: 0.2rem;
	outline: none;
	position: relative;
	
}
.option-input:hover {
	background:#eee;
}
.option-input:checked {
	background: #000; 
  
    
}
.option-input:checked::before {
	height: 20px;
width: 20px;
position: absolute;
content: '\2714';
display: inline-block;
font-size: 20;
text-align: center;
line-height: 25px;
font-size: 29px;
}
.option-input:checked::after {
	-webkit-animation: click-wave 0.65s;
	-moz-animation: click-wave 0.65s;
	animation: click-wave 0.65s;
	background: #000;
	content: '';
	display: block;
	position: relative;
	z-index: 100;
}
.option-input.radio {
	border-radius: 50%;
    top:3px;
    width:18px;
    height:18px;
    left:-1px;
    margin-right: 0.15rem;
}
.option-input.radio::after {
	border-radius: 50%;
}
.newCheckBox {
	width: 100%;
	float: left;
}
.disabled::before {
	height:18px;
	width:18px;
	position: absolute;
	content: '\2716';
	display: inline-block;
	font-size: 20;
	text-align: center;
	line-height: 18px;
    background: #c0bebe;
    left:-1px;
    top:0px;
}
.disabled:checked {
	background: #c0bebe !important;
}
.newCheckBox label {
	width: 100%;
	display: inline-block;
}

</style>




<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            
            <?php $form = ActiveForm::begin(['options' => [
                'class' => 'login100-form validate-form'
             ]]); ?>
				
					<span class="login100-form-title p-b-49">
					<?php echo $posts1002[0]['sign_up']?>
                    </span>

         <?php 
         $data2 = [
          "Mr" => "Mr",
          "Mrs" => "Mrs",
          "Miss" => "Miss",
          "Ms" => "Ms",
          "Others" => "Others"
         
      ];
         
         ?>          

<?= $form->field($model, 'sex')->widget(Select2::classname(), [
    'data' => $data2,
    'language' => 'de',
    'options' => ['placeholder' => 'Select your title ...','multiple' => false],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]) ?>
                    
					<?= $form
            ->field($model, 'first_name', $fieldOptions4)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your First Name'),'class' => 'input100']) ?>

			<?= $form
            ->field($model, 'last_name', $fieldOptions5)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Last Name'),'class' => 'input100']) ?>


<?= $form
            ->field($model, 'day_birth', $fieldOptions12)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Day Birth'),
            'class' => 'input100','id'=>'datepickerInput']) ?>



<?= $form
            ->field($model, 'street', $fieldOptions14)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Street'),
            'class' => 'input100','id'=>'datepickerInput']) ?>


            <?= $form
            ->field($model, 'house_no', $fieldOptions15)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your House No.'),
            'class' => 'input100','id'=>'datepickerInput']) ?>


                    <?= $form
            ->field($model, 'post_code', $fieldOptions16)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Post Code'),
            'class' => 'input100','id'=>'datepickerInput']) ?>



              <?= $form
            ->field($model, 'city', $fieldOptions17)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your City'),
            'class' => 'input100','id'=>'datepickerInput']) ?>



	<?= $form
            ->field($model, 'country', $fieldOptions8)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Country'),'class' => 'input100']) ?>

		<?= $form
            ->field($model, 'phone_number', $fieldOptions9)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Phone Number'),'class' => 'input100','type'=>'tel']) ?>

            <?= $form
            ->field($model, 'place_birth', $fieldOptions7)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Mobile Number'),'class' => 'input100']) ?>

		
    <?= $form
            ->field($model, 'email', $fieldOptions3)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your email'),'class' => 'input100']) ?>

            

            		
    <?= $form
            ->field($model, 'rap_email', $fieldOptions18)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Repeat Email'),'class' => 'input100']) ?>

            <div class="wrap-input100 validate-input gg field-signupform-email required has-error">


			<?= $form
            ->field($model, 'password', $fieldOptions2)
						->label(false)
				
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your password'),'class' => 'input100','type'=>'password']) ?>



				

	<script>

function check_pass() {
    if (document.getElementById('signupform-email').value ==
            document.getElementById('rep-email').value) {

              document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Confirm!';
        
    } else {

       document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Do not match!';
        
    }
}
  </script>
			
			<?= $form->field($model, 'langs_array',$fieldOptions11)->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Langs::find()->all(),'id','name'),
    'language' => 'de',
    'options' => ['placeholder' => 'Select your language ...','multiple' => true],
    'pluginOptions' => [
		'allowClear' => true,
        'tags' => true,
        'maximumInputLength' => 2
    ],
]) ?>


 <?= $form->field($model, 'lang_array',$fieldOptions13)->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\LangsW::find()->all(),'id','name'),
    'language' => 'de',
    'options' => ['placeholder' => 'Select your language ...','multiple' => false],
   
]) ?>

			<?= $form
            ->field($model, 'activation_code', $fieldOptions10)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Type your Mentorcard Pin'),'class' => 'input100']) ?>


            <?php 
            
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
              $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
              $ip = $_SERVER['REMOTE_ADDR'];
            }


            $posts_tes = Yii::$app->db->createCommand('SELECT * FROM check_active_code WHERE user_id="'.$ip.'"')->queryAll();


            if($posts_tes!=null){

              $posts1375 = Yii::$app->db->createCommand('DELETE FROM  check_active_code WHERE user_id="'.$ip.'"' )->execute();

              echo "	<div class='text-left p-t-8 p-b-31'>";
             echo  "<p class='help-block help-block-error' style='color:red' id='message'>Wrong MentorCard Pin</p></div>";
              
    
            }
            
            ?>






<style>

label {
  display: block;
  padding-left: 15px;
  text-indent: -15px;
  font-weight: normal;
}
input {
  width: 13px;
  height: 13px;
  padding: 0;
  margin:0;
  vertical-align: bottom;
  position: relative;
  top: -1px;
  *overflow: hidden;
}
</style>

<style>

.select2-container--krajee .select2-selection--single {
    height: 34px;
    line-height: 1.428571429;
    padding: 6px 24px 6px 2px;
}
.select2-container--krajee .select2-selection--multiple .select2-search--inline .select2-search__field {
    background: transparent;
     padding: 0 0px;
    height: 32px;
    line-height: 1.428571429;
    margin-top: 0;
    min-width: 5em;
}

.select2-container .select2-selection--multiple .select2-selection__rendered {
    display: inline-block;
    overflow: hidden;
    padding-left: 3px;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
     padding-left: 0px; 
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}



</style>

   
    <div style="margin-top:10px;">
    <label><input class='option-input checkbox2 '  style='width: 25px;
  height: 25px; border: 2px solid #000;' onclick="klik1();" name="shest04" type='checkbox'> I have read the <a href="terms.pdf" target="_blank">terms and conditions</a> and agree <br> <p style="
    margin-left: 30px;
    color: black;
    font-weight: normal;
">with them.</p></label>
    
  </div>
  <div style="margin-top:15px;">
    <label><input class='option-input checkbox2 '   style='width: 25px;
  height: 25px; border: 2px solid #000;' onclick="klik1();" name="shest04" type='checkbox'> I have read the <a href="private.pdf" target="_blank">privacy policy</a> and agree with them.</label>
  </div >
  <div style="margin-top:15px; margin-bottom:20px;">
    <label><input class='option-input checkbox2 '  style='width: 25px;
  height: 25px; border: 2px solid #000;' onclick="klik1();" name="shest04" type='checkbox'> I agree that Sood Germany GmbH will also send <br>
    <p style="
    margin-left: 28px;
    margin-bottom:0px;
    color: black;
    font-weight: normal;
">me further offers by post and / or email and /<br></p><p style="
   
margin-left: 28px;
    margin-top: 0px;
    color: black;
    font-weight: normal;
    margin-bottom:0px;
"> or Mobile/or Whatsapp and/ or inform me of<br></p><p style="
   
   margin-left: 28px;
       margin-top: 0px;
       color: black;
       font-weight: normal;
   
   "> any changes.</p></label>
  </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms and conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Emails do not match!
      </div>
      
    </div>
  </div>
</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<?= Html::submitButton($posts1002[0]['sign_up'], ['class' => 'login100-form-btn', 'id'=>'myBtn','name' => 'signup-button','disabled' => 'disabled']) ?>
		
						</div>
					</div>

<div class="flex-col-c p-t-155">
                    <?= Html::a($posts1002[0]['i_have'], ['site/login'],['class' => 'txt2']) ?>.<br>
						
					</div>
					
                    	
                    <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>

	<script>
var vse = document.getElementsByName('shest04');

function klik1() {
  if (Array.prototype.every.call(vse, function(e) {return e.checked == true;})) {

    if(document.getElementById('signupform-email').value ==
            document.getElementById('signupform-rap_email').value){
    document.getElementById("myBtn").disabled = false;

            }else if(document.getElementById('signupform-email').value !=
            document.getElementById('signupform-rap_email').value){

              $('#exampleModal2').modal('show');
              
            }
  } else {
  
  }
}
</script>

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

