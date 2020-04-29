<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
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

 .row { cursor: pointer; }
</style>

  <?php 

    if(Yii::$app->user->identity->role ==4){

      $posts12 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
     }else  if(Yii::$app->user->identity->role ==3){
  
      $posts12 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
     }else  if(Yii::$app->user->identity->role ==2){
  
      $posts12 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
       
     }

$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts12[0]['id'])->queryAll();




$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

  
  
  $posts5224 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE user_id='.$posts12[0]['id'])->queryAll();


  $posts533 = Yii::$app->db->createCommand('SELECT count FROM question_table_cache_but WHERE user_id='.$posts12[0]['id'])->queryAll();

  if($posts5224[0]['quest_id']!=null){

    $query = Yii::$app->db->createCommand('SELECT id,amtl_frage_nr,points,image FROM quesions WHERE id='.$posts5224[0]['quest_id'])->queryAll();

    if(Yii::$app->user->identity->role ==4){

      $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
    
     }else  if(Yii::$app->user->identity->role ==3){
    
      $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
    
     }else  if(Yii::$app->user->identity->role ==2){
    
      $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
       
     }

    $posts112 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_stud  WHERE stud_id='.$posts228[0]['id'])->queryAll();

$posts113 = Yii::$app->db->createCommand('SELECT * FROM langs  WHERE id='.$posts112[0]['langs_id'])->queryAll();


    $query2 = Yii::$app->db->createCommand('SELECT question,answer_yes,answer_no1,answer_no2 FROM langs_question WHERE question_id='.$posts5224[0]['quest_id'].' AND languege="'.$posts113[0]['name'].'"')->queryAll();

  }else{

  }
  
  $posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts12[0]['id'])->execute();
  

  ?>


  

<!-- Control Sidebar -->

<?php 

if($posts533[0]['count']==0){

  echo "<aside class='control-sidebar control-sidebar-dark'>";


}else{


  echo "<aside class='control-sidebar control-sidebar-dark control-sidebar-open hidden-xs'>";

}


?>

<div class="xyu" style="margin:10px;">
<?php BoxWidget::begin([
        'title' => 'Question', //string
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

    

         <div class='question-result-banner-region'>
         <div>
         
<h5 style="color:#000"> 
        <?php echo $query2[0]['question']?>
    </h5>

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

<div class="row" style="margin-left: 10px;">


  
        <br>
        
        <p></p>


        <div class="form-check">

   

        <?php 
        
        if($posts5224[0]['quest_id']!=null){

        $query38 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$query[0]['id'])->queryAll();

        }


        if($query38!=null){

          if($posts5224[0]['quest_id']!=null){

           


          $query4 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$query[0]['id'].' AND languege="'.$posts113[0]['name'].'"')->queryAll();

          }

          if($query4[0]['one']==1){


           echo "
           <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
height: 18px;' checked onclick='return false;' > 
           ";

          }else{

            echo "
            <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
 height: 18px; '  onclick='return false;'> 
            ";

          }


        }else{

          echo "
          <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck1' style='width: 18px;
height: 18px; '> 
          ";

        }
        
        ?>   
          
  <label class="form-check-label" for="defaultCheck1" style="margin-bottom:5px; color:#000">
  <?php echo $query2[0]['answer_yes']?> </label>


</div>
<div class="form-check">


<?php 

if($query38!=null){
if($query4[0]['two']==1){


  echo "
  <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
height: 18px;' checked  onclick='return false;'> 
  ";

 }else{

   echo "
   <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
height: 18px; '  onclick='return false;'> 
   ";

 }
}else{

  echo "
  <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck2' style='width: 18px;
height: 18px; '> 
  ";

}


?>
   
             <label class="form-check-label" for="defaultCheck2" style="color:#000">
             <?php echo $query2[0]['answer_no1']?>  </label>

             
</div>
<div class="form-check">

<?php 

if($query38!=null){
if($query4[0]['three']==1){


  echo "
  <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
height: 18px;' checked  onclick='return false;'> 
  ";

 }else{

   echo "
   <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
height: 18px; '  onclick='return false;'> 
   ";

 }
}else{

  echo "
  <input class='option-input checkbox subject-list' type='checkbox' value='' id='defaultCheck3' style='width: 18px;
height: 18px; '> 
  ";

}


?>

              
             <label class="form-check-label" for="defaultCheck3" style="color:#000">
             <?php echo $query2[0]['answer_no2']?> </label>

</div>




    </div>
</div></div>

