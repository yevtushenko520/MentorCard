
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



.box.box-solid.box-warning > .box-header {
    background-color: #222d32;
}

.box.box-solid.box-warning {
    border: 0px solid #f39c12;
}

.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 80%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
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



    $posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts11[0]['id'])->execute();

    $posts112 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts11[0]['id'])->queryAll();
   

    $posts12 = Yii::$app->db->createCommand('SELECT quest_id FROM answer_chache_practice  WHERE cat="Basic Material" AND user_id='.$posts11[0]['id'])->queryAll();

    $posts13 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM answer_chache_practice  WHERE cat="Basic Material" AND user_id='.$posts11[0]['id'])->queryAll();


    foreach($posts112 as $kola):

        $posts1123 = Yii::$app->db->createCommand('SELECT * FROM tags  WHERE id='.$kola['tag_id'])->queryAll();

        $posts14 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cat="'.$posts1123[0]['name'].'" AND cande="practice"')->queryAll();

    endforeach;

    

    $posts15 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cat="'.$posts11[0]['categor'].'" AND cande="practice"')->queryAll();

    $posts1884 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice  WHERE user_id='.$posts11[0]['id'])->queryAll();
    

    if($posts1884!=null){

        foreach($posts1884 as $giga):

            $posts126 = Yii::$app->db->createCommand('INSERT INTO end_cache_prac (user_id,quest_id,answer_1,answer_2,answer_3) 
            VALUES ('.$posts11[0]['id'].', '.$giga['quest_id'].', '.$giga['answer_1'].', '.$giga['answer_2'].', '.$giga['answer_3'].')')->execute();

        endforeach;

    }else{

    }

    

  $count_basic = $posts13[0]['COUNT(*)'];

  $count_another = $posts15[0]['COUNT(*)'];

  $count_true_basic = 0;

  $count_all_true = 0;

  $count_all_quest = 0;



  


  $check_id = 0;

  

    $posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

    if($posts522!=null){


    $posts523 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'].' AND quest_id='.$posts522[0]['quest_id'])->queryAll();

    }else{



        $posts5255 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

        $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_practice (quest_id,user_id) VALUES ('.$posts5255[0]['quest_id'].'
        , '.$posts11[0]['id'].')')->execute();
    }

    if($posts523 ==null){

        $posts138 = Yii::$app->db->createCommand('DELETE FROM  cache_end_but_practice WHERE user_id='.$posts11[0]['id'])->execute();

        $posts524 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

        $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_practice (quest_id,user_id) VALUES ('.$posts524[0]['quest_id'].'
        , '.$posts11[0]['id'].')')->execute();

    }
  

  foreach($posts12 as $cyka):

    $posts16 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE quest_id='.$cyka['quest_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

    $posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

    if($posts522 !=null){

       

        if($posts522[0]['quest_id']==$cyka['quest_id']){

            $check_id = 1;

        }else{


        }



    }else{
    
        $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_practice (quest_id,user_id) VALUES ('.$cyka['quest_id'].'
        , '.$posts11[0]['id'].')')->execute();
    
    
    
    }


    if($posts16!=null){

        $count_true_basic++;
    }else{

    }

  endforeach;




  $count_true_another = 0;

  foreach($posts14 as $cyka2):

    $posts17 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE quest_id='.$cyka2['question_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

    $posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

    if($posts522 !=null){

       

        if($posts522[0]['quest_id']==$cyka2['question_id']){

            $check_id = 1;

        }else{


        }



    }else{
    
        $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_practice (quest_id,user_id) VALUES ('.$cyka2['question_id'].'
        , '.$posts11[0]['id'].')')->execute();
    
    
    
    }


    if($posts17!=null){

        $count_true_another++;
    }else{

    }

  endforeach;


  if($check_id ==1){


}else{

    
   // $posts121 = Yii::$app->db->createCommand('UPDATE cache_end_but_practice SET quest_id='.$posts12[0]['quest_id'].' WHERE user_id='.$posts11[0]['id'])->execute();


}

    


$count_all_true = $count_true_another + $count_true_basic;
$count_all_quest = $count_another + $count_basic;


$posts20 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice  WHERE user_id='.$posts11[0]['id'].'')->queryAll();




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
 <?php BoxWidget::begin([
        'title' => $posts1002[0]['prac'].' - '.date('d.m.y'), //string
        'border' => true,       //boolean
        'color' => 'warning',    //bootstrap color name 'success', 'danger' еtс.
        'solid' => true,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   
    ]);
    ?>

    <div class="row" >
        
        
        <div class="col-xs-6" style="padding-right:0px;">

<?php 

$posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE user_id='.$posts11[0]['id'])->queryAll();


$posts523 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags WHERE qeust_id='.$posts522[0]['quest_id'])->queryAll();


$next_b;
$next_a;

$pres_b;
$pres_a;

$ar = array();
$ar2 = array();

//basic
foreach($posts12 as $gnida):

    $ar[] = $gnida['question_id'];

endforeach;

for($x=0;$x<count($ar);$x++){


    if($posts522[0]['quest_id']==$ar[$x]){

        if($ar[$x+1]!=null){
            $next_b = $ar[$x+1];
        }else{
            $next_b = $ar[0];
        }
        
    }

    if($posts522[0]['quest_id']!=$ar[0]){


        if($ar[$x-1]!=null){
            $pres_b = $ar[$x-1];
        }else{
            $pres_b = $ar[0];
        }

    }

}




foreach($posts14 as $gnida):

    $ar2[] = $gnida['question_id'];

endforeach;

for($x=0;$x<count($ar2);$x++){


    if($posts522[0]['quest_id']==$ar2[$x]){

        if($ar2[$x+1]!=null){
            $next_a = $ar2[$x+1];
        }else{
            $next_a = $ar2[0];
        }

        if($ar2[$x-1]!=null){
            $pres_a = $ar2[$x-1];
          
        }else{
            $pres_a = 'back';
            
        }
        
    }

  




  

}







if($posts523[0]['tags_id']==8){

    $name_cat = 'Basic Material';
    $c_all = $count_basic;

    $y = 1;
    $x = 0;
      foreach($posts12 as $gnida):
    
        $x++;
    
        if($gnida['question_id'] == $posts20[0]['quest_id']){
    
        $y = $x;
    
        }else{
    
    
        }
    
      
    
      endforeach;
    

}else{

    $posts524 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$posts523[0]['tags_id'])->queryAll();

    $name_cat = $posts524[0]['name'];

    $c_all = $count_another;

    $y = 1;
$x = 0;
  foreach($posts14 as $gnida):

    $x++;

    if($gnida['question_id'] == $posts20[0]['quest_id']){

    $y = $x;

    }else{


    }

  

  endforeach;



}


