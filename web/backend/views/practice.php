
<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use phpnt\ICheck\ICheck;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
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
	background: #feb018; 
    border-color:#feb018;
}
.option-input:checked::before {
	height:18px;
	width:18px;
	position: absolute;
	content: '\2714';
	display: inline-block;
	font-size: 20;
	text-align: center;
	line-height: 18px;
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


$no1 = 0;
$no2 = 0;
$no3 = 0;






if(Yii::$app->user->identity->role ==4){

  $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==3){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==2){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
 }


 $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts11[0]['id'])->queryAll();




$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();

  $posts1003 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}



 $posts29 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac  WHERE user_id='.$posts11[0]['id'])->queryAll();


$posts32 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts11[0]['id'])->queryAll();
 



  $posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts11[0]['id'])->execute();

  $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();

  if($posts51==null){

    $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_buttons (user_id,number,cat) VALUES ('.$posts11[0]['id'].', 0, "Basic Material")')->execute();

  }

  $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();

  $posts50 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="practice" AND cat="'.$posts51[0]['cat'].'"')->queryAll();

  //echo print_r($posts50);

  $posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_practice WHERE user_id='.$posts11[0]['id'])->queryAll();


  $posts01 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();//есть



  $tags_nety = [];
  
  
  foreach($posts01 as $kola):
  
    $posts03 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac WHERE user_id='.$posts11[0]['id'].' AND tag_id='.$kola['tag_id'])->queryAll();//есть
  
    if($posts03!=null){
  
  
    }else{
  
      $tags_nety[$g] = $kola['tag_id'];
  
      $g++;
  
    }
  
  endforeach;
  
  

  $x = 25 ;
  
  $posts502 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть
  
  if($posts502==null){
  
    for($i=0;$i<=25;$i++){
  
    foreach($tags_nety as $niga):
  
      $posts501 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть
  
      
  
      if($posts501[0]['cat']!="Basic Material"){
  
      $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$niga)->queryAll();
  
      $posts68 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question 
       WHERE cande="practice" AND cat="Basic Material" AND category="'.$posts02[0]['name'].'"')->queryAll();
  
  foreach($posts68 as $kola):
  
    $posts121 = Yii::$app->db->createCommand('INSERT INTO local_prac_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "Basic Material", '.$kola['question_id'].')')->execute();
  
  endforeach;
  
  
      }else{
  
        foreach($tags_nety as $niga):
  
          $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$niga)->queryAll();
  
          $posts501 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();//есть
  
          if($posts501==null){
  
            foreach($tags_nety as $niga1):
  
              $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$niga1)->queryAll();
  
             
  
                $posts68 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question 
       WHERE cande="practice" AND cat="'.$posts02[0]['name'].'"')->queryAll();
  
  
  foreach($posts68 as $kola):
  
    $posts121 = Yii::$app->db->createCommand('INSERT INTO local_prac_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "'.$posts02[0]['name'].'", '.$kola['question_id'].')')->execute();
  
  endforeach;
  
             
  
  
            endforeach;
  
          }else{
  
  
          break;
  
          }
  
  
        endforeach;
  
  
      }
  
    
    endforeach;
  
  }
  
  }else{
  
  
    foreach($tags_nety as $kola):
  
      $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola)->queryAll();
  
      $posts501 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть
  
      foreach($posts501 as $kik):
  
        $posts03 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE name="'.$kik['cat'].'"')->queryAll();
  
        $posts04 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac WHERE user_id='.$posts11[0]['id'].' AND tag_id='.$posts03[0]['id'])->queryAll();//есть
  
        if($posts04!=null){
  
          $posts1375 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE user_id='.$posts11[0]['id'].' AND cat="'.$kik['cat'].'"')->execute();
  
        }else{
  
  
        }
  
      endforeach;
  
      $posts505 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();//есть
  
      if($posts505 ==null){
  
        $posts68 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question 
        WHERE cande="practice" AND cat="'.$posts02[0]['name'].'"')->queryAll();
  
  foreach($posts68 as $kola):
  
    $posts121 = Yii::$app->db->createCommand('INSERT INTO local_prac_quest (user_id,cat,quest_id) VALUES ('.$posts11[0]['id'].', "'.$posts02[0]['name'].'", '.$kola['question_id'].')')->execute();
  
  endforeach;
  
  
      }else{
  
      }
  
  
  
    endforeach;
  
  }




  $posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

  $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();
  
  $posts50 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="practice" AND cat="'.$posts51[0]['cat'].'"')->queryAll();
  
  
  if($posts55 !=null){
  
    
  ///$posts121 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$posts50[0]['question_id'].' WHERE user_id='.$user_id)->execute();
  
  $posts56 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest WHERE user_id='.$posts11[0]['id'])->queryAll();
  
  foreach($posts56 as $kola):

    
  
      if($posts55[0]['quest_id']==$kola['quest_id']){

       
  
          $posts57 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();
  
         // $posts58 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$posts55[0]['quest_id'])->queryAll();

          $posts58 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$posts55[0]['quest_id'])->queryAll();
  
          if($posts57[0]['cat']==$posts58[0]['cat']){
  
          }else{
  

              $posts58 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts57[0]['cat'].'"')->queryAll();

              foreach($posts58 as $kola2):

                
                $posts59 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$kola2['quest_id'])->queryAll();

                if($posts59 ==null){

                  $posts121 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$kola2['quest_id'].' WHERE user_id='.$posts11[0]['id'])->execute();

                  break;

                }else{

                }

              endforeach;
  
              
  
          }
  
      }
  
  endforeach;
  
  }else{

    $posts57 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();
  
    $posts58 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts57[0]['cat'].'"')->queryAll();

    if($posts58!=null){

  $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_question_practice (quest_id,user_id) VALUES ('.$posts58[0]['quest_id'].', '.$posts11[0]['id'].')')->execute();

    }else{


      


    }


  }
  

  $posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

  $posts551 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$posts55[0]['quest_id'])->queryAll();


  $posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$posts11[0]['id'])->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$posts11[0]['id'])->execute();





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


  $posts552 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

  if($posts552!=null){


  }else{

    $posts1375 = Yii::$app->db->createCommand('DELETE FROM  all_test_points_prac WHERE user_id='.$posts11[0]['id'])->execute();

  }



  $post_lang_id = Yii::$app->db->createCommand('SELECT * FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();


  $post_lang_1 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$post_lang_id[0]['langs_id'])->queryAll();

  $La1 = $post_lang_1[0]['name'];

  if($post_lang_id[1]['langs_id']!=null){

    $post_lang_2 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$post_lang_id[1]['langs_id'])->queryAll();

    $La2 = $post_lang_2[0]['name'];

  }else{

    $La2 = null;

  }



 
  

  $posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();

  if($posts51==null){

    $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_buttons (user_id,cat,number) VALUES ('.$posts11[0]['id'].', "Basic Material", 0)')->execute();

  }

  $posts01 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();


  if($posts51[0]['cat']!="Basic Material"){
  
  }


  else{


foreach($posts01 as $xyu2):
  
    $posts03 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac WHERE user_id='.$posts11[0]['id'].' AND tag_id='.$xyu2['tag_id'])->queryAll();

    if($posts03!=null){
  
  
    }else{
  
      $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$xyu2['tag_id'])->queryAll();
  
      break;
    }
  
  endforeach;


 

  }



  

  

  $posts506 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть


  $posts507 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть

 

  if($posts506[0]['quest_id']!=$posts507[0]['quest_id']){

     $posts1375 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_practice WHERE user_id='.$posts11[0]['id'])->execute();

  foreach($posts506 as $kola):

    $posts121 = Yii::$app->db->createCommand('INSERT INTO answer_chache_practice (user_id,quest_id,answer_1,answer_2,answer_3,cat) 
    VALUES ('.$posts11[0]['id'].', '.$kola['quest_id'].', 0,0,0,"'.$kola['cat'].'")')->execute();

  endforeach;
  
}else{

}



foreach($posts01 as $xyu2):

  //done_test_prac

 // $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$xyu2['tag_id'])->queryAll();

  $posts03 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac WHERE user_id='.$posts11[0]['id'].' AND tag_id='.$xyu2['tag_id'])->queryAll();

  if($posts03!=null){


  }else{

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$xyu2['tag_id'])->queryAll();

    break;
  }

