<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use phpnt\ICheck\ICheck;
use yii\bootstrap\ActiveForm;

if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}


?>


<style>

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
	top: 6px;
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
    border-color:#feb018;
}
.option-input:checked::before {
	height: 30px;
width: 30px;
position: absolute;
content: '\2714';
display: inline-block;
font-size: 20;
text-align: center;
line-height: 30px;
font-size: 40px;
}
.option-input:checked::after {
	-webkit-animation: click-wave 0.65s;
	-moz-animation: click-wave 0.65s;
	animation: click-wave 0.65s;
	background: #feb018;
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

<?php          

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



if(Yii::$app->user->identity->role ==4){

  $posts11 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==3){

  $posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==2){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
 }

 $posts10013 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();



$set = $_COOKIE["govno"];

if($set!=null){

  //  http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang

  $posts10023 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();

  $posts10033 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

 $posts1001 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE user_id='.$posts11[0]['id'])->queryAll();

 if( $posts1001 !=null){

  foreach($posts1001 as $kola):

    $posts1011 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$kola['quest_id'])->queryAll();

    if($posts1011 ==null){

      $posts1010 = Yii::$app->db->createCommand('INSERT INTO answer_chache_mock (user_id,cat,quest_id,answer_1,answer_2,answer_3,cache)
      VALUES ('.$posts11[0]['id'].', "'.$kola['cat'].'", '.$kola['quest_id'].',0,0,0,0)')->execute();


    }else{

      

    }

  endforeach;

 }else{

 }

     $posts1000 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();
     $posts1001 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE user_id='.$posts11[0]['id'])->queryAll();

     if( $posts1001!=null){

      for($i=0;$i<=25;$i++){

        foreach( $posts1001 as $kola):

          $posts1005 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE name="'.$kola['cat'].'"')->queryAll();

          $posts1009 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE tag_id='.$posts1005[0]['id'].' AND user_id='.$posts11[0]['id'])->queryAll();
          

          if($posts1009==null && $kola['cat']!="Basic Material"){


            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$posts11[0]['id'].' AND cat="'.$kola['cat'].'"')->execute();

            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_mock WHERE user_id='.$posts11[0]['id'].' AND cat="'.$kola['cat'].'"')->execute();

          }else{

          }


        endforeach;


        $posts1002 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE user_id='.$posts11[0]['id'].' AND cat="Basic Material"')->queryAll();
  
        if($posts1002[0]['COUNT(*)']>=20){
  
          foreach( $posts1000 as $kola):
  
            $posts1005 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();
  
            $posts1006 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="'.$posts1005[0]['name'].'" LIMIT 20')->queryAll();
  
            $posts1007 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE cat="'.$posts1005[0]['name'].'" AND user_id='.$posts11[0]['id'])->queryAll();
  
  
            if($posts1007[0]['COUNT(*)']>=20){
  
            }else{
  
              foreach($posts1006 as $kola):
  
       $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "'.$posts1005[0]['name'].'", '.$kola['question_id'].')')->execute();

       $posts1375 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$kola['question_id'])->queryAll();

       if($posts1375!=null){


       }else{

        $posts1010 = Yii::$app->db->createCommand('INSERT INTO answer_chache_mock (user_id,cat,quest_id,answer_1,answer_2,answer_3,cache)
        VALUES ('.$posts11[0]['id'].', "'.$posts1005[0]['name'].'", '.$kola['question_id'].',0,0,0,0)')->execute();

       }


              endforeach;
  
            }
  
          endforeach;
  
  
  
        }else{
          
          $posts1003 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="Basic Material" LIMIT 20')->queryAll();
  
          foreach($posts1003 as $kola):
  
            $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "Basic Material", '.$kola['question_id'].')')->execute();
            $posts1375 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$kola['question_id'])->queryAll();

            if($posts1375!=null){
            
            
            }else{
            
              $posts1010 = Yii::$app->db->createCommand('INSERT INTO answer_chache_mock (user_id,cat,quest_id,answer_1,answer_2,answer_3,cache)
                    VALUES ('.$posts11[0]['id'].', "Basic Material", '.$kola['question_id'].',0,0,0,0)')->execute();
            
            }
  
          endforeach;
  
        }
  
      }

     }else{

      for($i=0;$i<=25;$i++){

      $posts1002 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE user_id='.$posts11[0]['id'].' AND cat="Basic Material"')->queryAll();

      if($posts1002[0]['COUNT(*)']>=20){

        foreach( $posts1000 as $kola):

          $posts1005 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();

          $posts1006 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="'.$posts1005[0]['name'].'" LIMIT 20')->queryAll();

          $posts1007 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE cat="'.$posts1005[0]['name'].'" AND user_id='.$posts11[0]['id'])->queryAll();


          if($posts1007[0]['COUNT(*)']>=20){

          }else{

            foreach($posts1006 as $kola):

      $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "'.$posts1005[0]['name'].'", '.$kola['question_id'].')')->execute();

      $posts1010 = Yii::$app->db->createCommand('INSERT INTO answer_chache_mock (user_id,cat,quest_id,answer_1,answer_2,answer_3,cache)
      VALUES ('.$posts11[0]['id'].', "'.$posts1005[0]['name'].'", '.$kola['question_id'].',0,0,0,0)')->execute();
    
            endforeach;

          }

        endforeach;



      }else{
        
        $posts1003 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="Basic Material" LIMIT 20')->queryAll();

        foreach($posts1003 as $kola):

          $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "Basic Material", '.$kola['question_id'].')')->execute();

          $posts1010 = Yii::$app->db->createCommand('INSERT INTO answer_chache_mock (user_id,cat,quest_id,answer_1,answer_2,answer_3,cache)
          VALUES ('.$posts11[0]['id'].', "Basic Material", '.$kola['question_id'].',0,0,0,0)')->execute();

        endforeach;

      }

    }


     }



    $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_mock WHERE user_id='.$posts11[0]['id'])->queryAll();

    if($posts51==null){

      


      $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_mock (user_id,cat,number) VALUES ('.$posts11[0]['id'].', "Basic Material", 0)')->execute();

   


    

    }
    $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_mock WHERE user_id='.$posts11[0]['id'])->queryAll();

    $posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_mock WHERE user_id='.$posts11[0]['id'])->queryAll();


    $posts59 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="mock_test" AND cat="Basic Material"')->queryAll();

    $posts69 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="mock_test" AND cat="'.$posts11[0]['categor'].'"')->queryAll();


    $posts512 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();

    foreach($posts512 as $kola):

      $posts513 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();


     

     

    endforeach;

   
    $posts501 = Yii::$app->db->createCommand('SELECT cat FROM cache_mock  WHERE  user_id='.$posts11[0]['id'])->queryAll();

    $posts50 = Yii::$app->db->createCommand('SELECT quest_id FROM local_mock_quest  WHERE  cat="'.$posts501[0]['cat'].'" AND user_id='.$posts11[0]['id'])->queryAll();


