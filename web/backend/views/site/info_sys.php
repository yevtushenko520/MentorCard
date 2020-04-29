<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use yii\bootstrap\Modal;
?>

<?php $browserAgent = $_SERVER['HTTP_USER_AGENT']; 

if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}


if(Yii::$app->user->identity->role == 4){
$posts11 = Yii::$app->db->createCommand('SELECT categor,id,email FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

}else if(Yii::$app->user->identity->role == 3){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

}else if(Yii::$app->user->identity->role == 2){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

}

$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();

  



$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$posts11[0]['id'])->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$posts11[0]['id'])->execute();

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts11[0]['id'])->execute();




?>

<?php
            /*
            Modal::begin([
                    'header' => '<h4>Confirm action</h4>',
                    'id'     => 'modal'
                    
            ]);
            
          


            echo "<div class='modal-body'>
            <p>Do you agree to synchronize your data?</p>
          </div>";
           
            echo "<div class='modal-footer'>
            <button type='button' class='btn btn-primary pull-left' onclick='syncAll()'>Save changes</button>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
           
          </div>";
            Modal::end();
           */         
        ?>
        


       

        <style>
        .modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;

z-index: -1;
  
    }
        
        </style>
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

var preload = document.createElement('div');

preload.className = "preloader";
preload.innerHTML = '<div class="b-ico-preloader"></div><div class="spinner"></div>';
document.body.appendChild(preload);

window.addEventListener('load', function() {
  // Uncomment to fade preloader after document load
  // preload.className +=  ' fade';
  setTimeout(function(){
      preload.style.display = 'none';
   },600);
})

</script>

<div class="modal fade bd-example-modal-sm" id="lewis" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <p><b><?php echo $posts1003[0]['synch_data_ans']?></b></p>
      
       
        <div class="row">
         <div class="col-sm-6 text-left">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
         </div>
         <div class="col-sm-6 text-right">
         <button type="button" class="btn btn-primary" ><?php echo $posts1003[0]['save_ch']?></button>
         </div>
       </div>
    </div>
    </div>
  </div>


<div class="modal fade bd-example-modal-sm" id="benson" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <p><b><?php echo $posts1003[0]['del_all_ans']?></b></p>
      
       
        <div class="row">
         <div class="col-sm-6 text-left">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
         </div>
         <div class="col-sm-6 text-right">
         <button type="button" class="btn btn-primary" onclick='delAll()'><?php echo $posts1003[0]['save_ch']?></button>
         </div>
       </div>
    </div>
    </div>
  </div>



<div class="callout callout-info">
          <h4><?php echo $posts1003[0]['tip']?></h4>

          <p><?php echo $posts1003[0]['ment_auto']?> <br><br>
          

          <?php 
          
          $posts8 = Yii::$app->db->createCommand('SELECT date_time FROM synchronization  WHERE user_id='.$posts11[0]['id'])->queryAll();


          if($posts8!=null){

            echo $posts1003[0]['last_synch']." ".$posts8[0]['date_time'];

          }else{


          }
          
          
          ?>
          
           </p>
        </div>
<div class="row">
<div class="col-md-6">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $posts1003[0]['synch']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong> <?php echo $posts1003[0]['follow_rec']?>:</strong>

              
              <ul>

              <?php 
              
              $posts110 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer  WHERE user_id='.$posts11[0]['id'])->queryAll();

              
              ?>
  <li class="text-muted"><?php echo $posts1003[0]['question']?>:<?php echo $posts110[0]['COUNT(*)']?></li>
  
</ul>  
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6"><button type="button" data-toggle="modal" class="btn btn-primary btn-lg btn-block" data-target="#lewis"><?php echo $posts1003[0]['sync_data']?></button></div>
<div class="col-md-3"></div>
</div>


              <hr>

             

        <div class="row">
<div class="col-md-6">
<strong> <?php echo $posts1003[0]['follow_rec_del']?>:</strong>
<ul>
<li class="text-muted"><?php echo $posts1003[0]['study_prog']?></li>
<li class="text-muted"><?php echo $posts1003[0]['rev_stat']?></li>
<li class="text-muted"><?php echo $posts1003[0]['quest_stat']?></li>
<li class="text-muted"><?php echo $posts1003[0]['questionnaires']?></li>

</ul></div>
<div class="col-md-6"><div class="callout callout-info">
    

          <p><?php echo $posts1003[0]['click_on']?></p> </div></div>
</div>      
  
<?php 



if(Yii::$app->user->identity->role == 4){
  $posts12 = Yii::$app->db->createCommand('SELECT categor,id,email FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
  }else if(Yii::$app->user->identity->role == 3){
  
    $posts12 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
  }else if(Yii::$app->user->identity->role == 2){
  
    $posts12 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
  }



 
    ?>

    <script>

   function syncAll(){

    var id_u = <?php echo $posts12[0]['id']?>;

     $.ajax({
  url: 'index.php?r=site/info_sys',
  type: "POST",
  data: {
      user_id:id_u,
      coc:2
      
  },
  success: function(res){


if(res =="yes"){

console.log(res);

location.reload();

}else{

console.log(res);
}
},

error: function(){

alert('Error!');

}
})


   }

    </script>

<script>

function delAll(){

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


  var id_u = <?php echo $posts12[0]['id']?>;

   $.ajax({
  url: 'index.php?r=site/info_sys',
  type: "POST",
  data: {
      user_id:id_u,
      coc:3
      
  },
  success: function(res){


if(res =="yes"){

console.log(res);

location.reload();

}else{

console.log(res);
}
},

error: function(){

alert('Error!');

}
})
}

</script>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6"><button type="button" data-toggle="modal" class="btn btn-danger btn-lg btn-block" data-target="#benson"><?php echo $posts1003[0]['del_all']?></button></div>
<div class="col-md-3"></div>
</div>




              <hr>

              
            </div>
            <!-- /.box-body -->
          </div>
   </div>
   <div class="col-md-6">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $posts1003[0]['app_info']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-bullhorn"></i>  <?php echo $posts1003[0]['version']?></strong>

              <p class="text-muted">
                v1.0
              </p>
              <p class="text-muted">
              <?php echo $posts1003[0]['status']?>: <?php echo $posts1003[0]['online']?>
              </p>
              <p class="text-muted">
                UserId: <?php echo $posts11[0]['id']?>
              </p>
              <p class="text-muted">
                UserEmail: <?php echo $posts11[0]['email']?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo $posts1003[0]['user_agent']?></strong>

              <p class="text-muted"><?php echo $browserAgent?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> <?php echo $posts1003[0]['api_ver']?></strong>
              
              <p class="text-muted">v1.0</p>

              
            </div>
            <!-- /.box-body -->
          </div>
   </div>
   </div>