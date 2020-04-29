<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */





?>

<?php 
$x = Yii::$app->user->identity->role; 

if ($x==1) {
    $name_role = Yii::$app->user->identity->username;
    $user_email = 'super_admin@gmail.com';
    } elseif($x==2){
        $name_role = 'Admin';
        $user_email = 'admin@gmail.com';
    }
    elseif($x==3){
        $name_role = Yii::$app->user->identity->username;
        $user_email = 'school@gmail.com';
    }
    else {
        $name_role = Yii::$app->user->identity->username;
        $user_email = 'student@gmail.com';
    }

    if(Yii::$app->user->identity->role ==4){

        $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
      
       }else  if(Yii::$app->user->identity->role ==3){
      
        $posts11 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
      
       }else  if(Yii::$app->user->identity->role ==2){
      
        $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
         
       }else{

        $posts11 = Yii::$app->db->createCommand('SELECT * FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

       }

                            
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();
    
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

    


    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
      
      $posts100122 = Yii::$app->db->createCommand('SELECT * FROM log_out  WHERE ip="'.$ip.'" AND username="'.$posts3[0]['username'].'"')->queryAll();
      
      if($posts100122!=null){
      
        $posts1375 = Yii::$app->db->createCommand('DELETE FROM  log_out WHERE username="'.$posts4[0]['id'].'" AND ip="'.$ip.'"' )->execute();
      
        Yii::$app->user->logout();
      
        Yii::$app->response->redirect(['site/login']);
       
       
      
      }else{
      
      
      }

    ?>
<style>

span { font-family: Arial, Helvetica Neue, Helvetica, sans-serif; 
 }

 .student_style {
    
}
</style>

<header class="main-header">




<?php

if(Yii::$app->user->identity->username ==null){

    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
    die();
  
  }else{
  
  }

  

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";





if(Yii::$app->user->identity->role==4 && $actual_link!="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){

    echo Html::a('<img class="" style="    width: 55px;
    height: 50px;
    /* margin-left: 50px; */
    /* padding-top: 4px; */
    margin-top: 14px;" src="http://www.mentorcard.de/backend/web/images/Logo_Web.png" alt="logo">', Yii::$app->homeUrl, ['class' => 'logo','style'=>'background-color: #222d32;']);
}else if($actual_link!="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){
    echo Html::a('<img class="" style="    width: 55px;
    height: 50px;
    /* margin-left: 50px; */
    /* padding-top: 4px; */
    margin-top: 14px;" src="http://www.mentorcard.de/backend/web/images/Logo_Web.png" alt="logo">', Yii::$app->homeUrl, ['class' => 'logo']);
}



if($actual_link=="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){
    echo Html::a('<img class="" style="    width: 55px;
    height: 50px;
    /* margin-left: 50px; */
    /* padding-top: 4px; */
    margin-top: 14px;" src="http://www.mentorcard.de/backend/web/images/Logo_Web.png" alt="logo">', Yii::$app->homeUrl, ['class' => 'logo','style'=>'background-color: #008000;']);
}


?>

<style>

body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 16px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}

.main-header .sidebar-toggle {
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 25px 15px;
    font-family: fontAwesome;
}
@media (min-width: 768px){
.navbar-nav > li > a {
    padding-top: 25px;
    padding-bottom: 15px;
}
}

.navbar-nav > li > a {
    padding-top: 15px;
    padding-bottom: 10px;
    line-height: 20px;
}

.main-sidebar, .left-side {
    position: absolute;
    top: 0;
    left: 0;
    padding-top: 65px;
    min-height: 100%;
    width: 230px;
    z-index: 810;
    -webkit-transition: -webkit-transform .3s ease-in-out,width .3s ease-in-out;
    -moz-transition: -moz-transform .3s ease-in-out,width .3s ease-in-out;
    -o-transition: -o-transform .3s ease-in-out,width .3s ease-in-out;
    transition: transform .3s ease-in-out,width .3s ease-in-out;
}

.main-header .logo {
    -webkit-transition: width .3s ease-in-out;
    -o-transition: width .3s ease-in-out;
    transition: width .3s ease-in-out;
    display: block;
    float: left;
    height: 70px;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 230px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}

</style>

<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(Yii::$app->user->identity->role==4 && $actual_link!="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){

    echo " <nav class='navbar navbar-static-top ' role='navigation' style='background-color: #222d32;'>";
}else if($actual_link!="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){
    echo " <nav class='navbar navbar-static-top ' role='navigation' >";
}



if($actual_link=="http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_test"){
    echo " <nav class='navbar navbar-static-top ' role='navigation' style='background-color: #008000;'>";
}
?>
   

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

 <style>
        .modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;

z-index: -1;
  
    }

    .custom-model {
    background-color: #fefefe;
    margin: auto;
    padding: 50px;
    border: 1px solid #888;
    width: 120%;
}
.back-but{
    background-color:green;
    color:white;
}
        
        </style>


<div class="modal fade bd-example-modal-sm" id="lewis2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="custom-model">
        <p style="
    margin-bottom: 40px;
"><b>Are you sure you want to exit?</b></p>
      
       
        <div class="row">
         <div class="col-sm-6 text-left">
         <button type="button" class="btn btn-secondary" style="background-color:orange; color:white;" data-dismiss="modal">No</button>
         </div>
         <div class="col-sm-6 text-right">
         <?= Html::a(
                                     'Yes',
                                     ['/site/logout'],
                                     ['data-method' => 'post', 'class' => 'btn btn-primary back-but mr-auto']
                                 ) ?>
         </div>
       </div>
    </div>
    </div>
  </div>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu" style="
    margin-top: 13px;
" data-toggle='modal' data-target='#lewis2'>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-toggle='modal' data-target='#lewis2'>
                    <span class="glyphicon glyphicon-log-in" data-toggle='modal' data-target='#lewis2'></span>
             
                        <span class="hidden-xs" data-toggle='modal' data-target='#lewis2'>Exit</span>
                        
                    </a>
                   <!--  <ul class="dropdown-menu">
                       
                        <li class="user-header">
                           
                            <p>
                            <?php echo $name_role?>
                                
                        </p>
                        </li>
                      
                       
                        <li class="user-footer">
                            <div class="pull-left">
                                
                                <?= Html::a($posts1003[0]['web_site'], Yii::$app->urlManagerFrontEnd->baseUrl,['class'=>'btn btn-default btn-flat']) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    $posts1003[0]['sing_out'],
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>-->
                </li>

               
            </ul>
        </div>
    </nav>
</header>