if($posts55 ==null){



  $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_question_mock (quest_id,user_id) VALUES ('.$posts50[0]['quest_id'].', '.$posts11[0]['id'].')')->execute();
  
  }else{
  
  }


  

    $posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_mock WHERE user_id='.$posts11[0]['id'])->queryAll();
    




$ar = array();
$x_count_all = 0;

$count_xig = 0;


foreach($posts50 as $xyu):


    $ar[] = $xyu['quest_id'];

    $x_count_all++;


endforeach;

$post_lang_id = Yii::$app->db->createCommand('SELECT * FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();


$post_lang_1 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$post_lang_id[0]['langs_id'])->queryAll();

$La1 = $post_lang_1[0]['name'];

if($post_lang_id[1]['langs_id']!=null){

  $post_lang_2 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$post_lang_id[1]['langs_id'])->queryAll();

  $La2 = $post_lang_2[0]['name'];

}else{

  $La2 = null;

}



$posts2 = Yii::$app->db->createCommand('SELECT amtl_frage_nr,points,image FROM quesions  WHERE id='.$posts55[0]['quest_id'])->queryAll();

$posts5 = Yii::$app->db->createCommand('SELECT * FROM langs_question  WHERE question_id='.$posts55[0]['quest_id'])->queryAll();

if($La2!=null){

  $posts5_5 = Yii::$app->db->createCommand('SELECT * FROM langs_question  WHERE question_id='.$posts55[0]['quest_id'].' AND languege="'.$La2.'"')->queryAll();

}else{

}


//echo $posts55[0]['quest_id'];

$count_pages;
for ($x = 0; $x < count($ar); $x++) {

if($posts55[0]['quest_id']==$ar[$x]){

  $count_pages = $x;

  $count_pages++;

}else{

}
}


