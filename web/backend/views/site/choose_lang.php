

<?php 

/*
$username = Yii::$app->user->identity->username;

if($username!=null){

  header("Location: http://www.mentorcard.de/backend/web/index.php");
  die();
  
}else{

}
*/
?>
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/back.png');">
			
        <div class="blocks">
<div class="bl1">
         <img src="http://www.mentorcard.de/backend/web/images/logo-choose.png" 
   alt="lorem">
  </div>	


<style>

.list{
    visibility: hidden;
    
  }
@media screen and (max-width: 600px) {

  .list{
    visibility: visible;
    
  }

  .bl2{
    visibility: hidden;
  }

}


</style>


<style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
  background-color: #fff;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #fff;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>



  <select onchange="closeNav(this)" class="list custom-select" style=" position: absolute;top:20%;">
  <option selected value="">Select Languages</option>
	<option  id="2">Deutsch</option>
	<option  id="10">Română</option>
	<option  id="8">Português</option>
	<option  id="15">中文</option>  
  <option id="1">پښتو</option>
  <option  id="7">Français</option>
  <option  id="12">Ελληνικά</option>
  <option  id="4">Italiano</option>
  <option  id="14">हिंदी</option>
  <option  id="16">عربى</option>
  <option  id="11">Русский</option>
  <option id="9">Polski</option>
  <option id="6">Español</option>
  <option  id="1">فارسی</option>
  <option  id="1">English</option>
  <option  id="13">ਪੰਜਾਬੀ</option>
  <option  id="3">Turk</option>
  <option  id="1">Hrvatski</option>
</select>

 <div class="bl2" >
 <div class="row">
 <div class="container">
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="2">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="10">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam1.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="8">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam2.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="15"> 
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam3.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)"id="1" >
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam4.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)"  id="7">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam5.png" 
  class="img_btn" alt="lorem"></a>
    </div>

  </div>
  </div>
  <div class="row" style="margin-top:15px">
 <div class="container">
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="12">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam6.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="4">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam7.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="14">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam8.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="1">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam9.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="11">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam10.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="9">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam11.png" 
  class="img_btn" alt="lorem"></a>
    </div>

  </div>
  </div>
  <div class="row"  style="margin-top:15px">
 <div class="container">
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="6">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam12.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="16">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam13.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="1">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam14.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="13">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam15.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="3">
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam16.png" 
  class="img_btn" alt="lorem"></a>
    </div>
    <div class="col-md-2"><a class="help" onclick="closeNav2(this)" id="1" >
    <img src="http://www.mentorcard.de/backend/web/images/btn_gernam17.png" 
  class="img_btn" alt="lorem"></a>
    </div>

  </div>
  </div>
  
  </div>
	
        </div>
	</div>
	</div>

	
    
</div>
        
<style>
.help { cursor: pointer; }
.blocks{position: relative; top: 0; left: 0;}
.img_btn{
        height: 50px;
    width: 150px;
}
.bl1{width: 100%; height: 100%;  height: 10em;
    position: relative;}

    div.bl1 img {
    margin: 0;
    position: absolute;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    width: 129px;
height: 155px;
margin-top: 100px;
      }

      @media only screen and (max-width: 991px) {

div.bl1 img {
  margin: 0;
  position: absolute;
  left: 50%;
  margin-right: -50%;
  transform: translate(-50%, -50%);
  width: 159px;
    height: 180px;
  margin-top: 130px;
}

}


.bl2{width: 100%; height: 100%;margin-top:150px;}
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
function closeNav(b) {

   

var xop = '<?php echo $ip?>';

document.cookie = "govno="+b[b.selectedIndex].id+";path=/";

 console.log(b[b.selectedIndex].id);

 $.ajax({
url: 'index.php?r=site/choose_lang',
type: "POST",
data: {

    lang_id:b[b.selectedIndex].id,
    user_ip:xop

},
success: function(res){


if(res =="yes"){

console.log(res);

window.location.href = 'http://www.mentorcard.de/frontend/web/index.php';


}else{

console.log(res);
}

},

error: function(){

alert('Error!');

}
})



//document.getElementById("myNav").style.width = "0%";


}
</script>


<script>
function closeNav2(b) {

   

var xop = '<?php echo $ip?>';

document.cookie = "govno="+b.id+";path=/";

 console.log(b.id);

 $.ajax({
url: 'index.php?r=site/choose_lang',
type: "POST",
data: {

    lang_id:b.id,
    user_ip:xop

},
success: function(res){


if(res =="yes"){

console.log(res);

window.location.href = 'http://www.mentorcard.de/frontend/web/index.php';


}else{

console.log(res);
}

},

error: function(){

alert('Error!');

}
})



//document.getElementById("myNav").style.width = "0%";


}
</script>