$posts2 = Yii::$app->db->createCommand('SELECT amtl_frage_nr,points,image FROM quesions  WHERE id='.$posts522[0]['quest_id'])->queryAll();

$posts5 = Yii::$app->db->createCommand('SELECT * FROM langs_question  WHERE question_id='.$posts522[0]['quest_id'])->queryAll();

$posts7 = Yii::$app->db->createCommand('SELECT * FROM end_cache_prac  WHERE quest_id='.$posts522[0]['quest_id'].' AND user_id='.$posts11[0]['id'])->queryAll();




?>
  

<?php BoxWidget::begin([
        'title' => 'Question - '.$y.'/'.$c_all.' '. "<br>".'<small style="color:#fff;">'.$name_cat.': '.$posts2[0]['amtl_frage_nr'].'- 
        Error points: '.$posts2[0]['points'].'</small>', //string
        'border' => true,       //boolean
        'color' => 'warning',    //bootstrap color name 'success', 'danger' еtс.
        'solid' => true,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   
    ]);
    ?>

    <style>

.question-result-banner.wrong {
    color: #fff;
    background-color: #DD5663;
    
}
.question-result-banner.true {
    color: #fff;
    background-color: #006400;
}
.question-result-banner {
    width: 60%;
    text-align: center;
    font-size: 16px;
    padding: 1px;
}
.box-body{
    padding: 0px;
}


        </style>




<br>

<strong style="margin-left:5px;">