foreach($posts59 as $xyu1):

  $posts52 = Yii::$app->db->createCommand('SELECT id FROM true_answer WHERE quest_id='.$xyu1['question_id'].' AND user_id='.$posts11[0]['id'].' AND cande_quest="mock_test"')->queryAll();

  if($posts52!=null){


  

  }else{

  $posts5111 = Yii::$app->db->createCommand('SELECT points FROM quesions WHERE id='.$xyu1['question_id'])->queryAll();

  $point = $point + $posts5111[0]['points'];


  }

endforeach;


foreach($posts69 as $xyu1):

  $posts52 = Yii::$app->db->createCommand('SELECT id FROM true_answer WHERE quest_id='.$xyu['quest_id'].' AND user_id='.$posts11[0]['id'].' AND cande_quest="mock_test"')->queryAll();

  if($posts52!=null){


  

  }else{

  $posts5111 = Yii::$app->db->createCommand('SELECT points FROM quesions WHERE id='.$xyu1['question_id'])->queryAll();

  $point = $point + $posts5111[0]['points'];


  }

endforeach;



$posts551 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$posts55[0]['quest_id'])->queryAll();



  if($posts551!=null){



   
    if($posts551[0]['answer_1']==1){

      $no1 = 1;

    }else{
      $no1 = 0;
    }

    if($posts551[0]['answer_2']==1){

      $no2 = 1;

    }else{
      $no2 = 0;
    }

    if($posts551[0]['answer_3']==1){

      $no3 = 1;

    }else{
      $no3 = 0;
    }


  }else{

    

    $no1 = 0;
    $no2 = 0;
    $no3 = 0;

  }

  $posts552 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$posts11[0]['id'])->queryAll();

  if($posts552!=null){


  }else{

    

  
   $posts1375 = Yii::$app->db->createCommand('DELETE FROM  all_test_points_mock_test WHERE user_id='.$posts11[0]['id'])->execute();
    
  }


  if($point!=null || $point !=0){

    
  
    $posts5119 = Yii::$app->db->createCommand('SELECT * FROM all_test_points_mock_test WHERE user_id='.$posts11[0]['id'])->queryAll();
  
  
    if($posts5119!=null){
  
  
  
  
    }else{
  
      
  
      $id_users = $posts11[0]['id'];
  
  
      
  
      $posts121 = Yii::$app->db->createCommand('INSERT INTO all_test_points_mock_test (points,user_id) VALUES ('.$point.', '.$id_users.')')->execute();
    }
  
  
  }

?>

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

<style>
        .modal-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;

z-index: -1;
  
    }


    .back-but{
    background-color:green;
    color:white;
}


        
        </style>

<div class="modal fade bd-example-modal-sm" id="lewis" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="custom-model">
        <p style="
    margin-bottom: 40px;
"><b>Are you sure you want to submit?</b></p>
      
       
        <div class="row">
         <div class="col-sm-6 text-left">
         <button type="button" class="btn btn-secondary" style="background-color:orange; color:white;" data-dismiss="modal">No</button>
         </div>
         <div class="col-sm-6 text-right">
         <button type="button" class="btn btn-primary back-but" onclick='passExam()'>Yes</button>
         </div>
       </div>
    </div>
    </div>
  </div>


<style>

.box {
  background: #d3f6da;
}
.box-header{
  background: #008000;
}
.box-title{
  color:#fff;
}

.headerBar {
    background-color: #008000;
    height: 45px;
    width: 100%;
}

.headerBar {
    background-color: #008000;
    height: 45px;
    width: 100%;
}

.headerBar td {
    width: 33%;
    color: white;
    font-weight: bold;
    vertical-align: middle;
    padding: 10px;
}
.headerBar .center {
    text-align: center;
}
.headerBar .right {
    text-align: right;
}

.taskView {
    background-color: #D3F6DA;

}
.imageContainer {
    position: relative;
    float: left;
    margin-left: 1%;
    text-align: center;
}
.imageContainer .image {
    width: 90%;
}

</style>
 


 <?php