endforeach;

  $posts59 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest  WHERE  cat="'.$posts02[0]['name'].'" AND user_id='.$posts11[0]['id'])->queryAll();



$ar = array();
$x_count_all = 0;


$point = 0;

$posts590 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons  WHERE  user_id='.$posts11[0]['id'])->queryAll();


$posts502 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest  WHERE  cat="'.$posts590[0]['cat'].'" AND user_id='.$posts11[0]['id'])->queryAll();



foreach($posts502 as $xyu):



  $posts52 = Yii::$app->db->createCommand('SELECT id FROM true_answer WHERE quest_id='.$xyu['quest_id'].' AND user_id='.$posts11[0]['id'].' AND cande_quest="practice"')->queryAll();

  if($posts52!=null){


  

  }else{
    

    $ar[] = $xyu['quest_id'];

    $x_count_all++;

   

    

  

  }

 


endforeach;









foreach($posts59 as $xyu1):

  $posts52 = Yii::$app->db->createCommand('SELECT id FROM true_answer 

  WHERE quest_id='.$xyu1['quest_id'].' AND user_id="'.$posts11[0]['id'].'"'.' AND cande_quest="practice"')->queryAll();

  if($posts52!=null){


  

  }else{

  $posts5111 = Yii::$app->db->createCommand('SELECT points FROM quesions WHERE id='.$xyu1['quest_id'])->queryAll();

  $point = $point + $posts5111[0]['points'];


  }

endforeach;


$posts01 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();




foreach($posts01 as $xyu2):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$xyu2['tag_id'])->queryAll();