<?php echo $posts5[0]['question'];?>
</strong>


<br>
<br>

<style>
   .fig {
    text-align: center; /* Выравнивание по центру */ 
   }
  </style>

<p class="fig">
<?php


if($posts2[0]['image']==null){

 echo '<img width="300" height="350" src="' .'images/students/non.png">'; 


}else{

 echo '<img height="150" height="350" src="' .'images/students/'.$posts2[0]['image'] . '">'; 
}





?>
</p>


<div class="row" >


<div class="col-md-1" style="margin-left:15px; background-color:#D3D3D3;">
<i class="fa fa-exclamation-circle" style="font-size:28px;"></i>
<div class="form-check">

<?php 

if($posts5[0]['one']==1){

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck4' style='width: 25px;
    height: 25px;' checked onclick='return false;'>
    ";

}else{

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck4' style='width: 25px;
    height: 25px;' onclick='return false;'>
    ";


}

?>
<p></p>
</div>
<div class="form-check">

<?php 

if($posts5[0]['two']==1){

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck5' style='width: 25px;
    height: 25px;' checked onclick='return false;'>
    ";

}else{

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck5' style='width: 25px;
    height: 25px;' onclick='return false;'>
    ";


}

?>
<p></p>
</div>
<div class="form-check">
<?php 

if($posts5[0]['three']==1){

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck6' style='width: 25px;
    height: 25px;' checked onclick='return false;'>
    ";

}else{

    echo "
    <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck6' style='width: 25px;
    height: 25px;' onclick='return false;'>
    ";


}

?>
<p></p>
</div>


    </div>

    <div class="col-md-5" >
        <br>
        
        <p></p>


        <div class="form-check">

        <?php 
        
     if($posts7 !=null){

       if($posts7[0]['answer_1']==1){

        echo "
        <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 25px;
height: 25px;' checked onclick='return false;'>    
        ";

       }else{

        echo "
        <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 25px;
height: 25px;' onclick='return false;'>    
        ";

       }

     }else{

        echo "
        <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 25px;
height: 25px;' onclick='return false;'>    
        ";

     }
        
        ?>
  
  <label class="form-check-label" for="defaultCheck1" style="margin-bottom:5px;">
  <?php echo $posts5[0]['answer_yes']?>
  </label>
</div>
<div class="form-check">
<?php 
        
        if($posts7 !=null){
   
          if($posts7[0]['answer_2']==1){
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 25px;
   height: 25px;' checked onclick='return false;'>    
           ";
   
          }else{
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 25px;
   height: 25px;' onclick='return false;'>    
           ";
   
          }
   
        }else{
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 25px;
   height: 25px;' onclick='return false;'>    
           ";
   
        }
           
           ?>
  <label class="form-check-label" for="defaultCheck2">
  <?php echo $posts5[0]['answer_no1']?>
  </label>
</div>
<div class="form-check">
<?php 
        
        if($posts7 !=null){
   
          if($posts7[0]['answer_3']==1){
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 25px;
   height: 25px;' checked onclick='return false;'>    
           ";
   
          }else{
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 25px;
   height: 25px;' onclick='return false;'>    
           ";
   
          }
   
        }else{
   
           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 25px;
   height: 25px;' onclick='return false;'>    
           ";
   
        }
           
           ?>
  <label class="form-check-label" for="defaultCheck3">
  <?php echo $posts5[0]['answer_no2']?>
  </label>
</div>

</div>




<div class="col-md-6" >
</div>
    </div>


  <br>

  <div class="row">
  <div class="col-md-4">
    </div>
    <div class="col-md-4">
  <?php 

$posts24 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE quest_id='.$posts522[0]['quest_id'].' AND user_id='.$posts11[0]['id'])->queryAll();

if($posts24 ==null){

    echo "
    <div class='question-result-banner-region'><div><div class='question-result-banner wrong '>
    False
</div>
</div></div>
    ";


}else{

    echo "
    <div class='question-result-banner-region'><div><div class='question-result-banner true '>
    True
</div>
</div></div>
    ";

}

?>

</div>

 <div class="col-md-4">
    </div>