if(strpos($posts2[0]['image'], '.m4v') !== false || strpos($posts2[0]['image'], '.mp4') !== false){ 
  
  

  if(Yii::$app->user->identity->role ==4){

    $posts11_2 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==3){
  
    $posts11_2 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==2){
  
    $posts11_2 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }
  

   $posts51192_2 = Yii::$app->db->createCommand('SELECT * FROM video_req WHERE user_id='.$posts11_2[0]['id'].' AND quest_id='.$posts55[0]['quest_id'])->queryAll();
  

   if($posts51192_2==null){

    $posts_int = Yii::$app->db->createCommand('INSERT INTO video_req (user_id,quest_id,status) 
    VALUES ('.$posts11_2[0]['id'].', '.$posts55[0]['quest_id'].', 5)')->execute();
  
   }
 
  
  ?>

  


  <?php }?>

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




<!-- Modal -->
<div class="modal fade" id="video_id" tabindex="-1" role="dialog" aria-labelledby="video_idTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="
    width: 1500px;
    margin-top: -60px;
">
    <div class="modal-content" style="background-color: #c9e9fc;">
      <div class="modal-header" style="border-bottom-color: #c9e9fc;    border-bottom: 1px solid #c9e9fc;">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="disableAutoplay()">-->
        <!--  <span aria-hidden="true">&times;</span>-->
        </button>
      </div>
      <div class="modal-body">
      <video width="1100"  id="myVideo" height="600" >
  <source src="<?php echo Yii::getAlias('@studentImgUrl').'/'.$posts2[0]['image']?>" type="video/mp4">
Your browser does not support the video tag.
</video>
  
      </div>
    
    </div>
  </div>
</div>


<script>
var vid = document.getElementById("myVideo");
function enableAutoplay() { 
  vid.autoplay = true;
  vid.load();

  checking();

  vid.addEventListener('ended',myHandler,false);
    function myHandler(e) {
      location.reload();
      //checking();
      //$('#video_id').modal('hide');
    }
}

function disableAutoplay() { 
  vid.autoplay = false;
  vid.load();
} 


</script> 



 <?php ///tyt
 
 $posts51192 = Yii::$app->db->createCommand('SELECT * FROM quesions WHERE id='.$posts55[0]['quest_id'])->queryAll();
 

 
if(Yii::$app->user->identity->role ==4){

  $posts11_2 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==3){

  $posts11_2 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==2){

  $posts11_2 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
 }

$posts51192_2 = Yii::$app->db->createCommand('SELECT * FROM video_req WHERE user_id='.$posts11_2[0]['id'].' AND quest_id='.$posts55[0]['quest_id'])->queryAll();


 ?>

 <div class="headerBar"><table class="headerBar"><tr><td><?php echo $posts51[0]['cat'];?></td><td class="center">
 <?php echo $posts11[0]['first_name']." ".$posts11[0]['last_name']."/".$posts2[0]['amtl_frage_nr']?>
 
 </td><td class="right"><?php echo "Points:"." ".$posts51192[0]['points'];?></td></tr></table></div>


<div class="taskView">

<?php if($posts51192_2==null || $posts51192_2[0]['status']==0){?>

 <h3 style="margin-top:0px;padding-left:10px;padding-top:10px;font-size: 16pt;font-weight: bold;"><?php echo $posts5[0]['question']; ?></h3>
 <h4 style="margin-top:0px;padding-left:10px;padding-bottom:15px;font-size: 16pt;"><?php
    
    if($La2!=null){

      echo $posts5_5[0]['question']; 
    }else{

    }
    
    
    ?></h4>

     <?php }else{?>

      <h3 style="margin-top:0px;padding-left:10px;padding-top:10px;font-size: 16pt;font-weight: bold;">Please start the film in order to familiarise yourself with the situation.</h3>
    <?php }?>

    <div class="row" style="margin-bottom:25px;">
    




  
    <div class="col-md-6">
    
    
    <div class="imageContainer">
    
    
    <?php


if(strpos($posts2[0]['image'], '.m4v') !== false || strpos($posts2[0]['image'], '.mp4') !== false){ ?>



<video width="500" height="400" >
  <source src="<?php echo Yii::getAlias('@studentImgUrl').'/'.$posts2[0]['image']?>" type="video/mp4">
Your browser does not support the video tag.
</video>
  
<?php }else{ ?>
  
  <img  src="<?php echo Yii::getAlias('@studentImgUrl').'/'.$posts2[0]['image']?>" />
<?php } ?>
    
    </div>
   </div>

    <style>
.answerContainer {
    float: left;
    width: 50%;
}
.answerContainer .selectionTable {
    width: 180%;
}.answerContainer .selectionTable td {
    vertical-align: middle;
    padding: 5px;
}
    </style>
    <div class="col-md-6">

    <div class="answerContainer">
      <table class="selectionTable"><tbody><tr><td>

         <?php 

if($posts51192_2==null || $posts51192_2[0]['status']==0){
      
if($no1 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck1' style='width: 35px;
height: 35px; border: 2px solid #000;' checked onclick='onMy1()'>";

}else{

  echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck1' style='width: 35px;
height: 35px; border: 2px solid #000;' onclick='onMy1()'>";

}


}else {

  echo "<div 

  onclick='enableAutoplay()'
  data-toggle='modal' data-target='#video_id'
  
  style='
  cursor: pointer;
  width: 500px;
  background-color: grey;
  text-align: center;
  padding: 10px;
  color: white;
'>Start film</div>";
  
}

?>
  
  
  </td>


  <div class="modal fade bd-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="padding:0">
      <div class="modal-header" style="background-color: #222d32;">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"style="background-color: #c9e9fc;">
        If you switch to the question, you cannot see the film again!
        Do you really want to switch to the questions?
      </div>
      <div class="modal-footer" style="background-color: #c9e9fc;border-top-color:#c9e9fc;border-top: 1px solid #c9e9fc;  ">
        <button type="button" class="btn " style="background-color: white;" data-dismiss="modal" onClick="reset()">Yes</button>
        <button type="button" class="btn " style="background-color: white;" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

<?php if($posts51192_2==null || $posts51192_2[0]['status']==0){?>

        <td class="selectionText" style="font-weight: bold;">  <?php echo $posts5[0]['answer_yes'];?> <br>
        <p style="font-size: 12px;font-weight: normal;">
        <?php 
    
    if($posts51192_2==null || $posts51192_2[0]['status']==0){

    if($La2!=null){

      echo "(".$posts5_5[0]['answer_yes'].")";

    }else{

    }


  }

}
   
    
    ?>
        </p>
        </td></tr>


        <tr><td> 
        
        <?php 

      
if($posts51192_2==null || $posts51192_2[0]['status']==0){
if($no2 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck2' style='width: 35px;
height: 35px; border: 2px solid #000;' checked onclick='onMy1()'>";

}else{

  echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck2' style='width: 35px;
  height: 35px; border: 2px solid #000;' onclick='onMy1()'>";

}


}
else if($posts51192_2!=null && $posts51192_2[0]['status']<5){

  echo "<div 
  
  data-toggle='modal' data-target='.bd-example-modal-sm2'
  style='
  cursor: pointer;
  width: 500px;
  background-color: grey;
  text-align: center;
  padding: 10px;
  color: white;
  margin-top: 40px;
'>Go to questions</div>";
 
}

?>
        
        
        </td>

        <?php if($posts51192_2==null || $posts51192_2[0]['status']==0){?>
        <td class="selectionText" style="font-weight: bold;"> <?php echo $posts5[0]['answer_no1'];?><br>
        <p style="font-size: 12px;font-weight: normal;"><?php 

if($posts51192_2==null || $posts51192_2[0]['status']==0){
    
    if($La2!=null){

      echo "(".$posts5_5[0]['answer_no1'].")";

    }else{

    }
   
  }
   
}
  
    
    ?></p>
</td></tr><tr><td>


<?php 

      
if($posts51192_2==null || $posts51192_2[0]['status']==0){
if($no3 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck3' style='width: 35px;
height: 35px; border: 2px solid #000;' checked onclick='onMy1()'>";

}else{

  echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck3' style='width: 35px;
  height: 35px; border: 2px solid #000;' onclick='onMy1()'>";

}


} else if($posts51192_2!=null && $posts51192_2[0]['status']==5){


  echo "<div style='
  margin-top: 30px;
 
'>You can have a look at the film again <span style='color:black; font-weight: bold;
font-size: 25px;'>5</span> time(s) </div>";
    
  } else if($posts51192_2!=null && $posts51192_2[0]['status']<=4){


    echo "<div style='
    margin-top: 30px;
   
'>You can have a look at the film again <span style='color:red; font-weight: bold;
font-size: 25px;'>".$posts51192_2[0]['status']."</span> time(s) </div>";
      
    }
    

?>
        
        
        </td>

          <?php if($posts51192_2==null || $posts51192_2[0]['status']==0){?>
          <td class="selectionText" style="font-weight: bold;"> <?php echo $posts5[0]['answer_no2'];?><br>
        <p style="font-size: 12px;font-weight: normal;"><?php 
    
    if($posts51192_2==null || $posts51192_2[0]['status']==0){
    if($La2!=null){

      echo "(".$posts5_5[0]['answer_no2'].")";

    }else{

    }

  }

}
   
    
    ?></p></td></tr></tbody></table></div>



    </div>
    </div>
    <div class="row" style="margin-top:10px;">
      <div class="col-md-8">
    
 </div>
 <div class="col-md-4">






 </div>

 <div class="sheetTabContainer">

<?php


if(Yii::$app->user->identity->role == 4){



 $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();


 
} else if(Yii::$app->user->identity->role == 3){





//$posts11 = Yii::$app->db->createCommand('SELECT categor FROM school  WHERE username='.$posts10[0]['username'])->queryAll();

}else if(Yii::$app->user->identity->role == 2){

// $posts10 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

}

$posts21 = Yii::$app->db->createCommand('SELECT number,cat FROM cache_mock WHERE user_id='.$posts11[0]['id'])->queryAll();

$posts022 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id = '.$posts11[0]['id'].' AND cat = "Basic Material"')->queryAll();

if( $posts21[0]['number'] ==0 || $posts21[0]['number'] ==null){

  if($posts022!=null){
echo "<button class='sheetTab activeTab markedTask' onclick='testPass(this)' id='0' value='Basic Material'>Basic Material</button>";
  }else{
    echo "<button class='sheetTab activeTab' onclick='testPass(this)' id='0' value='Basic Material'>Basic Material</button>";
  }
}else{
 if($posts022!=null){
echo "<button class='sheetTab markedTask' onclick='testPass(this)' id='0' value='Basic Material'>Basic Material</button>";

 }else{
  echo "<button class='sheetTab' onclick='testPass(this)' id='0' value='Basic Material'>Basic Material</button>";
 }
}

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$posts11[0]['id'])->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$posts11[0]['id'])->execute();

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts11[0]['id'])->execute();


