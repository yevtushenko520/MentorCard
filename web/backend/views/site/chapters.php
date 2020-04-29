<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use app\models\QuestSoc;
use phpnt\ICheck\ICheck;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

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
	z-index: 1000;
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




   if(Yii::$app->user->identity->role ==4){

    $posts228 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

   }else  if(Yii::$app->user->identity->role ==3){

    $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

   }else  if(Yii::$app->user->identity->role ==2){

    $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }

   
$cat1 = [];

$cat2 = [];

$cat3 = [];

$cat4 = [];

   $posts1011 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts228[0]['id'])->queryAll();

   foreach($posts1011 as $kola):

    
    $posts1012 = Yii::$app->db->createCommand('SELECT * FROM tags  WHERE id='.$kola['tag_id'])->queryAll();

    $posts1013 = Yii::$app->db->createCommand('SELECT * FROM cande_question  WHERE cat="'.$posts1012[0]['name'].'"')->queryAll();

    foreach($posts1013 as $kola2):

      $posts1014 = Yii::$app->db->createCommand('SELECT * FROM quest_soc  WHERE quest_id='.$kola2['question_id'])->queryAll();

      if($posts1014[0]['soc_id']==1){

        $cat1[$g] = $kola2['question_id'];

        $g++;

      }else if($posts1014[0]['soc_id']==2){

        $cat2[$k] = $kola2['question_id'];

        $k++;


      }else if($posts1014[0]['soc_id']==3){

        $cat3[$l] = $kola2['question_id'];

        $l++;

      }else if($posts1014[0]['soc_id']==4){

        $cat4[$y] = $kola2['question_id'];

        $y++;

      }


    endforeach;


   endforeach;












   $posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts228[0]['id'])->queryAll();


                      
$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}


$posts533 = Yii::$app->db->createCommand('SELECT * FROM chap_cache WHERE user_id='.$posts228[0]['id'])->queryAll();

?>

<!-- Control Sidebar -->


<?php 

if($posts533==null){

  echo "<aside class='control-sidebar control-sidebar-dark'>";


}else{


  echo "<aside class='control-sidebar control-sidebar-dark control-sidebar-open hidden-xs'>";

}




?>

<?php 

$posts12 = Yii::$app->db->createCommand('SELECT quest_id FROM quest_soc WHERE soc_id=1')->queryAll();
$posts22 = Yii::$app->db->createCommand('SELECT quest_id FROM quest_soc WHERE soc_id=2')->queryAll();
$posts32 = Yii::$app->db->createCommand('SELECT quest_id FROM quest_soc WHERE soc_id=3')->queryAll();
$posts42 = Yii::$app->db->createCommand('SELECT quest_id FROM quest_soc WHERE soc_id=4')->queryAll();

//1
$posts01 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts228[0]['id'])->queryAll();

///post12
$ar1 = array();
$count_all_one=0;

foreach($posts01 as $kol):

  $posts02 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$kol['tag_id'])->queryAll();

foreach($posts12  as $viva1):

  $posts13 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $posts133 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="Basic Material"')->queryAll();

  if($posts13!=null){

  $ar1[] = $viva1['quest_id'];
  }else{

  }

  if($posts133!=null){

    $ar1[] = $viva1['quest_id'];
    }else{
  
    }

endforeach;
endforeach;

if($ar1 !=null){

for($x=0;$x<=count($ar1);$x++){
 $count_all_one++;
}

}else{

}


///post3

$ar2 = array();
$count_all_two=0;
foreach($posts01 as $kol):

  $posts02 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$kol['tag_id'])->queryAll();

foreach($posts22  as $viva1):

  $posts14 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $posts134 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="Basic Material"')->queryAll();

  if($posts14!=null){

  $ar2[] = $viva1['quest_id'];
  }else{

  }

  if($posts134!=null){

    $ar2[] = $viva1['quest_id'];
    }else{
  
    }

endforeach;
endforeach;

if($ar2 !=null){

for($x=0;$x<=count($ar2);$x++){
 $count_all_two++;
}

}else{

}



///post4

$ar3 = array();
$count_all_three=0;

foreach($posts01 as $kol):

  $posts02 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$kol['tag_id'])->queryAll();

foreach($posts32  as $viva1):

  $posts15 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $posts135 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="Basic Material"')->queryAll();

  if($posts15!=null){

  $ar3[] = $viva1['quest_id'];
  }else{

  }

  if($posts135!=null){

    $ar3[] = $viva1['quest_id'];
    }else{
  
    }

endforeach;
endforeach;


if($ar3 !=null){

for($x=0;$x<=count($ar3);$x++){
 $count_all_three++;
}

}else{

}

///post5