<br>
<br>
<button  class='btn btn-success' value='next' name='test' onclick='onMy()'>Next Answer</button>

    <?php BoxWidget::end();?>

    <button class="btn btn-default" data-toggle="control-sidebar" onclick="closeMy()">Close</button>
    
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>





<?php 

if(Yii::$app->user->identity->role ==4){

  $posts228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==3){

  $posts228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==2){

  $posts228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
 }
 

$posts21 = Yii::$app->db->createCommand('SELECT number FROM cache_filtr WHERE user_id='.$posts228[0]['id'])->queryAll();

?>



  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $posts1002[0]['quest_table']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> <?php echo $posts1002[0]['information']?></strong>

              <p class="text-muted">
              <?php echo $posts1002[0]['username']?>: <?php echo Yii::$app->user->identity->username ?><br>
              <?php echo $posts1002[0]['category']?>: <?php
              
              $query245 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts228[0]['id'])->queryAll();

              foreach($query245 as $kol):

                $query246 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kol['tag_id'])->queryAll();

                echo "<span class='label label-warning'>".$query246[0]['name']."</span> ";

              endforeach;
              
              ?>
              </p>
              <hr style="margin:0;">
   <br>

              <strong><i class="fa fa-bars margin-r-5"></i> <?php echo $posts1002[0]['filtr']?></strong>
            

            <div class="newCheckBox">


            <?php 
            

            echo "
            <p>
  <input type='checkbox' onchange='toggleCheckbox(this)' id='remember1' class='option-input checkbox subject-list' value='4' name='subject'/>
  <span>True answers</span> </p>
<p>
  <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' />
  <span>False answers</span> </p>
<p>
  <input type='checkbox' onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject'/>
  <span>Not answers</span> </p>

            ";

            /*
            if($posts21[0]['number']==1){


              echo "
              <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember1' class='option-input checkbox subject-list' value='4' name='subject'/>
    <span>".$posts1002[0]['soc1']."</span> </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' />
    ".$posts1002[0]['soc2']." </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject'/>
    ".$posts1002[0]['soc3']." </p>

    <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember4' class='option-input checkbox subject-list' value='1' name='subject' checked/>
    ".$posts1002[0]['soc4']." </p>
              ";


            }else if($posts21[0]['number']==2){


              echo "
              <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember1' class='option-input checkbox subject-list' value='4' name='subject'/>
    <span>".$posts1002[0]['soc1']."</span> </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' />
    ".$posts1002[0]['soc2']." </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject' checked/>
    ".$posts1002[0]['soc3']." </p>

    <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember4' class='option-input checkbox subject-list' value='1' name='subject'/>
    ".$posts1002[0]['soc4']." </p>
              ";

            }else if($posts21[0]['number']==3){


              echo "
              <p>
    <input type='checkbox' onchange='toggleCheckbox(this)'  id='remember1' class='option-input checkbox subject-list' value='4' name='subject'/>
    <span>".$posts1002[0]['soc1']."</span> </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' checked/>
    ".$posts1002[0]['soc2']." </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject' />
    ".$posts1002[0]['soc3']." </p>

    <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember4' class='option-input checkbox subject-list' value='1' name='subject'/>
    ".$posts1002[0]['soc4']." </p>
              ";

            }else if($posts21[0]['number']==4){


            ;
              echo "
              <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember1' class='option-input checkbox subject-list' value='4' name='subject' checked/>
    <span>".$posts1002[0]['soc1']."</span> </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' />
    ".$posts1002[0]['soc2']." </p>
  <p>
    <input type='checkbox'  onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject' />
    ".$posts1002[0]['soc3']." </p>

    <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember4' class='option-input checkbox subject-list' value='1' name='subject' />
    ".$posts1002[0]['soc4']." </p>
              ";

            }else{


              echo "
              <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember1' class='option-input checkbox subject-list' value='4' name='subject'/>
    <span>".$posts1002[0]['soc1']."</span> </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember2' class='option-input checkbox subject-list' value='3' name='subject' />
    ".$posts1002[0]['soc2']." </p>
  <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember3' class='option-input checkbox subject-list' value='2' name='subject'/>
    ".$posts1002[0]['soc3']." </p>

    <p>
    <input type='checkbox' onchange='toggleCheckbox(this)' id='remember4' class='option-input checkbox subject-list' value='1' name='subject'/>
    ".$posts1002[0]['soc4']." </p>
              ";

            }
            */
          
            ?>
  
  

  