?>

 <?php 

$x_count = 0;



$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();

foreach ($posts09 as $kok):
  $x_count++;

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kok['tag_id'])->queryAll();



  foreach ($posts02 as $role):


    
$posts022 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id = '.$posts11[0]['id'].' AND cat = "'.$role['name'].'"')->queryAll();



    if($posts21[0]['cat']==$role['name']){

      if($posts022!=null){

        echo " <button onclick='clickMe(this)' id='".$x_count."'  value='".$role['name']."' class='sheetTab activeTab markedTask'>".$role['name']."</button> ";

      }else{

        echo " <button onclick='clickMe(this)' id='".$x_count."'  value='".$role['name']."' class='sheetTab activeTab '>".$role['name']."</button> ";

      }


     
  
    }else{
      if($posts022!=null){

        echo " <button onclick='clickMe(this)' id='".$x_count."'  value='".$role['name']."' class='sheetTab markedTask'>".$role['name']."</button> ";

      }else{

        echo " <button onclick='clickMe(this)' id='".$x_count."'  value='".$role['name']."' class='sheetTab'>".$role['name']."</button> ";
      }

      
    }
  


  endforeach;

 
  



endforeach;


?>


 
      <div class="navigationButtonContainer">
       

       <?php 

$posts022 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id = '.$posts11[0]['id'].' AND quest_id = '.$posts55[0]['quest_id'])->queryAll();


