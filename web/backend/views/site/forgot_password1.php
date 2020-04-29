<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}


$to = "evtushenko520@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);

if(Yii::$app->user->identity->id !=null){

  header("Location: http://www.mentorcard.de/backend/web/index.php");
  die();

}else{

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


$this->title = $posts1002[0]['for_pass'];


?>

<style>
.login-page, .register-page {
  background-image: url('images/bg-01.jpg');
}
.form-gap {
    padding-top: 70px;
}
</style>
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                    

                      
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <?= Html::submitButton("Reset Password", ['class' => 'login100-form-btn', 'name' => 'login-button', 'onClick'=>'reset()']) ?>
 
							
						</div>
					</div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>


<script>

function reset(){

  var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})

$.ajax({
    url: 'index.php?r=site/forgot_password1',
    type: "POST",
    data: {
        email:document.getElementById('email').value
    },
    success: function(res){


if(res =="yes"){

  console.log(res);

  alert('Password reset. Please check your email.');
  window.location.replace("http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
 

}else {

  alert('No');
  console.log(res);
}




},

error: function(){

alert('Error!');

}
})


}

</script>