$ar4 = array();
$count_all_four=0;

foreach($posts01 as $kol):

  $posts02 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$kol['tag_id'])->queryAll();

foreach($posts42  as $viva1):

  $posts16 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $posts136 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$viva1['quest_id'].' AND cat="Basic Material"')->queryAll();

  if($posts16!=null){

  $ar4[] = $viva1['quest_id'];
  }else{

  }

  if($posts136!=null){

    $ar4[] = $viva1['quest_id'];
    }else{
  
    }

endforeach;
endforeach;

if($ar4 !=null){

for($x=0;$x<=count($ar4);$x++){
 $count_all_four++;
}

}else{

}



   $posts1 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM quest_soc WHERE soc_id=1')->queryAll();
   $posts2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM quest_soc WHERE soc_id=2')->queryAll();
   $posts3 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM quest_soc WHERE soc_id=3')->queryAll();
   $posts4 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM quest_soc WHERE soc_id=4')->queryAll();

   $posts33 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();


    
    if(Yii::$app->user->identity->role ==4){

      $posts44 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
     }else  if(Yii::$app->user->identity->role ==3){
  
      $posts44 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
     }else  if(Yii::$app->user->identity->role ==2){
  
      $posts44 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
       
     }


   $posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$posts44[0]['id'])->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$posts44[0]['id'])->execute();


$all_count = 0;
$first_id;

$count_xd = 1;

if($posts533[0]['cat_id']==4){

  $all_count = count($cat4);



  for($x=0;$x<=count($ar4);$x++){

    if($x==0){

      $first_id = $ar4[$x];

    }else{

    }


    
   }


}else if($posts533[0]['cat_id']==3){

  $all_count = count($cat3);

  for($x=0;$x<=count($ar3);$x++){

    if($x==0){

      $first_id = $ar3[$x];

    }else{

    }
    
   }

}else if($posts533[0]['cat_id']==2){

  $all_count = count($cat2);

  for($x=0;$x<=count($ar2);$x++){

    if($x==0){

      $first_id = $ar2[$x];

    }else{

    }
    
   }

}else if($posts533[0]['cat_id']==1){

  $all_count = count($cat1);

  for($x=0;$x<=count($ar1);$x++){

    if($x==0){

      $first_id = $ar1[$x];

    }else{

    }
    
   }



  }


  for($x=0;$x<=count($ar4);$x++){

    if($x==0){

      $four_id = $ar4[$x];

    }else{

    }


    
   }

   for($x=0;$x<=count($ar3);$x++){

    if($x==0){

      $three_id = $ar3[$x];

    }else{

    }


    
   }

   for($x=0;$x<=count($ar2);$x++){

    if($x==0){

      $two_id = $ar2[$x];

    }else{

    }


    
   }

   for($x=0;$x<=count($ar1);$x++){

    if($x==0){

      $one_id = $ar1[$x];

    }else{

    }


    
   }

   $query2 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_quest_chap WHERE user_id='.$posts44[0]['id'])->queryAll();

   if($query2!=null){

   
    $query23 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_stud WHERE stud_id='.$posts44[0]['id'])->queryAll();
    $query24 = Yii::$app->db->createCommand('SELECT * FROM langs WHERE id='.$query23[0]['langs_id'])->queryAll();
    
    
    $posts299 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$query2[0]['quest_id'].' AND languege="'.$query24[0]['name'].'"')->queryAll();

   // print_r($query2[0]['quest_id']);
    $query = Yii::$app->db->createCommand('SELECT id,amtl_frage_nr,points,image FROM quesions WHERE id='.$query2[0]['quest_id'])->queryAll();

    
    }

$next_quest;




if($posts533[0]['cat_id']==4){

  for($x=0;$x<=count($ar4);$x++){

    if($query2[0]['quest_id']==$ar4[$x]){


      if($ar4[$x+1]!=null){

        $next_quest = $ar4[$x+1];
      }else{
        $next_quest = $ar4[0];
      }

    }else{

    }


    
   }


}else if($posts533[0]['cat_id']==3){


  for($x=0;$x<=count($ar3);$x++){
  if($query2[0]['quest_id']==$ar3[$x]){


    if($ar3[$x+1]!=null){

      $next_quest = $ar3[$x+1];
    }else{
      $next_quest = $ar3[0];
    }

  }else{

  }
}


}
else if($posts533[0]['cat_id']==2){

  for($x=0;$x<=count($ar2);$x++){

  if($query2[0]['quest_id']==$ar2[$x]){


    if($ar2[$x+1]!=null){

      $next_quest = $ar2[$x+1];
    }else{
      $next_quest = $ar2[0];
    }

  }else{

  }

  }

}
else if($posts533[0]['cat_id']==1){

  for($x=0;$x<=count($ar1);$x++){

  if($query2[0]['quest_id']==$ar1[$x]){


    if($ar1[$x+1]!=null){

      $next_quest = $ar1[$x+1];
    }else{
      $next_quest = $ar1[0];
    }

  }else{

  }

}

}