if($posts022!=null){

  echo "
<button class='finishButton' name='test' data-toggle='modal' data-target='#lewis'>Submit</button>
<button  class='markButton' onclick='markEnd()' >Unmark</button>
       <button onclick='onMy()' class='nextButton ' name='test'>Continue</button></div>    ";

}else{


echo "
<button class='finishButton' name='test' data-toggle='modal' data-target='#lewis'>Submit</button>
<button  class='markButton' onclick='mark()' >Mark</button>
       <button onclick='onMy()' class='nextButton ' name='test'>Continue</button></div>

       ";

      }





?>
 </div>

 <style>

.notAnsweredTasks {
    float: right;
    padding: 10px;
        padding-right: 10px;
        padding-left: 10px;
    padding-right: 10px;
    padding-left: 10px;
    text-align: left;
    padding-left: 30px;
    padding-right: 50px;
    background-image: url('images/warnung_klein.gif');
    background-repeat: no-repeat;
    background-position: left center;
}

 </style>


<?php 

$posts099 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE user_id='.$posts11[0]['id'])->queryAll();
$posts098 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_mock_quest WHERE user_id='.$posts11[0]['id'].' AND cache=1')->queryAll();

$count = $posts099[0]['COUNT(*)'] - $posts098[0]['COUNT(*)'];
?>
 <div class="notAnsweredTasks" style="display: block;">tasks left: <?php echo $count?></div>

 <div class="sheetTasksContainer">