</div>
  <br>
  <br>

  <div class="row" >


<?php 

if($y==1){

    if($posts12[0]['quest_id']==$next_b || $posts14[0]['question_id']==$next_a){


        if($next_b!=null && $next_a==null){

            

            echo "
        <div class='col-md-8'>
       
    </div>
    
    
    <div class='col-md-4'>
    <button onclick='nextGet(this)' id='".$posts14[0]['question_id']."' class='btn btn-success' value='next' name='test'>Next Answer</button>
    </div>
        ";


        }else if($next_b==null && $next_a!=null){

            
            echo "
        <div class='col-md-8'>
       
    </div>
    
    
    <div class='col-md-4'>
    <button onclick='nextGet(this)' id='".$posts12[0]['quest_id']."' class='btn btn-success' value='next' name='test'>Next Answer</button>
    </div>
        ";



        }
        


    }else{

        if($next_b!=null && $next_a==null){

            echo "
    <div class='col-md-8'>
   
</div>


<div class='col-md-4'>
<button onclick='nextGet(this)' id='".$next_b."' class='btn btn-success' value='' name='test'>Next Answer</button>
</div>
    ";

        }else if($next_b==null && $next_a!=null){

            echo "
            <div class='col-md-8'>
           
        </div>
        
        
        <div class='col-md-4'>
        <button onclick='nextGet(this)' id='".$next_a."' class='btn btn-success' value='' name='test'>Next Answer</button>
        </div>
            ";
        

        }

    

}

}else{

    if($name_cat=="Basic Material"){

        echo "
        <div class='col-md-8'>
              <button onclick='backOn(this)' id='".$pres_b."' class='btn btn-default' value='' name='test'>Come Back</button>
        </div>
        
         ";


    }else{


    if($pres_a != "back"){

        echo "
        <div class='col-md-8'>
              <button onclick='backOn(this)' id='".$pres_a."' class='btn btn-default' value='' name='test'>Come Back</button>
        </div>
        
         ";

    }else{

        echo "
        <div class='col-md-8'>
              <button onclick='backOn(this)' id='".$pres_b."' class='btn btn-default' value='' name='test'>Come Back</button>
        </div>
        
         ";

    }
   

}

 if($posts12[0]['quest_id']==$next_b || $posts14[0]['question_id']==$next_a){


    if($next_b!=null && $next_a==null){

        

        echo "
    


<div class='col-md-4'>
<button onclick='nextGet(this)' id='".$posts14[0]['question_id']."' class='btn btn-success' value='next' name='test'>Next Answer</button>
</div>
    ";


    }else if($next_b==null && $next_a!=null){

        
        echo "
   


<div class='col-md-4'>
<button onclick='nextGet(this)' id='".$posts12[0]['quest_id']."' class='btn btn-success' value='next' name='test'>Next Answer</button>
</div>
    ";



    }
    


}else{

    if($next_b!=null && $next_a==null){

        echo "


<div class='col-md-4'>
<button onclick='nextGet(this)' id='".$next_b."' class='btn btn-success' value='' name='test'>Next Answer</button>
</div>
";

    }else if($next_b==null && $next_a!=null){

        echo "
        
    
    
    <div class='col-md-4'>
    <button onclick='nextGet(this)' id='".$next_a."' class='btn btn-success' value='' name='test'>Next Answer</button>
    </div>
        ";
    

    }



}

}

?>
    

       </div>

       <br>


 


    <?php BoxWidget::end();?> 

</div>
<div class="col-xs-6" style="padding-left:0px;">

   

<?php 



$posts210 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

$giga1 = 0;

foreach($posts210 as $kola):


    $posts2100 = Yii::$app->db->createCommand('SELECT langs_id FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();
    $posts2101 = Yii::$app->db->createCommand('SELECT name FROM langs WHERE id='.$posts2100[0]['langs_id'])->queryAll();
    $posts2102 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$kola['quest_id'].' AND languege="'.$posts2101[0]['name'].'"')->queryAll();

    if($posts2102[0]['one'] == $kola['answer_1'] && $posts2102[0]['two'] == $kola['answer_2'] && $posts2102[0]['three'] == $kola['answer_3']){

        $giga1++;

    }else{

    }