$first_no = 0;

if($posts533[0]['cat_id']==4){

  for($x=0;$x<=count($ar4);$x++){


    

      if($ar4[0]==$query2[0]['quest_id']){

        $first_no = 0;


    }else{

      $first_no = 1;


    }

  }

}else if($posts533[0]['cat_id']==3){

  for($x=0;$x<=count($ar3);$x++){


    

    if($ar3[0]==$query2[0]['quest_id']){

      $first_no = 0;


  }else{

    $first_no = 1;


  }

}

}else if($posts533[0]['cat_id']==2){

  for($x=0;$x<=count($ar2);$x++){


    

    if($ar2[0]==$query2[0]['quest_id']){

      $first_no = 0;


  }else{

    $first_no = 1;


  }

}

}else if($posts533[0]['cat_id']==1){

  for($x=0;$x<=count($ar1);$x++){


    

    if($ar1[0]==$query2[0]['quest_id']){

      $first_no = 0;


  }else{

    $first_no = 1;


  }

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
 
<div class="xyu" style="margin:10px;">
 <?php BoxWidget::begin([
        'title' => 'Question 1 of '.$all_count, //string
        'border' => true,       //boolean
        'color' => 'success',    //bootstrap color name 'success', 'danger' еtс.
        'solid' => false,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   
    ]);
    ?>
    <p style="color:#000;background-color: RGB(249, 201, 16);">

    <?php 
    
    if($posts533[0]['cat_id']==4){

      echo "Fahrerideale/Fahrerrollen/Driver ideals / driver rolls";

    }else if($posts533[0]['cat_id']==3){

      echo "Psychische und soziale Voraussetzungen/Mental and social conditions";

    }else if($posts533[0]['cat_id']==2){

      echo "Einschränkungen der körperlichen Fähigkeiten";

    }else if($posts533[0]['cat_id']==1){

      echo "Persönliche Voraussetzungen / Risikofaktor Mensch";

    }
    
    ?>
    </p>
    <h4 style="color:#000;">
    <?php echo $posts299[0]['question']?>
      </h4>

       <style>
   .fig {
    text-align: center; /* Выравнивание по центру */ 
   }
  </style>

    <p class="fig">
    <?php


if($query[0]['image']==null){

 echo '<img style=" height: 170px;width:180px;" src="' .'images/students/non.png">'; 


}else{

 echo '<img style=" height: 170px;width:180px;" src="' .'images/students/'.$query[0]['image'] . '">'; 
}





?>
</p>

<div class="form-check">


<?php 

if($query2[0]['quest_id']!=null){

$query23 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE user_id='.$posts44[0]['id'].' AND quest_id='.$query2[0]['quest_id'])->queryAll();


if($query23!=null){


  $query245 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$query2[0]['quest_id'])->queryAll();


  if($query245[0]['one']==1){

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
    height: 18px;' checked onclick='return false;' > ";

  }else{

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
    height: 18px;' onclick='return false;' > ";

  }

}else{

 echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
 height: 18px;' > ";

}

}

?>
   

<label class="form-check-label" for="defaultCheck1" style="margin-bottom:5px; color:#000">
<?php echo $posts299[0]['answer_yes']?> </label>

  </div>

<div class="form-check">

<?php 

if($query2[0]['quest_id']!=null){

$query23 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE user_id='.$posts44[0]['id'].' AND quest_id='.$query2[0]['quest_id'])->queryAll();


if($query23!=null){


  $query245 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$query2[0]['quest_id'])->queryAll();


  if($query245[0]['two']==1){

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
    height: 18px;' checked onclick='return false;' > ";

  }else{

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
    height: 18px;' onclick='return false;' > ";

  }

}else{

 echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
 height: 18px;' > ";

}

}

?>

<label class="form-check-label" for="defaultCheck2" style="margin-bottom:5px; color:#000">
<?php echo $posts299[0]['answer_no1']?>  </label>

</div>
<div class="form-check">
<?php 

if($query2[0]['quest_id']!=null){

$query23 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE user_id='.$posts44[0]['id'].' AND quest_id='.$query2[0]['quest_id'])->queryAll();


if($query23!=null){


  $query245 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$query2[0]['quest_id'])->queryAll();


  if($query245[0]['three']==1){

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
    height: 18px;' checked onclick='return false;' > ";

  }else{

    echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
    height: 18px;' onclick='return false;' > ";

  }

}else{

 echo "<input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
 height: 18px;' > ";

}

}