<div class="taskButtonContainer" style="display: block;">

 <?php



$x_count_last = 1;
$next_quest;
$last_quest;


for ($x = 0; $x < count($ar); $x++) {

 if($x_count_last <=20){  

  if($posts55[0]['quest_id']==$ar[$x]){


    if($ar[$x+1] !=null){
      $next_quest = $ar[$x+1];
    }else{
      $next_quest = $ar[$x];
    }

    
    if($ar[$x-1] !=null){
      $last_quest = $ar[$x-1];
    }else{
      $last_quest = $ar[$x];
    }

    $posts60 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest  WHERE quest_id='.$ar[$x].' AND user_id='.$posts11[0]['id'])->queryAll();

    $posts022 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id = '.$posts11[0]['id'].' AND quest_id = '.$ar[$x])->queryAll();

    if($posts60[0]['cache'] ==1){

     

    echo " <div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='background:#008000; border: 4px solid black;'>". $x_count_last."</div>";



    }else{

      if($posts022!=null){

        echo " <div class='taskButton markedTask' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 4px solid black;'>". $x_count_last."</div>";

      }else{

        echo " <div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 4px solid black;'>". $x_count_last."</div>";

      }
    
  

    }
    
   

  }else{

    $posts022 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id = '.$posts11[0]['id'].' AND quest_id = '.$ar[$x])->queryAll();

    $posts60 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest  WHERE quest_id='.$ar[$x].' AND user_id='.$posts11[0]['id'])->queryAll();

    if($posts60[0]['cache'] ==1){

     

    echo " <div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='background:#008000; border: 2px solid black;'>". $x_count_last."</div>";

    }else{

    
   

    if($posts022!=null){

      echo " <div class='taskButton markedTask' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 2px solid black;'>". $x_count_last."</div>";
    }else{

      echo " <div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 2px solid black;'>". $x_count_last."</div>";

    }

    }




  }

 }
  $x_count_last++;

 

  $posts602 = Yii::$app->db->createCommand('SELECT * FROM cache_question_mock  WHERE  user_id='.$posts11[0]['id'])->queryAll();

  for($i=0;$i<=count($ar);$i++){

    if($ar[$i] == $posts602[0]['quest_id']){

      if($ar[$i++]!=null){

        $next_quest_id = $ar[$i++];
      }else{
        
       // $next_quest_id = 1;
      }

      

    }else{
 
    //  $next_quest_id = 2;

    }
   // echo $next_quest_id;

   

  }

 // echo print_r($ar);
    
 

  if($next_quest_id==null){

    $next_quest_id = 0;
  }

 // echo $next_quest_id;
} 


?>


</div></div>

<style>

.markedTask {
    background-image: url('http://www.mentorcard.de/backend/web/images/ecke.gif');
    background-position: top right;
    background-repeat: no-repeat;
}



.sheetTasksContainer {
    clear: both;
    background-color: #008000;
    height: 140px;
    margin:15px;
}
.activeTask {
    border: 4px solid black;
    margin: 5px;
}
.taskButton {
   
    float: left;
    width: 65px;
    height: 50px;
    text-align: center;
    vertical-align: middle;
    line-height: 50px;
    font-size: 16px;
    margin: 7px;
    background-color: white;
    cursor: pointer;
}

.sheetTabContainer {
    clear: both;
    
    margin:15px;
    
}

.sheetTab {
    float: left;
    height: 27px;
    line-height: 28px;
    vertical-align: middle;
    padding: 10px 20px 33px 20px;
    font-weight: bolder;
    border: 1px solid black;
    border-collapse: collapse;
    cursor: pointer;
    background-color: white;
}
.activeTab {
    background-color: #008000;
    color: white;
}
.navigationButtonContainer {
    float: right;
}
.navigationButtonContainer .finishButton {
    background-color: red;
    color: white;
}

.navigationButtonContainer button {
    font-size: 14pt;
    height: 36px;
    padding: 5px 20px 5px 20px;
    margin: 2px 5px 2px 5px;
    min-width: 120px;
    cursor: pointer;
    border: 0;
}
.navigationButtonContainer .markButton {
    background-color: orange;
}
.navigationButtonContainer .nextButton {
    background-color: #008000;
    color: white;
}

.markedTask {
   
    background-position: top right;
    background-repeat: no-repeat;
}