endforeach;




$posts211 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

$posts21 = Yii::$app->db->createCommand('SELECT * FROM all_test_points_prac  WHERE user_id='.$posts11[0]['id'].'')->queryAll();

if($count_all_true == $count_all_quest || $posts21[0]['points']<10){

    echo "
    <div class='info-box' style='margin:5px;'>
            <span class='info-box-icon bg-green'><i class='fa fa-check'></i></span>

            <div class='info-box-content'>
              <span class='info-box-number'>".$posts1003[0]['done']." ".$posts1002[0]['prac']."</span>
              <span class='info-box-text'>".$posts1003[0]['ansr_quest']." - (".$giga1."/".$posts211[0]['COUNT(*)'].")</span>
              <span class='info-box-text'>".$posts1003[0]['error_point']." - ".$posts21[0]['points']."</span>
            </div>
            <!-- /.info-box-content -->
          </div>


        

    
    ";

  //  echo $posts11[0]['id'];

    $posts29 = Yii::$app->db->createCommand('SELECT * FROM done_test_prac  WHERE user_id='.$posts11[0]['id'].'')->queryAll();

    if($posts29!=null){


    }else{

        $posts02 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts11[0]['id'].'')->queryAll();

        foreach($posts02 as $kola):

            $posts126 = Yii::$app->db->createCommand('INSERT INTO done_test_prac (user_id,tag_id) 
        VALUES ('.$posts11[0]['id'].','.$kola['tag_id'].')')->execute();

        endforeach;

        

    }

    $posts1355 = Yii::$app->db->createCommand('DELETE FROM  cache_question_practice WHERE user_id='.$posts11[0]['id'])->execute();
 

    

    // $posts1375 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_practice WHERE user_id='.$posts11[0]['id'])->execute();

}else{

    echo "
    <div class='info-box' style='margin:5px;'>
            <span class='info-box-icon bg-red'><i class='fa fa-times'></i></span>

            <div class='info-box-content'>
              <span class='info-box-number'>".$posts1003[0]['failed']." ".$posts1002[0]['prac']."</span>
              <span class='info-box-text'>".$posts1003[0]['ansr_quest']." - (".$giga1."/".$posts211[0]['COUNT(*)'].")</span>
              <span class='info-box-text'>".$posts1003[0]['error_point']." - ".$posts21[0]['points']."</span>
            </div>
            <!-- /.info-box-content -->
          </div>


        
    ";

    $posts1375 = Yii::$app->db->createCommand('SELECT * FROM  answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();



  
    $posts502 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть

    $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE user_id='.$posts11[0]['id'])->execute();

     
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


      for($i=0;$i<=25;$i++){

        foreach($tags_nety as $niga):
      
          $posts501 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest  WHERE user_id='.$posts11[0]['id'])->queryAll();//есть
      
          
      
          if($posts501[0]['cat']!="Basic Material"){
      
          $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags_tt ORDER BY RAND() LIMIT 1')->queryAll();
      
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
      
                 

$posts68 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question WHERE cande="mock_test" AND cat="'.$posts02[0]['name'].'" ORDER BY RAND() LIMIT 10')->queryAll();
      
      
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



    $posts1355 = Yii::$app->db->createCommand('DELETE FROM  cache_question_practice WHERE user_id='.$posts11[0]['id'])->execute();

    //$posts1375 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_practice WHERE user_id='.$posts11[0]['id'])->execute();
 

}

?>




      
        
       
    
    <br>
    <strong style="margin-left:5px;"><?php echo $posts1003[0]['cats']?></strong><hr style="margin-top: 0px;">

 <div class="row" >


<?php 

$posts21 = Yii::$app->db->createCommand('SELECT * FROM user_tags  WHERE user_id='.$posts11[0]['id'].'')->queryAll();


$posts210 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

$giga2 = 0;

foreach($posts210 as $kola):

    
    $posts2103 = Yii::$app->db->createCommand('SELECT cat FROM cande_question WHERE question_id='.$kola['quest_id'])->queryAll();

    if($posts2103[0]['cat']=="Basic Material"){

    $posts2100 = Yii::$app->db->createCommand('SELECT langs_id FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();
    $posts2101 = Yii::$app->db->createCommand('SELECT name FROM langs WHERE id='.$posts2100[0]['langs_id'])->queryAll();
    $posts2102 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$kola['quest_id'].' AND languege="'.$posts2101[0]['name'].'"')->queryAll();

    if($posts2102[0]['one'] == $kola['answer_1'] && $posts2102[0]['two'] == $kola['answer_2'] && $posts2102[0]['three'] == $kola['answer_3']){

        $giga2++;
        
    }else{

    }
}

endforeach;

?>

<div class="col-xs-6" >
    
    <p style="margin-left:5px;">Basic Material (<?php echo $giga2?>/<?php echo $count_basic?>)</p>

    </div>
    <div class="col-xs-6" >

    <?php 



$count_x = 0;

foreach($posts12 as $cyka):


    $posts16 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE quest_id='.$cyka['quest_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

    $posts17 = Yii::$app->db->createCommand('SELECT points FROM quesions  WHERE id='.$cyka['quest_id'])->queryAll();

if($count_x<=50){
    $count_x++;
    if($posts16!=null){

        //зеленый

        if($posts20[0]['quest_id']==$cyka['quest_id']){
            echo "
            <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#006400;color:#fff; border-style: solid;border-color: #006400; border-radius: 50%'>".$posts17[0]['points']."</button>
            ";

        }else{
        echo "
        <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#3CB371;color:#fff; border-style: solid;border-color: #3CB371; border-radius: 50%'>".$posts17[0]['points']."</button>
        ";
        }
    }else{

        //красный

        $posts18 = Yii::$app->db->createCommand('SELECT * FROM false_answer  WHERE quest_id='.$cyka['quest_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

        if($posts18!=null){

            //красный

            if($posts20[0]['quest_id']==$cyka['quest_id']){

                echo "
                <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#8B0000;color:#fff; border-style: solid;border-color: #8B0000; border-radius: 50%'>".$posts17[0]['points']."</button>
                ";

            }else{

            echo "
            <button onclick='onMy(this)' id=".$cyka['quest_id']."  style='margin-top:3px;background-color:#F08080;color:#fff; border-style: solid;border-color: #F08080; border-radius: 50%'>".$posts17[0]['points']."</button>
            ";

            }

        }else{

            //красный
            if($posts20[0]['quest_id']==$cyka['quest_id']){

                echo "
                <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#8B0000;color:#fff; border-style: solid;border-color: #8B0000; border-radius: 50%'>".$posts17[0]['points']."</button>
                ";

            }else{

            echo "
            <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#F08080;color:#fff; border-style: solid;border-color: #F08080; border-radius: 50%'>".$posts17[0]['points']."</button>
            ";

            }

        }

    }

}else{

}

  endforeach;

?>


</div>

</div>
<br>


<?php 

$posts210 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'])->queryAll();

$giga3 = 0;

foreach($posts210 as $kola):

    
    $posts2103 = Yii::$app->db->createCommand('SELECT cat FROM cande_question WHERE question_id='.$kola['quest_id'])->queryAll();

    if($posts2103[0]['cat']=="Basic Material"){

    $posts2100 = Yii::$app->db->createCommand('SELECT langs_id FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();
    $posts2101 = Yii::$app->db->createCommand('SELECT name FROM langs WHERE id='.$posts2100[0]['langs_id'])->queryAll();
    $posts2102 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$kola['quest_id'].' AND languege="'.$posts2101[0]['name'].'"')->queryAll();

    if($posts2102[0]['one'] == $kola['answer_1'] && $posts2102[0]['two'] == $kola['answer_2'] && $posts2102[0]['three'] == $kola['answer_3']){

        $giga3++;
        
    }else{

    }
}

endforeach;


?>



     <?php foreach($posts21 as $kol):
     
     $posts22 = Yii::$app->db->createCommand('SELECT * FROM tags  WHERE id='.$kol['tag_id'].'')->queryAll();

     $posts145 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cat="'.$posts22[0]['name'].'" AND cande="practice"')->queryAll();

     $posts210 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$posts11[0]['id'].' AND cat="'.$posts22[0]['name'].'"')->queryAll();

     $giga3 = 0;

foreach($posts210 as $kola):


    $posts2100 = Yii::$app->db->createCommand('SELECT langs_id FROM stud_langs_stud WHERE stud_id='.$posts11[0]['id'])->queryAll();
    $posts2101 = Yii::$app->db->createCommand('SELECT name FROM langs WHERE id='.$posts2100[0]['langs_id'])->queryAll();
    $posts2102 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$kola['quest_id'].' AND languege="'.$posts2101[0]['name'].'"')->queryAll();

    if($posts2102[0]['one'] == $kola['answer_1'] && $posts2102[0]['two'] == $kola['answer_2'] && $posts2102[0]['three'] == $kola['answer_3']){

        $giga3++;
        
    }else{

    }


endforeach;


     
     ?>

     <div class="row" >
<div class="col-xs-6" >

    
    <p style="margin-left:5px;"><?php echo $posts22[0]['name']; ?> (<?php echo $giga3?>/<?php echo $posts145[0]['COUNT(*)']?>)</p>

    
    


</div>


<div class="col-xs-6" >




<?php 

$count_y = 0;

$posts1456 = Yii::$app->db->createCommand('SELECT quest_id FROM answer_chache_practice  WHERE cat="'.$posts22[0]['name'].'" AND user_id='.$posts11[0]['id'])->queryAll();

foreach($posts1456 as $cyka):



    $posts16 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE quest_id='.$cyka['quest_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

    $posts17 = Yii::$app->db->createCommand('SELECT points FROM quesions  WHERE id='.$cyka['quest_id'])->queryAll();

if($count_y<=50){

    $count_y++;
    if($posts16!=null){

        //зеленый
        if($posts20[0]['quest_id']==$cyka['quest_id']){
        echo "
        <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#006400;color:#fff; border-style: solid;border-color: #006400; border-radius: 50%'>".$posts17[0]['points']."</button>
        ";

        }else{
            echo "
            <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#3CB371;color:#fff; border-style: solid;border-color: #3CB371; border-radius: 50%'>".$posts17[0]['points']."</button>
        ";
        }
    }else{

        //красный

        $posts18 = Yii::$app->db->createCommand('SELECT * FROM false_answer  WHERE quest_id='.$cyka['quest_id'].' AND user_id='.$posts11[0]['id'].'')->queryAll();

        if($posts18!=null){

            //красный
            if($posts20[0]['quest_id']==$cyka['quest_id']){

                echo "
                <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#8B0000;color:#fff; border-style: solid;border-color: #8B0000; border-radius: 50%'>".$posts17[0]['points']."</button>
                ";

            }else{
            echo "
            <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#F08080;color:#fff; border-style: solid;border-color: #F08080; border-radius: 50%'>".$posts17[0]['points']."</button>
            ";

        }

        }else{

            if($posts20[0]['quest_id']==$cyka['quest_id']){

                echo "
                <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#8B0000;color:#fff; border-style: solid;border-color: #8B0000; border-radius: 50%'>".$posts17[0]['points']."</button>
                ";
            }else{

                echo "
                <button onclick='onMy(this)' id=".$cyka['quest_id']." style='margin-top:3px;background-color:#F08080;color:#fff; border-style: solid;border-color: #F08080; border-radius: 50%'>".$posts17[0]['points']."</button>
                ";

            }
            //красный

           

        }

    }

}

  endforeach;


?>



</div>

</div>
<br>
<?php endforeach; ?>

        


</div>

        </div>

    <?php BoxWidget::end();?> 


    <script type="text/javascript">

function onMy(b){

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
    url: 'index.php?r=site/conc',
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


function nextGet(a){

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
    url: 'index.php?r=site/conc',
    type: "POST",
    data: {
        id_quest:a.id,
      user_id:id_u,
      coc:1
        
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

function backOn(c){

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
    url: 'index.php?r=site/conc',
    type: "POST",
    data: {
        id_quest:c.id,
      user_id:id_u,
      coc:1
        
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