$posts69 = Yii::$app->db->createCommand('SELECT quest_id FROM local_prac_quest  WHERE  cat="'.$posts02[0]['name'].'" AND user_id='.$posts11[0]['id'])->queryAll();


foreach($posts69 as $xyu1):




  $posts52 = Yii::$app->db->createCommand('SELECT id FROM true_answer 

  WHERE quest_id='.$xyu1['quest_id'].' AND user_id="'.$posts11[0]['id'].'"'.' AND cande_quest="practice"')->queryAll();

  if($posts52!=null){




  }else{

   

  $posts5111 = Yii::$app->db->createCommand('SELECT points FROM quesions WHERE id='.$xyu1['quest_id'])->queryAll();

  $point = $point + $posts5111[0]['points'];


  }

endforeach;

endforeach;


//points
if($point!=null || $point !=0){

  $posts5119 = Yii::$app->db->createCommand('SELECT * FROM all_test_points_prac WHERE user_id='.$posts11[0]['id'])->queryAll();


  if($posts5119!=null){

   


  }else{

    $posts121 = Yii::$app->db->createCommand('INSERT INTO all_test_points_prac (points,user_id) VALUES ('.$point.'
                , '.$posts11[0]['id'].')')->execute();
  }


}




$questions = [];
//ид вопроса Basic


$posts = Yii::$app->db->createCommand('SELECT qeust_id FROM qeust_tags  WHERE tags_id=8')->queryAll();

$posts21 = Yii::$app->db->createCommand('SELECT number,cat FROM cache_buttons WHERE user_id='.$posts11[0]['id'])->queryAll();

foreach($posts as $key):

    $questions[$k] = $key['qeust_id'];
      $k++;

endforeach;


$questions_pr = [];
//проверка на practice


    $posts1 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="practice"')->queryAll();

    foreach($posts1 as $vali):


        $questions_pr[$g] = $vali['question_id'];
        $g++;

    endforeach;
  
//всего вопросов Basic+Practice
$count_q =0;
$id_first;
foreach($questions_pr as $valumi):
   
    foreach($questions as $valumix):
       
    if($valumi ==$valumix){
        if($count_q <1){
              
            $id_first =$valumix;
            $count_q++;
           
        }else{

     
        $count_q++;
       

        }

    }else{
        
    }
endforeach;
endforeach;

$posts2 = Yii::$app->db->createCommand('SELECT amtl_frage_nr,points,image FROM quesions  WHERE id='.$posts55[0]['quest_id'])->queryAll();
$posts3 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags  WHERE qeust_id='.$posts55[0]['quest_id'])->queryAll();
//$posts4 = Yii::$app->db->createCommand('SELECT name FROM tags  WHERE id='.$posts3[0]['tags_id'])->queryAll();

$posts5 = Yii::$app->db->createCommand('SELECT * FROM langs_question  WHERE question_id='.$posts55[0]['quest_id'].' AND languege="'.$La1.'"')->queryAll();

//echo $posts55[0]['quest_id'];

if($La2!=null){

  $posts5_5 = Yii::$app->db->createCommand('SELECT * FROM langs_question  WHERE question_id='.$posts55[0]['quest_id'].' AND languege="'.$La2.'"')->queryAll();

}else{

}

$posts6 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();




$count_pages;
for ($x = 0; $x < count($ar); $x++) {

if($posts55[0]['quest_id']==$ar[$x]){

  $count_pages = $x;

  $count_pages++;

}else{

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
  z-index: -1;
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
        
        </style>

<!-- Modal -->
<div class="modal fade" id="lewis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $posts1003[0]['confirm']?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p><?php echo $posts1003[0]['realy_finish']?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $posts1003[0]['close']?></button>
        <button type="button" class="btn btn-primary" onclick='passExam()'><?php echo $posts1003[0]['pass_exam']?></button>
      </div>
    </div>
  </div>
</div>

<?php 




$posts70 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons  WHERE user_id='.$posts11[0]['id'])->queryAll();
$posts60 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts70[0]['cat'].'"')->queryAll();

//echo print_r($posts70[0]['cat']);

$count_page_x = 0;
$count_page_y = 0;

foreach($posts60 as $niga):

  $count_page_x++;

  $posts701 = Yii::$app->db->createCommand('SELECT * FROM cache_question_practice  WHERE user_id='.$posts11[0]['id'])->queryAll();

  if($niga['quest_id']==$posts701[0]['quest_id']){

    $count_page_y = $count_page_x;

    break;

  }else{

  }

endforeach;

$posts65 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts70[0]['cat'].'"')->queryAll();

$posts702 = Yii::$app->db->createCommand('SELECT * FROM cache_question_practice  WHERE user_id='.$posts11[0]['id'])->queryAll();

$posts703 = Yii::$app->db->createCommand('SELECT * FROM quesions  WHERE id='.$posts702[0]['quest_id'])->queryAll();

?>

<style>

.box {
  background: #d2e0ff;
}
.box-header{
  background: #0737a5;
}
.box-title{
  color:#fff;
}


.headerBar {
    background-color: #3c8dbc;
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
    background-color: #c9e9fc;

}
.imageContainer {
    position: relative;
    float: left;
    margin-left: 1%;
    text-align: center;
    margin-bottom:25px;
}
.imageContainer .image {
    width: 90%;
}
</style>

   <?php 

   ////start


    ?>


    
 <?php ///tyt
 
 $posts51192 = Yii::$app->db->createCommand('SELECT * FROM quesions WHERE id='.$posts55[0]['quest_id'])->queryAll();
 
 ?>

 <div class="headerBar"><table class="headerBar"><tr><td><?php echo $posts51[0]['cat'];?></td><td class="center">Max Mustermann - Desk 01</td><td class="right"><?php echo $posts1002[0]['error_point']." ".$posts51192[0]['points'];?></td></tr></table></div>


<div class="taskView">

    <h3 style="margin-top:0px;padding:10px;font-size: 16pt;font-weight: bold;"><?php echo $posts5[0]['question'];?></h3>
    <h4 style="margin-top:0px;padding:10px;font-size: 16pt;"><?php
    
    if($La2!=null){

      echo $posts5_5[0]['question']; 
    }else{

    }
    
    
    ?></h4>

    <div class="row">
    <div class="col-md-6"><?php


if($posts2[0]['image']==null){



 echo '
 <div class="imageContainer">
 <img class="image" style="display: block;" src="' .'images/students/non.png"> 
 </div>';


}else{



 echo '
 <div class="imageContainer">
 <img class="image" style="display: block;" src="' .'images/students/'.$posts2[0]['image'] . '"> 
 </div>';
}





?></div>

    <div class="col-md-6">
    <div class="form-check">
      <?php 

      
      
      if($no1 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck1' style='width: 35px;
height: 35px; border: 2px solid #000;' checked>";

      }else{

        echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck1' style='width: 35px;
        height: 35px; border: 2px solid #000;'>";

      }
      
      ?>
  
  <label class="form-check-label" for="defaultCheck1" style="margin-bottom:5px;vertical-align: middle;
   
   padding: 15px;word-wrap:break-word;">
    <?php echo $posts5[0]['answer_yes'];?>
    <p style="font-size: 12px;font-weight: normal;"><?php 
    
    if($La2!=null){

      echo "(".$posts5_5[0]['answer_yes'].")";

    }else{

    }
   
    
    ?></p>
  </label>
</div>
<div class="form-check">

 <?php 
      
      if($no2 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck2' style='width: 35px;
height: 35px; border: 2px solid #000;' checked>";

      }else{

        echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck2' style='width: 35px;
        height: 35px; border: 2px solid #000;'>";

      }
      
      ?>
  <label class="form-check-label" for="defaultCheck2" style="margin-bottom:5px;vertical-align: middle;
   
   padding: 15px;">
   <?php echo $posts5[0]['answer_no1'];?>
   <p style="font-size: 12px;font-weight: normal;"><?php 
    
    if($La2!=null){

      echo "(".$posts5_5[0]['answer_no1'].")";

    }else{

    }
   
    
    ?></p>
  </label>
</div>
<div >
<?php 
      
      if($no3 ==1){

echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck3' style='width: 35px;
height: 35px; border: 2px solid #000;' checked>";

      }else{

        echo "<input class='option-input checkbox subject-list' type='checkbox' value='1' id='defaultCheck3' style='width: 35px;
        height: 35px; border: 2px solid #000;'>";

      }
      
      ?>
  <label class="form-check-label" for="defaultCheck3" style="margin-bottom:5px;vertical-align: middle;
   
   padding: 15px;">
   <?php echo $posts5[0]['answer_no2'];?>
   <p style="font-size: 12px;font-weight: normal;"><?php 
    
    if($La2!=null){

      echo "(".$posts5_5[0]['answer_no2'].")";

    }else{

    }
   
    
    ?></p>
  </label>
</div>
    </div>
   

    
<style>

.sheetTasksContainer {
    clear: both;
    background-color: #3c8dbc;
    height: 140px;
   
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
    
    margin:20px;
    
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
    background-color: #222d32;
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
.notAnsweredTasks {
    float: right;
    padding: 10px;
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

    
    <div class="sheetTabContainer">


 <?php

if( $posts21[0]['number'] ==0 || $posts21[0]['number'] ==null){

 echo "<button class='sheetTab activeTab' onclick='clickMe(this)' id='0' value='Basic Material'>Basic Material</button>";
}else{
  echo "<button class='sheetTab' onclick='clickMe(this)' id='0' value='Basic Material'>Basic Material</button>";
}

?>

<?php 

$x_count = 0;

$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts11[0]['id'])->queryAll();

foreach ($posts09 as $kok):
  $x_count++;

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kok['tag_id'])->queryAll();



  foreach ($posts02 as $role):


    $posts03 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE name="'.$role['name'].'"')->queryAll();

    //echo $posts03[0]['id'];

    $posts04 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac WHERE user_id='.$posts11[0]['id'].' AND tag_id='.$posts03[0]['id'])->queryAll();


    if($posts21[0]['cat']==$role['name']){

      if($posts04==null){

      echo "
  
    
    <button onclick='clickMe(this)' id='".$x_count."' class='sheetTab activeTab' value='".$role['name']."' name='test'>".$role['name']."</button>";



      }else{

      }
  
    }else{

      if($posts04==null){
      echo "
  
    
      <button onclick='clickMe(this)' id='".$x_count."' class='sheetTab' value='".$role['name']."' name='test'>".$role['name']."</button>";

    }else{

    }
  
    }
  


  endforeach;

 
  



endforeach;



?>

 
      <div class="navigationButtonContainer">
       

<?php 


if($count_pages <=1){

echo "
<button class='finishButton' name='test' data-toggle='modal' data-target='#lewis'>Submit</button>

<button onclick='onMy()' class='nextButton' name='test'>Next Question</button>
";
}else{

  

  echo "
  <button class='finishButton' name='test' data-toggle='modal' data-target='#lewis'>Submit</button>
<button onclick='presMy()' id='' class='markButton' value='' name='test'>Previous Question</button>
<button onclick='onMy()' class='nextButton' name='test'>Next Question</button>
";

}


?>
       
       
       </div>


<?php  
 $posts601 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM answer_chache_practice  WHERE user_id='.$posts11[0]['id'].' AND cache=1')->queryAll();



 $count_all_next_q = 30 - $posts601[0]['COUNT(*)'];

?>
<div class="notAnsweredTasks" style="display: block;">tasks left: <?php echo $count_all_next_q;?></div>

<div class="sheetTasksContainer">
<div class="taskButtonContainer" style="display: block;">


<?php



$x_count_last = 1;
$next_quest;
$last_quest;

for ($x = 0; $x < count($ar); $x++) {

 

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

   

    $posts60 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice  WHERE quest_id='.$ar[$x].' AND user_id='.$posts11[0]['id'])->queryAll();

    if($posts60[0]['cache'] ==1){

      echo "<div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='background:#008000;border: 4px solid black;'>". $x_count_last."</div>";

      
    }else{

      echo "<div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 4px solid black;'>". $x_count_last."</div>";

    }
    
   

  }else{

  

    $posts60 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice  WHERE quest_id='.$ar[$x].' AND user_id='.$posts11[0]['id'])->queryAll();

    if($posts60[0]['cache'] ==1){

      echo "<div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='background:#008000;border: 2px solid black;'>". $x_count_last."</div>";

    }else{

      echo "<div class='taskButton' onclick='clickMeOne(this)' id=".$ar[$x]." style='border: 2px solid black;'>". $x_count_last."</div>";

    }




  }



  $x_count_last++;

 
    
} 


?>
 



       </div>


      </div>

        </div>


      </div>
        
             
          
 <script >

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

var next_id = <?php echo $next_quest?>;

var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;


  

$.ajax({
   url: 'index.php?r=site/practice',
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
 window.location.replace("http://www.mentorcard.de/backend/web/index.php?r=site%2Fconc");

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
   url: 'index.php?r=site/practice',
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

var next_id = <?php echo $next_quest?>;

var id_qs = <?php echo $posts55[0]['quest_id']?>;

var id_u = <?php echo $posts11[0]['id']?>;

$.ajax({
   url: 'index.php?r=site/practice',
   type: "POST",
   data: {
       id_quest:id_qs,
       answer_1:answer1,
       answer_2:answer2,
       answer_3:answer3,
       next_quest:next_id,
       user_id:id_u,
       points:pot,
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
   url: 'index.php?r=site/practice',
   type: "POST",
   data: {
       id_quest:b.id,
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
   url: 'index.php?r=site/practice',
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
         

       