</div>



            </div>
            <!-- /.box-body -->
          </div>
          
          <?php Pjax::begin();?>
          <style>
    .scrolled{
      overflow: auto;
      width: auto;
    height: auto;
    }
    </style>  
          
      <?php BoxWidget::begin([
        'title' => '', //string
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




<?php

$name = 'x';
$name2 = 'x';





$cart = array();

$x_count_balls;
$y_count ;

$ar = array();


//1
$posts01 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts228[0]['id'])->queryAll();


foreach($posts01 as $kol):

  $posts22 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kol['tag_id'])->queryAll();

//$posts22 = Yii::$app->db->createCommand('SELECT * FROM qeust_tags WHERE tags_id='.$kol['tag_id'])->queryAll();

$posts250 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cat="'.$posts22[0]['name'].'"')->queryAll();

//echo print_r($posts250);

foreach($posts250 as $niga):

 

  

  $posts25 = Yii::$app->db->createCommand('SELECT soc_id FROM quest_soc WHERE quest_id='.$niga['question_id'])->queryAll();

  if(Yii::$app->user->identity->role ==4){

    $posts12 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==3){
  
    $posts12 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
  
   }else  if(Yii::$app->user->identity->role ==2){
  
    $posts12 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
     
   }
   

//000000
$posts11 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE user_id='.$posts228[0]['id'].' AND quest_id='.$niga['question_id'])->queryAll();


$ar[] = $posts11[0]['count'];


  foreach($posts25 as $niga1):


    if($posts21[0]['number']==$niga1['soc_id'] || $posts21[0]['number']==null){


      $cart[] = $niga['question_id'];
   

  }else if($posts21[0]['number']==0){

    $cart[] = $niga['question_id'];

  }else{

  }

  endforeach;
 


endforeach;

endforeach;

$posts1133 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache  WHERE user_id='.$posts228[0]['id'])->queryAll();