?>

<label class="form-check-label" for="defaultCheck3" style="margin-bottom:5px; color:#000">
<?php echo $posts299[0]['answer_no2']?> </label>

  </div>

  <br>
<br>

<div class="row">

  <div class="col-xs-6">

  <?php 
  
  if($first_no ==0){


  }else{

    echo "<button  class='btn btn-warning' value='next' name='test' onclick='onMy()'>Prev</button>";

  }
  
  ?>


</div>

<div class="col-xs-6">
<button  class='btn btn-success' value='next' name='test' onclick='onMy()'>Next</button>

</div>
</div>
    <?php BoxWidget::end();?>

     <button class="btn btn-default" data-toggle="control-sidebar" onclick="closeMy()">Close</button>

    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>


  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $posts1002[0]['chap']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> <?php echo $posts1002[0]['information']?></strong>

              <p class="text-muted">
              <?php echo $posts1002[0]['username']?>: <?php echo Yii::$app->user->identity->username ?><br>
              <?php echo $posts1002[0]['category']?>: <?php
              
              $query245 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts44[0]['id'])->queryAll();

              foreach($query245 as $kol):

                $query246 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kol['tag_id'])->queryAll();

                echo "<span class='label label-warning' style='background-color: #222d32 !important;'>".$query246[0]['name']."</span> ";

              endforeach;
              
              ?>
              </p>
              <hr style="margin:0;">
             

            </div>
            <!-- /.box-body -->
          </div>
          
          <?php Pjax::begin();?>

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
       

          <style>
 
    .scrolled

    {

      overflow: auto;
      width: auto;
    height: auto;

    }

    .row { cursor: pointer; }

    </style>  
        
      <?php BoxWidget::begin([
        'title' =>  $posts1002[0]['quest_know'], //string
        'border' => true,       //boolean
        'color' => 'default',    //bootstrap color name 'success', 'danger' еtс.
        'solid' => false,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   
    ]);
    ?>

    <script>

function onMy(){

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

var id_qs = <?php echo $query2[0]['quest_id']?>;

  var id_u = <?php echo $posts44[0]['id']?>;

  var next_id = <?php echo $next_quest?>;
  
  $.ajax({
url: 'index.php?r=site/chapters',
type: "POST",
data: {
  id_quest:id_qs,
 user_id:id_u,
 next:next_id,
 answer_1:answer1,
        answer_2:answer2,
        answer_3:answer3,
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

function closeMy(){

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

var id_u = <?php echo $posts44[0]['id']?>;


$.ajax({
url: 'index.php?r=site/chapters',
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

      function getCat(b){

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

var id_u = <?php echo $posts44[0]['id']?>;

if(b.id==4){

  var first = <?php echo $four_id?>;
}else if(b.id==3){

  var first = <?php echo $three_id?>;

}else if(b.id==2){

var first = <?php echo $two_id?>;

}
else if(b.id==1){

var first = <?php echo $one_id?>;

}



$.ajax({
  url: 'index.php?r=site/chapters',
  type: "POST",
  data: {
      id_soc:b.id,
      id_quest:first,
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
    
    

    <div class ="scrolled"> 

<?php //nachalo 

$query001 = Yii::$app->db->createCommand('SELECT * FROM tests')->queryAll();


?>

<?php foreach($query001 as $kola_niga):?>

<?php //nachalo 

$cc_al = array();

$query004 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id ='.$posts44[0]['id'])->queryAll();

foreach($query004 as $tags):

$query002 = Yii::$app->db->createCommand('SELECT * FROM quest_soc WHERE soc_id ='.$kola_niga['id'])->queryAll();

$query005 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id ='.$tags['tag_id'])->queryAll();

foreach($query002 as $gg):

  $query003 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id ='.$gg['quest_id'].' AND cat="'.$query005[0]['name'].'"')->queryAll();

  if($query003!=null){

    $cc_al[] = $gg['quest_id'];

  }
endforeach;

endforeach;

?>


    <div class="row">
    <a>
    <div class="col-md-6" data-toggle="control-sidebar" onclick="getCat(this)" id="4">
    <strong><?php echo $kola_niga['name']?></strong>
    <p class="text-muted"><?php print_r(count($cc_al));?> <?php echo $posts1002[0]['questions']?></p>
    </div>

    <div class="col-md-6 text-right" style="margin-top:15px;"><i class="fa fa-info-circle fa-lg"></i></div>

   </a>
  </div>
  <hr style="margin:0;">
  
    <?php endforeach; ?>

<!-- /.box-body -->
</div>
     <?php BoxWidget::end();?>


      
         
          <?php Pjax::end();?>
         