</style>

       <?php //// KONEC  ?>

         

       </div>


       
 <script>
          function   checking(){


var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;


var status = <?php echo $posts51192_2[0]['status']-1?>;


  

$.ajax({
   url: 'index.php?r=site/practice',
   type: "POST",
   data: {
     id_quest:id_qs,
       user_id:id_u,
       status:status,
       coc:99
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 


}else if(res =="no"){

 alert('You did not answer!');
}

else{

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
          function   reset(){


var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;


  

$.ajax({
   url: 'index.php?r=site/practice',
   type: "POST",
   data: {
     id_quest:id_qs,
       user_id:id_u,
       coc:7
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 location.reload();


}else if(res =="no"){

 alert('You did not answer!');
}

else{

 console.log(res);
}




},

error: function(){

alert('Error!');

}
})


          }

          </script>


<script type="text/javascript">

function testPass(c){

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

var id_u = <?php echo $posts11[0]['id']?>;


$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_count:c.id,
       id_value:document.getElementById(c.id).value,
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
function markEnd(){

  var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;

$.ajax({
   url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
     id_quest:id_qs,
       user_id:id_u,
       coc:6
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 location.reload();


}else if(res =="no"){

 alert('You did not answer!');
}

else{

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
function mark(){

  var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;

var user_cat = '<?php echo $posts21[0]['cat']?>';

$.ajax({
   url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
     id_quest:id_qs,
       user_id:id_u,
       user_cat:user_cat,
       coc:5
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 location.reload();


}else if(res =="no"){

 alert('You did not answer!');
}

else{

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
function passExam(){

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

var pot = <?php echo $posts2[0]['points']?>;

if($("#defaultCheck1").is(":checked")){

var answer1 = 1;
}else{

 var answer1 = 0;
}

if($("#defaultCheck2").is(":checked")){

var answer2 = 1;
}else{

 var answer2 = 0;
}

if($("#defaultCheck3").is(":checked")){

var answer3 = 1;
}else{

 var answer3 = 0;
}

var next_id = <?php echo $next_quest_id?>;

var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;


  

$.ajax({
   url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
     id_quest:id_qs,
       answer_1:answer1,
       answer_2:answer2,
       answer_3:answer3,
       next_quest:next_id,
       user_id:id_u,
       points:pot,
       coc:4
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 //location.reload();
 window.location.replace("http://www.mentorcard.de/backend/web/index.php?r=site%2Fmock_end");

}else if(res =="no"){

 alert('You did not answer!');
}

else{

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

function presMy(){

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

  var last = <?php echo $last_quest?>;
  var id_u = <?php echo $posts11[0]['id']?>;


$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_quest:last,
       user_id:id_u,
       coc:1
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
function onMy1(){



if($("#defaultCheck1").is(":checked")){

var answer1 = 1;
}else{

 var answer1 = 0;
}

if($("#defaultCheck2").is(":checked")){

var answer2 = 1;
}else{

 var answer2 = 0;
}

if($("#defaultCheck3").is(":checked")){

var answer3 = 1;
}else{

 var answer3 = 0;
}

var next_id = <?php echo $next_quest_id?>;

var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;

$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_quest:id_qs,
       answer_1:answer1,
       answer_2:answer2,
       answer_3:answer3,
       next_quest:next_id,
       user_id:id_u,
       coc:10
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

document.getElementById(id_qs).style.cssText = "background:#008000; border: 4px solid black;";

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
function onMy(){


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

if($("#defaultCheck1").is(":checked")){

var answer1 = 1;
}else{

 var answer1 = 0;
}

if($("#defaultCheck2").is(":checked")){

var answer2 = 1;
}else{

 var answer2 = 0;
}

if($("#defaultCheck3").is(":checked")){

var answer3 = 1;
}else{

 var answer3 = 0;
}

var next_id = <?php echo $next_quest_id?>;

var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;

$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_quest:id_qs,
       answer_1:answer1,
       answer_2:answer2,
       answer_3:answer3,
       next_quest:next_id,
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
<script>
function clickMeOne(b){

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

var id_u = <?php echo $posts11[0]['id']?>;

$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_quest:b.id,
       user_id:id_u,
       coc:1
   },
   success: function(res){


if(res =="yes"){

 console.log(res);

 //alert(b.id);

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
function clickMe(e){

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

var id_u = <?php echo $posts11[0]['id']?>;




$.ajax({
  url: 'index.php?r=site/mock_test',
   type: "POST",
   data: {
       id_count:e.id,
       id_value:document.getElementById(e.id).value,
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

     
   
      
       </div>    