for($x = 0; $x<=count($cart);$x++){


 

  if($cart[$x]==$posts1133[0]['quest_id']){

  

    if($cart[$x+1]!=null){
      $next_q = $cart[$x+1];

    //  printprint_r($cart[$x]);

    }else{
      $next_q = $cart[0];
    }
    

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

<script>

function toggleCheckbox(element)
{

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

 var id_u = <?php echo $posts228[0]['id']?>;

if (document.getElementById('remember1').checked || document.getElementById('remember2').checked 
|| document.getElementById('remember3').checked || document.getElementById('remember4').checked) {

  $.ajax({
  url: 'index.php?r=site/question_table',
  type: "POST",
  data: {
      id_soc:element.value,
      user_id:id_u,
      coc:0
      
  },
  success: function(res){


if(res =="yes"){

console.log(res);

location.reload();

//alert( id_u);

}else{

console.log(res);
}
},

error: function(){

alert('Error!');

}
})
       // alert( element.value);

      } else {

$.ajax({
  url: 'index.php?r=site/question_table',
  type: "POST",
  data: {
      id_soc:0,
      user_id:id_u,
      coc:0
      
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
}
  

</script>

<script type="text/javascript">
	    $('.subject-list').on('change', function() {
		    $('.subject-list').not(this).prop('checked', false);  
		});


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


var id_qs = <?php echo $posts1133[0]['quest_id']?>;

var id_u = <?php echo $posts12[0]['id']?>;

var next = <?php echo $next_q?>;

 $.ajax({
    url: 'index.php?r=site/question_table',
    type: "POST",
    data: {
        id_quest:id_qs,
        answer_1:answer1,
        answer_2:answer2,
        answer_3:answer3,
        user_id:id_u,
        next_id:next,
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
  function testFunc(a){

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

var id_u = <?php echo $posts12[0]['id']?>;

$.ajax({
url: 'index.php?r=site/question_table',
type: "POST",
data: {
   id_quest:a.id,
   user_id:id_u,
 coc:1
   
},
success: function(res){


 location.reload();


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
  setTimeout(function(){
      preload.style.display = 'none';
   },2000);
})

  var id_u = <?php echo $posts12[0]['id']?>;

  $.ajax({
url: 'index.php?r=site/question_table',
type: "POST",
data: {
  user_id:id_u,
 coc:4
   
},
success: function(res){



  location.reload();

},

error: function(){

alert('Error!');

}
})


} 


    </script>

    <div class ="scrolled"> 

    <!-- /.box-body -->


    <?php
    
    foreach($cart as $kok):


      $query = Yii::$app->db->createCommand('SELECT id,amtl_frage_nr,points FROM quesions WHERE id='.$kok)->queryAll();

      //000000
$posts11 = Yii::$app->db->createCommand('SELECT * FROM true_answer  WHERE user_id='.$posts228[0]['id'].' AND quest_id='.$kok)->queryAll();

$posts112 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_stud  WHERE stud_id='.$posts228[0]['id'])->queryAll();

$posts113 = Yii::$app->db->createCommand('SELECT * FROM langs  WHERE id='.$posts112[0]['langs_id'])->queryAll();


  //000000
  $posts12 = Yii::$app->db->createCommand('SELECT * FROM false_answer  WHERE user_id='.$posts228[0]['id'].' AND quest_id='.$kok)->queryAll();
  

    ?>
    
    <?php foreach($query as $key): ?>

<?php $query2 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags WHERE qeust_id='.$key['id'])->queryAll();  
$query4 = Yii::$app->db->createCommand('SELECT question FROM langs_question WHERE question_id='.$key['id'].' AND languege="'.$posts113[0]['name'].'"' )->queryAll();  
?>
    <?php

foreach($query4 as $key4):
  $name2 = $key4['question'];
endforeach;

foreach($query2 as $key2):

  $query3 = Yii::$app->db->createCommand('SELECT name FROM tags WHERE id='.$key2['tags_id'])->queryAll(); 
  
  foreach($query3 as $key3):
 // print_r($key3['name']);
  $name = $key3['name'];
endforeach;
endforeach;
?>
   <a>

   <?php 
   
   $query45 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE user_id='.$posts228[0]['id'])->queryAll(); 

 
   
   if($query45[0]['quest_id']==$key['id']){
  

    echo "<div class='row' style= 'border-left: 20px solid #00CED1;' data-toggle='control-sidebar' onclick='testFunc(this)' id='".$key['id']."'>";

   }else{

    echo "<div class='row' data-toggle='control-sidebar' onclick='testFunc(this)' id='".$key['id']."'>";

   }
   ?>
    

    <div class="col-md-6">
    <strong><?php echo $key['amtl_frage_nr']?></strong>
    <p class="text-muted">
    
    
    <?php 

$count_array;

$count_array++;




if($posts11 !=null){


$x_count_balls = 1;

$y_count = $posts11[0]['count'];


}else{



 


  if($posts12 !=null){

    
    $x_count_balls = 2;

    
    $y_count = $posts12[0]['count'];
    
    
    }else{

     

      $x_count_balls = 0;

      $y_count = 2;

    }



}


//$y_count

    
    if($x_count_balls == 1){

      for ($i = 1; $i <= $y_count; $i++) {


        if($y_count > 1){

          if($y_count != $i){
            echo "<i class='fa fa-circle fa-lg' style='color:#800000'></i> "; //красный

          }else{

            echo "<i class='fa fa-circle fa-lg' style='color:#008000'></i> "; //зеленый

          }
         
         
        }else{

          echo "<i class='fa fa-circle fa-lg' style='color:#008000'></i> "; //зеленый
          
        }
        
        
      }


    }else if($x_count_balls ==2){


      for ($i = 1; $i <= $y_count; $i++) {
        


        echo "<i class='fa fa-circle fa-lg' style='color:#800000'></i> ";
        
        
      }
      echo "<i class='fa fa-circle fa-lg'></i> ";

    }else{

      for ($i = 0; $i < $y_count; $i++) {
        echo "<i class='fa fa-circle fa-lg'></i> ";
      }

    }
    
    
    ?>
    
    
    <?php echo $name2?> - <?php echo $posts1002[0]['points']?>: <?php echo $key['points']?>
   - <?php
    if(Yii::$app->user->identity->role ==4){

      $posts1228 = Yii::$app->db->createCommand('SELECT id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
    
     }else  if(Yii::$app->user->identity->role ==3){
    
      $posts1228 = Yii::$app->db->createCommand('SELECT id FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
    
     }else  if(Yii::$app->user->identity->role ==2){
    
      $posts1228 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
       
     }

   echo "B"?>
  </p>
    </div>
    <div class="col-md-6 text-right" style="margin-top:15px;"><i class="fa fa-info-circle fa-lg"></i></div>

   
  </div>
  <hr style="margin:0;">
  
  <?php
 
endforeach; 

endforeach;
?>

<!-- /.box-body -->
</div>
</a>
     <?php BoxWidget::end();?>


      
         
          <?php Pjax::end();?>


          <script>

 
            </script>
         
