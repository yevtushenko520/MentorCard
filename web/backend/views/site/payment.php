<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\widgets\DetailView;
use yii\grid\GridView;

if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}



$posts5111 = Yii::$app->db->createCommand('SELECT * FROM price ')->queryAll();
$posts5333 = Yii::$app->db->createCommand('SELECT * FROM products ')->queryAll();

if(Yii::$app->user->identity->role ==4){

  $posts11 = Yii::$app->db->createCommand('SELECT categor,id FROM students  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();


 }else  if(Yii::$app->user->identity->role ==3){

  $posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

 }else  if(Yii::$app->user->identity->role ==2){

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM admin  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
 }
 else  {

  $posts11 = Yii::$app->db->createCommand('SELECT id FROM user  WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();
   
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




?>
<div class="navbar-wrapper">
   

   <?php
   
if(Yii::$app->user->identity->role==3){


  
  ?>
  <h2 class="text-center "style="margin-bottom:20px;"><span><?php echo $posts1003[0]['waren']?>: <p id="demo"></p>


    <?php     }else { 
      
 $posts1189 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE user_id='.$posts11[0]['id'])->queryAll();
      


 $a = $posts1189[0]['customer'];

if (strpos($a, 'OU') !== false) {
    $status = "Online User";
    $status_back = 0;
}else if(strpos($a, 'OU') === false){
  $status = "Payment User";
  $status_back = 1;
}

      ?>


  <h2 class="text-center "style="margin-bottom:20px;"><span>Status: <?php echo $status;?>

      <?php       




        }
        ?>
        
      
</span></h2>
    
</div>


<script>

var glob_count = 0;

</script>


<div class="col-md-8">
<?php BoxWidget::begin([
        'title' => $posts1003[0]['order'], //string    
        'border' => false,       //boolean
        'color' => 'default',     //bootstrap color name 'success', 'danger' еtс.
        'solid' => false,        //boolean
        'padding' => true,       //boolean
        'footer' => false,       //boolean or html to render footer
        'collapse' => false,      //boolean Default AdminLTE button for collapse box
             //boolean Default AdminLTE button for remove box
        'hide' => false,         //boolean collapsed or not
        'buttons' => [           //array with config to add custom buttons or links
        ],   //boolean or html to render footer
        
    ]);
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
<?php if(Yii::$app->user->identity->role ==4){?>

    <table class='table1'>
  <tr>
    <th></th>
    <th></th>
    <th><?php echo $posts1003[0]['price']?></th>
    <th><?php echo $posts1003[0]['amount']?></th>
  </tr>
  <tr  style='border-bottom: 1px solid #dddddd;border-top: 1px solid #dddddd;'>
    <td onclick="myFunction1()"><?php echo $posts1003[0]['mentorcard']?> </td>
    <td onclick="myFunction1()"><i class="fa fa-chevron-down"></i></td>
    <td><?php echo $posts5111[0]['price']?> €</td>
    <td>
    
    1

</select></td>

  </tr>
  <tr id="target">
  <td style='font-size:13px;'><?php echo $posts1003[0]['text_ment']?></td>
</tr>

 
  </table>

  <?php }?>

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
function myFunction1(item) {

  var tag = "#"+item;
  $(tag).toggle('slow');
}
function myFunction2() {
  $('#target1').toggle('slow');
}
function myFunction3() {
  $('#target2').toggle('slow');
}

</script>

<?php if(Yii::$app->user->identity->role !=4){?>
    <table class='table1'>

<?php 

$count = 0;

foreach($posts5333 as $kola):
  
  echo "
  

  <style>

#target_".$count."{
  display:none;
}

</style>

  ";
  
  ?>


  <tr>
    <th></th>
    <th></th>
    <th><?php echo $posts1003[0]['price']?></th>
    <th><?php echo $posts1003[0]['amount']?></th>
  </tr>
  <tr  style='border-bottom: 1px solid #dddddd;border-top: 1px solid #dddddd;'>
    <td onclick=" $(target_<?php echo $count?>).toggle('slow')"><?php echo  $kola['name']?> </td>
    <td onclick=" $(target_<?php echo $count?>).toggle('slow')"><i class="fa fa-chevron-down"></i></td>
    <td><?php echo  $kola['price']?> €</td>
    <td>
    
    <select class="form-control1 amount" id="mySelect" onchange="myFunction(<?php echo  $kola['price']?>)">
	<option value='0' selected='selected'>0</option>
	<option value='10'>10</option>
	<option value='20'>20</option>
	<option value='30'>30</option>
    <option value='40'>40</option>
    <option value='50'>50</option>
    <option value='60'>60</option>
    <option value='70'>70</option>
    <option value='80'>80</option>
    <option value='90'>90</option>
    <option value='100'>100</option>
</select></td>

  </tr>
  <tr id="target_<?php echo $count?>">
  <td style='font-size:13px;'><?php echo  $kola['description']?></td>
</tr>

 <?php 

$count++;

endforeach; ?>


  </table>


  <?php }?>

   <table class='table2' style='margin-top:10px;'>
   <tr>
    <th style='padding-left:0;'><?php echo $posts1003[0]['invo_shop']?></th>
    <th></th>
    <th></th>
  </tr>
  <tr>
    <td style='padding-left:0;'>Rechnungsadresse</td>
    <td style='padding-left:0;color:#20B2AA;font-size:12px;'>Rechnungsadresse ändern</td>
    <td style='padding-left:10px;'>Lieferadresse </td>
    <td style='padding-left:0;color:#20B2AA;font-size:12px;'>Lieferadresse ändern</td>
  </tr>
  
  <tr>
    <td style='padding:0;'><?php echo $posts11[0]['school_name']?></td>
    <td></td>
    <td style='padding-bottom:0;padding-left:10px;'><?php echo $posts11[0]['school_name']?></td>
    <td></td>
  </tr>
  
  <tr>
    <td style='padding:0;'><?php echo $posts11[0]['street']?></td>
    <td></td>
    <td style='padding-top:0;padding-bottom:0;padding-left:10px;'><?php echo $posts11[0]['street']?></td>
    <td></td>
  </tr>

  <tr id='last_tr'>
  <td style='padding:0;'><?php echo $posts11[0]['post_code']?> <?php echo $posts11[0]['city']?></td>
    <td></td>
    <td style='padding-top:0;padding-bottom:0;padding-left:10px;'><?php echo $posts11[0]['post_code']?> <?php echo $posts11[0]['city']?></td>
    <td></td>
  </tr>
  
</table>

<table class='table2' style='margin-top:10px;'>
   <tr>
    <th style='padding-left:0;'>BEZAHLUNG</th>
    <th></th>
    <th></th>
  </tr>
  <tr >
    <td style='padding-left:0;'><?php echo $posts11[0]['school_name']?> </td>
    <td style='padding-left:0;color:#20B2AA;font-size:12px;'>Bankverbindung ändern</td>
    <td ></td>
    <td></td>
  </tr>
  

  <?php 

$length = 15;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

?>
  <tr>
    <td style='padding:0;'>Mandatsreferenz: <?php echo $randomString?></td>
    <td></td>
    <td style='padding-bottom:0;padding-left:10px;'></td>
    <td></td>
  </tr>
  
  <tr>
    <td style='padding:0;'>Kontoinhaber: <?php echo $posts11[0]['first_name']?> <?php echo $posts11[0]['last_name']?></td>
    <td></td>
    <td style='padding-top:0;padding-bottom:0;padding-left:10px;'></td>
    <td></td>
  </tr>
  <tr>
    <td style='padding:0;'>IBAN: <?php echo $posts11[0]['iban']?></td>
    <td></td>
    <td style='padding-top:0;padding-bottom:0;padding-left:10px;'></td>
    <td></td>
  </tr>

  <tr >
  <td style='padding:0;'>BIC / SWIFT:  <?php echo $posts11[0]['bic']?></td>
    <td></td>
    <td style='padding-top:0;padding-bottom:0;padding-left:10px;'></td>
    <td></td>
  </tr>
  
</table>

    <?php BoxWidget::end();?>
    </div>

    <div class="col-md-4">
<?php BoxWidget::begin([
        'title' => $posts1003[0]['order_sum'], //string
        'border' => false,       //boolean
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

<style>
td, th {
    
    text-align: left;
    padding: 4px;
    
}
#target{
  display:none;
}
#target1{
  display:none;
}
#target2{
  display:none;
}

.form-control1 {
    padding: 0 10px;
    box-shadow: none;
    border-color: #d2d6de;
    display: block;
    /* width: 100%; */
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
input{
    width: 100%;
    height:40px;
    font-size:19px;
    margin-top:30px;
}
.table1 {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }
  .table2 {
     
      width: 100%;
  }
  #last_tr{
    border-bottom: 2px solid #dddddd;
    margin:5px;
  }
  p{
      padding:0%;
      margin-top:3px;
  }
  .go_k{
    width: 100%;
    margin-top:30px;
  }
</style>

   <table class='table1'>
  
  <tr>
    <td><?php echo $posts1003[0]['invo_amo']?></td>
    <td><p id="demo1"></p></td>
    
  </tr>
 
  <tr id='last_tr'>
    <td>+ 19% <?php echo $posts1003[0]['vat']?></td>
    <td><p id="demo2"></p></td>
   
  </tr>
  
</table>


<div class="row">
<div class="col-md-8">
<?php echo $posts1003[0]['invo_amo']?>:
</div>
<div class="col-md-4">
<p id="demo"></p>
</div>
</div>

<?php if(Yii::$app->user->identity->role !=4){?>
<button type="button" class="btn btn-primary go_k" onclick="buy()"><?php echo $posts1003[0]['buy_now']?></button>

<?php }?>



<?php if(Yii::$app->user->identity->role ==4){
  
  if( $status_back==0){

  ?>
<button type="button" class="btn btn-primary go_k" onclick="buyTo()"><?php echo $posts1003[0]['buy_now']?></button>



<?php 

}else {


?>




<?php 

  

}?>
<?php 

  

}?>

    <?php BoxWidget::end();?>
    </div>


<?php

 $posts1005 = Yii::$app->db->createCommand('SELECT * FROM active_code_res  WHERE user_id='.$posts11[0]['id'])->queryAll();

?>

<?php if(Yii::$app->user->identity->role !=4){?>
<table class="table table-striped table-bordered"><thead>
<tr><th>#</th><th>Code</th><th>Status</th><th>Students</th></tr>
</thead>
<tbody>




<script>

var price = <?php echo $posts5111[0]['price']?>;
function myFunction(price_cen) {

  
    var x = document.getElementById("mySelect").value;

    var first_price = x*price_cen;
    var vat = first_price*19/100;
    var sum =  glob_count+first_price + vat;

    glob_count = sum;
    document.getElementById("demo").innerHTML =  parseFloat(glob_count).toFixed(1) +" €";

    document.getElementById("demo1").innerHTML =  parseFloat(glob_count).toFixed(1) +" €";

    document.getElementById("demo2").innerHTML =  parseFloat(vat).toFixed(1) +" €";
}
</script>



<?php
$count = 0;
foreach($posts1005 as $kola):
$count++;

$posts1006 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE activation_code="'.$kola['code'].'"')->queryAll();
$posts1007 = Yii::$app->db->createCommand('SELECT * FROM active_code  WHERE code="'.$kola['code'].'"')->queryAll();

?>
<tr data-key="6"><td><?php echo $count?></td><td><?php echo $kola['code']?></td><td><?php echo $posts1007[0]['status']?></td><td><?php 

if($posts1006!=null){
echo $posts1006[0]['username'];
}else{
  echo "<span class='not-set'>(not set)</span>";
}

?></td></tr>

<?php endforeach;?>

</tbody></table>

<?php }?>


<?php 

if(Yii::$app->user->identity->role ==4){


echo "<script>

var first_price = ".$posts5111[0]['price'].";
var vat = first_price*19/100;
var sum = first_price + vat;
document.getElementById('demo').innerHTML =  parseFloat(sum).toFixed(1) +' €';

document.getElementById('demo1').innerHTML =  parseFloat(first_price).toFixed(1) +' €';

document.getElementById('demo2').innerHTML =  parseFloat(vat).toFixed(1) +' €';



</script>";

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



function buyTo(){

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

        var price = <?php echo $posts5111[0]['price']?>;

  var id_u = <?php echo $posts11[0]['id']?>;



     var first_price = price;
    var vat = first_price*19/100;
    var sum = first_price + vat;

 $.ajax({
    url: 'index.php?r=site/payment',
    type: "POST",
    data: {
        user_id:id_u,
        number:sum,
        sets:1
    },
    success: function(res){


if(res =="yes"){

  console.log(res);

   window.location.replace("http://www.mentorcard.de/backend/web/index.php?r=site%2Fcheckout");
 

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



function buy(){

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

  var x = document.getElementById("mySelect").value;

        var price = <?php echo $posts5111[0]['price']?>;

  var id_u = <?php echo $posts11[0]['id']?>;

  if(x!=0){

     var first_price = x*price;
    var vat = first_price*19/100;
    var sum = first_price + vat;

 $.ajax({
    url: 'index.php?r=site/payment',
    type: "POST",
    data: {
        user_id:id_u,
        number:sum,
        sets:x
    },
    success: function(res){


if(res =="yes"){

  console.log(res);

   window.location.replace("http://www.mentorcard.de/backend/web/index.php?r=site%2Fcheckout");
 

}else{

  console.log(res);
}




},

error: function(){

alert('Error!');

}
})

}else{

  alert('You did not select anything.');

}

}
  </script>
    