<html lang="en" class=" js no-touch"><head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DSAThemes">	
		<meta name="description" content="MentorCard">
		<meta name="keywords" content="MentorCard">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
		<!-- SITE TITLE -->
        <title>MentorCard</title>
        
        <link rel="icon" href="http://www.mentorcard.de/backend/web/images/mini_logo.png">

		<!-- FAVICON AND TOUCH ICONS  -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        
        <link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon-144x144.png">
        
		<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="images/icons/apple-touch-icon.png">
				
		<!-- BOOTSTRAP CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="css/font-awesome.min.css" rel="stylesheet">	
		<link href="css/themify-icons.css" rel="stylesheet">
				
		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,900,700,500,300" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> 
				
		<!-- PLUGINS STYLESHEET -->
		<link href="css/owl.carousel.css" rel="stylesheet">
		<link href="css/flexslider.css" rel="stylesheet">
		<link href="css/magnific-popup.css" rel="stylesheet">
		
		<!-- On Scroll Animations -->
		<link href="css/animate.min.css" rel="stylesheet">
				
		<!-- TEMPLATE CSS -->
		<link href="css/style.css" rel="stylesheet"> 	

		<!-- RESPONSIVE CSS -->
		<link href="css/responsive.css" rel="stylesheet"> 
			
	</head>


<?php 

$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1001 = Yii::$app->db->createCommand('SELECT * FROM frontend_langs  WHERE lang_id='.$set)->queryAll();
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_back_sec  WHERE lang_id='.$set)->queryAll();

  
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}

?>

	<body>
	
	<style>


.navigation__button--simple {
    padding-right: 5px;
    padding-left: 5px;
    box-shadow: none;
}
.navigation__button {
    padding: 0;
    margin: 0;
    overflow: hidden;
    font: inherit;
        font-size: inherit;
        line-height: inherit;
    line-height: inherit;
    color: inherit;
    white-space: nowrap;
    border: 0;
    border-radius: 0;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: none;
    display: inline-block;
    height: 45px;
    padding: 10px 20px;
        padding-right: 20px;
        padding-left: 20px;
    font-size: 12px;
    line-height: 25px;
    color: #000;
    text-decoration: none;
    text-transform: uppercase;
    vertical-align: middle;
    border-radius: 3px;
    box-shadow: inset 0 0 0 2px #fff;
    -webkit-transition: color .2s ease-in-out;
    transition: color .2s ease-in-out;
}
.navigation__button .icon {
    width: 20px;
    height: 20px;
    margin-right: 5px;
    vertical-align: -5px;
}
.icon.flag-ru-ru {
    
}
.navigation__language-icon {
    width: 30px;
    height: 30px;
    vertical-align: middle;
    border: 2px solid #fff;
    border-radius: 50%;
}
.navigation__button--with-arrow::after {
    display: inline-block;
    margin-left: 2px;
    vertical-align: middle;
    border: 4px solid transparent;
        border-top-color: transparent;
    border-top-color: currentColor;
    content: "";
}
	</style>

	<style>
.dropbtn {
   
    
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>	
	
	
		<!-- PRELOADER
		============================================= -->		
		<div id="loader-wrapper" style="display: none;">
			<div id="loader" style="display: none;"></div>
		</div>
	
	
		
		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page">
		
		
		
			<!-- HEADER-2
			============================================= -->
			<header id="header-2" class="header">

				<!-- navbar default White Background: -->	
				<!--
				<nav class="navbar">
				-->
				
				<!-- navbar fixed on top White Background: -->
				<!--
					<nav class="navbar navbar-fixed-top bg-white"> 
				-->
								
				<!-- navbar fixed on top Transparent Background : -->				
				<nav class="navbar navbar-fixed-top no-bg header-dark" style="padding-bottom: 25px;"> 
															
					<div class="container">
											
						<!-- Navigation Bar -->
						<div class="navbar-header">
						
							<!-- Responsive Menu Button -->
							<button type="button" id="nav-toggle" class="navbar-toggle text-right" data-toggle="collapse" data-target="#navigation-menu">
								<span class="sr-only">Toggle navigation</span> 
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
							<!-- LOGO IMAGE -->
							<!-- Recommended sizes 120x16px; -->
							<a class="navbar-brand logo-white" style="padding-top:10px" href="#intro-13"><img src="images/Logo_Web.png" style="width: 13%;margin-bottom:5px;" alt="logo" ></a>
							<a class="navbar-brand logo-black" style="padding-top:10px" href="#intro-13"><img src="images/Logo_Web.png" style="width: 13%;margin-bottom:5px; " alt="logo"></a>
							
						</div>	<!-- End Navigation Bar -->
												
						<!-- Navigation Menu -->
						<div id="navigation-menu" class="collapse navbar-collapse editContent" style="margin-top:5px;">
							<ul class="nav navbar-nav navbar-right" >													
																																						
								<li class="nav-link"><a href="#intro-13"><?php echo $posts1002[0]['home']?></a></li>
								<li class="nav-link"><a href="#content-11-1"><?php echo $posts1002[0]['about']?></a></li>	
								<li class="nav-link"><a href="#portfolio-3-1"><?php echo $posts1002[0]['features']?></a></li>
								<?php if(Yii::$app->user->identity->username==null){?>
								<li class="nav-link"><a href="http://www.mentorcard.de/backend/web/index.php?r=site%2Fsignup"><?php echo $posts1002[0]['sign_up']?></a></li>										
								<li class="nav-link"><a class="header-btn" href="http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin"><?php echo $posts1002[0]['login']?></a></li>	

								<?php }else{?>

<li class="nav-link"><a class="header-btn" href="http://www.mentorcard.de/backend/web/">My account</a></li>	
									<?php }?>
								<li class="nav-link" style="margin-top:5px;" >


			<button type="button" onclick="myFunction()" style="font-weight: bold; font-size: 14px;" class="dropbtn navigation__button navigation__button--simple navigation__button--with-arrow">

				<?php 
								
								if($set!=null){

									if($set ==1){
										echo "<img src='images/english.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> English";
									}else if($set ==2){
										echo "<img src='images/germany.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Deutsch";
									}else if($set ==3){
										echo "<img src='images/turkey.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Turk";
									}else if($set ==4){
										echo "<img src='images/italy.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Italiano";
									}else if($set ==5){
										echo "<img src='images/croatia.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Hrvatski";
									}else if($set ==6){
										echo "<img src='images/spain.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Español";
									}else if($set ==7){
										echo "<img src='images/france.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Français";
									}else if($set ==8){
										echo "<img src='images/portugal.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Português";
									}else if($set ==9){
										echo "<img src='images/poland.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Polski";
									}else if($set ==10){
										echo "<img src='images/romania.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Română";
									}else if($set ==11){
										echo "<img src='images/russia.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Русский";
									}else if($set ==12){
										echo "<img src='images/greece.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> Ελληνικά";
									}else if($set ==13){
										echo "<img src='images/india.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> हिंदी";
									}else if($set ==14){
										echo "<img src='images/india.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> ਪੰਜਾਬੀ";
									}else if($set ==15){
										echo "<img src='images/china.png' alt='lang' style='float:left;margin-right:0.7em;width: 27px; margin-top: 3px;'> 中文";
									}

								}else{

								}

								?>
                                </button>
								
								<div id="myDropdown" class="dropdown-content">

	<button type="button" onclick="cocka(this)" id="1" style="height:25px;width:130px;background-color: Transparent;
    background-repeat:no-repeat;border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
margin-top: 3px;
text-transform: uppercase;
font-weight: bold;
">



<img src='images/english.png' alt='lang'  style='margin-right:0.5em;width:30px;height:20px;'> English </button>

	<button type="button" onclick="cocka(this)" id="2" style="height:25px;width:130px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/germany.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Deutsch </button>
  


	<button type="button"  onclick="cocka(this)" id="3" style="height:25px;width:100px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/turkey.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Turk </button>


  <button type="button" onclick="cocka(this)" id="4" style="height:25px;width:130px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/italy.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Italiano </button>
 

    <button type="button" onclick="cocka(this)" id="1"  style="height:25px;width:135px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/croatia.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Hrvatski </button>
  

   <button type="button"  onclick="cocka(this)" id="6" style="height:25px;width:130px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/spain.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Español </button>
  

   <button type="button" onclick="cocka(this)" id="7"  style="height:25px;width:135px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/france.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Français</button>

<button type="button" onclick="cocka(this)" id="8" style="height:25px;width:150px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/portugal.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Português</button>


<button type="button"  onclick="cocka(this)" id="9" style="height:25px;width:115px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/poland.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Polski</button>

<button type="button" onclick="cocka(this)" id="10"  style="height:25px;width:130px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/romania.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Română</button>

<button type="button" onclick="cocka(this)" id="11"  style="height:25px;width:135px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/russia.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Русский</button>

<button type="button"  onclick="cocka(this)" id="12" style="height:25px;width:140px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/greece.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> Ελληνικά</button>

<button type="button" onclick="cocka(this)" id="14"  style="height:25px;width:95px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/india.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> हिंदी</button>

<button type="button" onclick="cocka(this)" id="13"  style="height:25px;width:107px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/india.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> ਪੰਜਾਬੀ</button>

<button type="button" onclick="cocka(this)" id="15"  style="height:25px;width:95px;background-color: Transparent;     background-repeat:no-repeat;border: none;     cursor:pointer;     overflow: hidden;     outline:none; margin-top: 3px; text-transform: uppercase; font-weight: bold;">

<img src='images/china.png' alt='lang' style='margin-right:0.5em;width:30px;height:25px;'> 中文</button>

  </div>
  

  <script>

function cocka(b){

	document.cookie = "govno="+b.id+";path=/";

console.log(b.id);

location.reload();

}
	  </script>
  
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

								
								</li>
							</ul>
						</div>  <!-- End Navigation Menu -->
						
					</div>	  <!-- End container -->
					
				</nav>	   <!-- End navbar  -->

			</header>	<!-- END HEADER-2 -->	
		
		
		
			<!-- INTRO-13
			============================================= -->
			<section id="intro-13" class="intro-section division wide-intro">
				<div class="container">		
					<div id="intro-13-content" class="row intro-row-140">
							
							
						<!-- INTRO TEXT -->
						<div class="col-md-12 intro-txt text-center editContent">
								
							<!-- Title -->
							<h2 class="intro-medium"><?php echo $posts1001[0]['first_title_home']?></h2>
								
							<!-- Text -->
							<p><?php echo $posts1001[0]['sec_title_home']?> 
							</p>
							
							<!-- Store Badges -->
							<div class="intro-stores-badge m-top-40 m-bottom-50" data-animation-delay="700">
											
								<!-- APPStore -->
								<a class="store" href="#">
									<img class="appstore-button" src="images/appstore.png" alt="appstore-logo">
								</a>
										
								<!-- Google Play -->
								<a class="store" href="#">
									<img class="googleplay-button" src="images/googleplay.png" alt="googleplay-logo">
								</a>
									
								<!-- Aamazon Market
								<a class="store" href="#">
									<img class="amazon-button" src="images/amazon.png" alt="amazon-logo" >
								</a>  -->
																		
								<!-- Windows Market
								<a class="store" href="#">
									<img class="windows-button" src="images/windows.png" alt="windows-logo" >
								</a> -->
									
							</div>	<!-- End Store Badges -->							

							<!-- Image -->
							<img class="img-responsive" src="images/intro-13-img.png" alt="intro-image">	
							
						</div>

																
					</div>	 <!-- End Intro Content -->
				</div>    <!-- End container -->
			</section>	<!-- END INTRO-13 -->
			
			
			
			<!-- SERVICES-6-2
			============================================= -->
			<section id="services-6-2" class="bg-lightgrey wide-100 services-section division bg-edit">
				<div class="container">	


					<!-- SECTION TITLE -->	
					<div class="row">	
						<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 section-title editContent">						
							<h3><?php echo $posts1001[0]['first_title_about']?></h3>								
							<p><?php echo $posts1001[0]['sec_title_about']?>
							</p>
						</div>		
					</div>
					
				
					<div class="row">
					
						<!-- LEFT SIDE CONTENT -->	
						<div class="col-sm-4 text-right p-right-30">
							
							<!-- SERVICE BOX #1 -->
							<div class="sbox-3 m-top-120 m-bottom-40 editContent animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="300">
								<h4><?php echo $posts1001[0]['one_title_about']?></h4>
								<p><?php echo $posts1001[0]['one_about']?></p>
							</div>
									
							<!-- SERVICE BOX #2 -->	
							<div class="sbox-3 m-bottom-40 editContent animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="500">
								<h4><?php echo $posts1001[0]['two_title_about']?></h4>
								<p><?php echo $posts1001[0]['two_about']?></p>
							</div>	

							<!-- SERVICE BOX #3 -->
							<div class="sbox-3 editContent animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="700">
								<h4><?php echo $posts1001[0]['three_title_about']?></h4>
								<p><?php echo $posts1001[0]['three_about']?></p>
							</div>	
								
						</div>	
								
													
						<!-- SERVICE IMAGE -->
						<div class="col-sm-4 sbox-3-img text-center animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="500">	
							<img class="img-responsive" src="images/iphones-1.png" alt="services_image">
						</div>
								
								
						<!-- RIGHT SIDE CONTENT -->							
						<div class="col-sm-4 p-left-30">	
							
							<!-- SERVICE BOX #4 -->
							<div class="sbox-3 m-top-120 m-bottom-40 editContent animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="300">
								<h4><?php echo $posts1001[0]['four_title_about']?></h4>
								<p><?php echo $posts1001[0]['four_about']?></p>
							</div>
								
							<!-- SERVICE BOX #5 -->
							<div class="sbox-3 m-bottom-40 editContent animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="500">
								<h4><?php echo $posts1001[0]['five_title_about']?></h4>
								<p><?php echo $posts1001[0]['five_about']?></p>
							</div>	
								
							<!-- SERVICE BOX #6 -->
							<div class="sbox-3 editContent animated fadeInRight visible" data-animation="fadeInRight" data-animation-delay="700">
								<h4><?php echo $posts1001[0]['six_title_about']?></h4>
								<p><?php echo $posts1001[0]['six_about']?></p>
							</div>	
								
						</div>
																			
					</div>	 <!-- End row -->
					
					
				</div>	   <!-- End container -->	
			</section>	<!-- END SERVICES-6-2 -->
			

			
			<!-- CONTENT-11-1
			============================================= -->	
			<section id="content-11-1" class="wide-70 content-section division bg-edit">
				<div class="container">
					<div class="row">
					
					
						<!-- CONTENT TEXT -->
						<div class="col-sm-6 content-11-txt m-bottom-30 editContent">
						
							<!-- Title -->
							<h3 class="h3-lg"><?php echo $posts1001[0]['first_title_feature']?></h3>
							
							<!-- Text -->
							<p><?php echo $posts1001[0]['sec_title_feature']?>
							</p>
							
							<p><?php echo $posts1001[0]['three_title_feature']?>
							</p>

							<div class="row m-top-30">

								<!-- STATISTIC BLOCK #1 -->
								<div class="col-xs-3 col-sm-4 statistic-block m-bottom-30">	
									<div class="statistic-number">2468</div>
									<p><?php echo $posts1001[0]['rec_feature']?></p>						
								</div>
																												
								<!-- STATISTIC BLOCK #2 -->
								<div class="col-xs-3 col-sm-4 statistic-block m-bottom-30">
									<div class="statistic-number">443</div>
									<p><?php echo $posts1001[0]['satif_feature']?></p>							
								</div>
															
								<!-- STATISTIC BLOCK #4 -->
								<div class="col-xs-3 col-sm-4 statistic-block m-bottom-30">
									<div class="statistic-number">845</div>
									<p><?php echo $posts1001[0]['follow_feature']?></p>						
								</div>

							</div>	 <!-- End row -->
						
						</div>
						
						
						<!-- CONTENT IMAGE -->
						<div class="col-sm-6 content-11-img text-center m-bottom-50 p-left-45">
							<img class="img-responsive" src="images/iphones-2.png" alt="content-image">
						</div>
						   
								   
					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-11-1-->
			
			
			
			<!-- CONTENT-1-5
			============================================= -->
			<section id="content-1-5" class="bg-scroll bg-green wide-50 content-section division bg-edit">
				<div class="container white-color">	
					<div class="row">
					
					
						<!-- CONTENT IMAGE -->
						<div class="col-sm-6 content-1-img text-center m-bottom-50 editContent">
							<img class="img-responsive" src="images/content-img-3.png" alt="content-image">
						</div>
						
						
						<!-- CONTENT TEXT -->
						<div class="col-sm-6 content-1-txt m-bottom-50 editContent">
						
							<!-- Title -->
							<h2 class="h2-huge"><?php echo $posts1001[0]['first_title_creative']?></h2>
							
							<!-- Text -->
							<p class="p-lg"><?php echo $posts1001[0]['sec_titlee_creative']?>
							</p>	
													
							<p class="p-lg"><?php echo $posts1001[0]['three_title_creative']?> 
							</p>
							
							<!-- Store Badges -->												
							<div class="stores-badge m-top-40">
											
								<!-- APPStore -->
								<a class="store" href="#">
									<img class="appstore-button" src="images/appstore.png" alt="appstore-logo">
								</a>
											
								<!-- Google Play -->
								<a class="store" href="#">
									<img class="googleplay-button" src="images/googleplay.png" alt="googleplay-logo">
								</a>
										
								<!-- Aamazon Market 
								<a class="store" href="#">
									<img class="amazon-button" src="images/amazon.png" alt="amazon-logo" >
								</a>  -->
																			
								<!-- Windows Market  
								<a class="store" href="#">
									<img class="windows-button" src="images/windows.png" alt="windows-logo" >
								</a> -->
										
							</div>	<!-- End Store Badges -->	
						
						</div>
						
					
					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-1-5 -->
			

			
			<!-- CONTENT-3-2
			============================================= -->
			<section id="content-3-2" class="bg-lightgrey wide-50 content-section division bg-edit">
				<div class="container">	
					<div class="row">
					
					
						<!-- CONTENT TEXT -->
						<div class="col-sm-6 content-3-txt m-bottom-50 p-right-45 editContent">
						
							<!-- Title -->
							<h3 class="h3-lg"><?php echo $posts1001[0]['first_title_design']?></h3>
							
							<!-- Text -->							
							<p><?php echo $posts1001[0]['sec_title_design']?>
							</p>

							<!-- SKILLS --> 
							<div class="skills m-top-30">
														
								<!-- Web Design --> 
								<div class="barWrapper">	
									<h5><?php echo $posts1001[0]['up_design']?></h5>
									<span class="skill-percent">95%</span> 
									<div class="design-progress"><div class="progressBar" style="width: 95%;"></div></div>
								</div>
								
								
								<!-- Web Development --> 
								<div class="barWrapper">	
									<h5><?php echo $posts1001[0]['sat_design']?></h5>
									<span class="skill-percent">89%</span> 
									<div class="develop-progress"><div class="progressBar" style="width: 89%;"></div></div>
								</div>
								
								
								<!-- Photoshop --> 
								<div class="barWrapper">	
									<h5><?php echo $posts1001[0]['rec_design']?></h5>
									<span class="skill-percent">87%</span> 
									<div class="photoshop-progress"><div class="progressBar" style="width: 87%;"></div></div>
								</div>
															
							</div>					
						
						</div>
						
						
						<!-- CONTENT IMAGE -->
						<div class="col-sm-6 content-3-img text-center m-bottom-50 editContent">	
							<img class="img-responsive" src="images/content-img-7.png" alt="content-image">
						</div>

						
					</div>     <!-- End row -->
				</div>	    <!-- End container -->
			</section>	 <!-- END CONTENT-3-2 -->



			<section id="portfolio-3-1" class="bg-black wide-100 portfolio-section division bg-edit">
				<div class="container">	

					
					<!-- SECTION TITLE -->
					<div class="row white-color">	
						<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2 section-title editContent">						
							<h3><?php echo $posts1001[0]['galery_first']?></h3>									
							<p><?php echo $posts1001[0]['galery_sec']?>
							</p>
						</div>		
					</div>
					
											
					<!-- SCREENS ROW -->		
					<div class="row">
						<div class="col-md-12">
						
							<!-- Screenshots carousel holder -->
							<div class="owl-carousel screens_carousel m-bottom-40 owl-theme" style="opacity: 1; display: block;">
							
											
								<!-- IMAGE #1-->
								<div class="owl-item" style="width: 285px;"><div class="item">
										<div class="hover-overlay"> 
											<a class="image-link" href="images/portfolio/screen-2.jpg" title="Aliquam a augue suscipit neque">
											
												<!-- Image Link -->
												<img class="img-responsive" src="images/portfolio/screen-2.jpg" alt="screenshot_image">	
												
												<!-- Image Zoom Icon -->
												<div class="item-overlay">
													<div class="zoom-image"><span class="ti-image"></span></div>
												</div>
												
											</a>
										</div>	<!-- End Hover Overlay -->	
									</div></div>
								
											
								<!-- IMAGE #2-->
								
								<div class="owl-item" style="width: 285px;"><div class="item">
										<div class="hover-overlay"> 
											<a class="image-link" href="images/portfolio/screen-2.jpg" title="Aliquam a augue suscipit neque">
											
												<!-- Image Link -->
												<img class="img-responsive" src="images/portfolio/screen-2.jpg" alt="screenshot_image">	
												
												<!-- Image Zoom Icon -->
												<div class="item-overlay">
													<div class="zoom-image"><span class="ti-image"></span></div>
												</div>
												
											</a>
										</div>	<!-- End Hover Overlay -->	
									</div></div>
																			
								<!-- IMAGE #3-->
								
								<div class="owl-item" style="width: 285px;"><div class="item">
										<div class="hover-overlay"> 
											<a class="image-link" href="images/portfolio/screen-2.jpg" title="Aliquam a augue suscipit neque">
											
												<!-- Image Link -->
												<img class="img-responsive" src="images/portfolio/screen-2.jpg" alt="screenshot_image">	
												
												<!-- Image Zoom Icon -->
												<div class="item-overlay">
													<div class="zoom-image"><span class="ti-image"></span></div>
												</div>
												
											</a>
										</div>	<!-- End Hover Overlay -->	
									</div></div>
																			
								<!-- IMAGE #4-->
								
								<div class="owl-item" style="width: 285px;"><div class="item">
										<div class="hover-overlay"> 
											<a class="image-link" href="images/portfolio/screen-2.jpg" title="Aliquam a augue suscipit neque">
											
												<!-- Image Link -->
												<img class="img-responsive" src="images/portfolio/screen-2.jpg" alt="screenshot_image">	
												
												<!-- Image Zoom Icon -->
												<div class="item-overlay">
													<div class="zoom-image"><span class="ti-image"></span></div>
												</div>
												
											</a>
										</div>	<!-- End Hover Overlay -->	
									</div></div>
																			
								<!-- IMAGE #5-->
								
								
																	
								<!-- IMAGE #6-->
								
								
																			
								<!-- IMAGE #7-->
								
								
																			
								<!-- IMAGE #8-->
								
								

							<div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>	<!-- End screens carousel holder -->
							
								
							<!-- SCREENS CAROUSEL NAVIGATION -->
							<div class="customNavigation text-center">
								<a href="#" class="prev"></a>
								<a href="#" class="next"></a>
							</div>
							

						</div>	<!-- End col-md-12 -->	
					</div>	<!-- END SCREENS ROW -->	
					
						
				</div>		<!-- End container -->
			</section>
			
			<!-- CONTENT-1-6
			============================================= -->
			<section id="content-1-6" class="bg-lightgrey wide-50 content-section division bg-edit">
				<div class="container">	
					<div class="row">
					

						<!-- CONTENT TEXT -->
						<div class="col-sm-6 content-1-txt m-bottom-50 editContent">
						
							<!-- Title -->
							<h2 class="h2-huge"><?php echo $posts1001[0]['first_title_easy']?></h2>
							
							<!-- Text -->
							<p class="p-lg"><?php echo $posts1001[0]['sec_title_easy']?>
							</p>	
													
							<p class="p-lg"><?php echo $posts1001[0]['three_title_easy']?> 
							</p>
							
							<!-- Store Badges -->												
							<div class="stores-badge m-top-40">
											
								<!-- APPStore -->
								<a class="store" href="#">
									<img class="appstore-button" src="images/appstore.png" alt="appstore-logo">
								</a>
											
								<!-- Google Play -->
								<a class="store" href="#">
									<img class="googleplay-button" src="images/googleplay.png" alt="googleplay-logo">
								</a>
										
								<!-- Aamazon Market 
								<a class="store" href="#">
									<img class="amazon-button" src="images/amazon.png" alt="amazon-logo" >
								</a>  -->
																			
								<!-- Windows Market  
								<a class="store" href="#">
									<img class="windows-button" src="images/windows.png" alt="windows-logo" >
								</a> -->
										
							</div>	<!-- End Store Badges -->	
						
						</div>
						
						
						<!-- CONTENT IMAGE -->
						<div class="col-sm-6 content-1-img text-center m-bottom-50 editContent">
							<img class="img-responsive" src="images/content-img-4.png" alt="content-image">
						</div>
						
					
					</div>	  <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END CONTENT-1-6 -->
			
			
			
			<!-- TESTIMONIALS-4-2
			============================================= -->
			<div id="reviews-4-2" class="bg-scroll bg-black wide-90 reviews division bg-edit">
				<div class="container white-color">
					<div class="row">					
						<div class="col-md-12 text-center">	
					

							<!-- TESTIMONIALS CONTENT -->
							<div class="flexslider">											
								<ul class="slides">
																	
									<!-- TESTIMONIAL #1 -->
									<li class="" style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;">
										<div class="review-4 m-bottom-50 editContent">
										
											<!-- Testimonial Author Avatar -->
											<div class="testimonial-avatar text-center">
												<img src="images/member-1.jpg" alt="author_avatar">
											</div>

											<!-- Testimonial Text -->
											<div class="testimonial-txt m-bottom-10">
												<p>Etiam sapien sem accumsan at sagittis elementum congue augue egestas volutpat vulputate fermentum suscipit egestas 
												   lobortis magna suscipit egestas magna, mauris interdum lectus neque laoreet									   
												</p>												
											</div>
											
											<!-- Testimonial Author -->
											<p class="author theme-color">Jonathan Barnes</p>
											<span>Programmer</span>
											
											
																										
										</div>
									</li>
									
																													
									<!-- TESTIMONIAL #2 -->	
									<li style="width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;" class="flex-active-slide">
										<div class="review-4 m-bottom-50 editContent">
										
											<!-- Testimonial Author Avatar -->
											<div class="testimonial-avatar text-center">
												<img src="images/member-2.jpg" alt="author_avatar">
											</div>
	
											<!-- Testimonial Text -->
											<div class="testimonial-txt m-bottom-10">
												<p>Cursus risus laoreet auctor, pharetra massa varius dignissim sollicidin aliquam.Nulla dolor sapien, fringilla risus nec,
  												   luctus mauris donec diam euismod  sapien neque laoreet rhoncus tellus vulputate
												</p>												
											</div>
											
											<!-- Testimonial Author -->
											<p class="author theme-color">Hannah Harper</p>
											<span>Housewife</span>
											
										
		
										</div>
									</li>
									
																													
									<!-- TESTIMONIAL #3 -->
									<li style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;" class="">
										<div class="review-4 m-bottom-50 editContent">
										
											<!-- Testimonial Author Avatar -->
											<div class="testimonial-avatar text-center">
												<img src="images/member-3.jpg" alt="author_avatar">
											</div>										
	
											<!-- Testimonial Text -->
											<div class="testimonial-txt m-bottom-10">
												<p>Dapibus egestas lobortis magna phasellus nec euismod mauris rutrum turpis. Ratione voluptatem sequi nesciunt, 
												   neque neque laoreet rhoncus tellus vulputate porro dolorem ipsum, tempora posuere
												</p>													
											</div>

											<!-- Testimonial Author -->
											<p class="author theme-color">Matthew Anderson</p>
											<span>SEO Manager</span>
											
										
											
										</div>
									</li>
									
																													
									<!-- TESTIMONIAL #4 -->
									<li style="width: 100%; float: left; margin-right: -100%; position: relative; display: none;" class="">
										<div class="review-4 m-bottom-50 editContent">
										
											<!-- Testimonial Author Avatar -->
											<div class="testimonial-avatar text-center">
												<img src="images/member-4.jpg" alt="author_avatar">
											</div>

											<!-- Testimonial Text -->
											<div class="testimonial-txt m-bottom-10">
												<p>Vivamus a purus lacus tempor egestas lobortis magna volutpat. Etiam placerat rutrum aliquet. Aliquam a augue 
												   suscipit, bibendum neque laoreet rhoncus tellus vulputate luctus neque rhoncus ipsum
												</p>												
											</div>
																						
											<!-- Testimonial Author -->
											<p class="author theme-color">Charlotte Johnson</p>
											<span>Internet Surfer</span>
											
											
												
										</div>
									</li>
									
								</ul>												
							<ol class="flex-control-nav flex-control-paging"><li><a class="">1</a></li><li><a class="flex-active">2</a></li><li><a class="">3</a></li><li><a class="">4</a></li></ol></div>	<!-- END TESTIMONIALS CONTENT --> 
							
						
						</div>
					</div>	 <!-- End row -->
				</div>	  <!-- End container -->
			</div>	  <!-- END TESTIMONIALS-4-2 -->
			
			<style>

#qodx_footer {
    padding: 80px 0 70px;
    color: #999;
    background-color: #292929;
}
@media (min-width: 1200px)
.container {
    width: 1170px;
}
@media (min-width: 992px)
.container {
    width: 970px;
}
@media (min-width: 768px)
.container {
    width: 750px;
}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
@media (min-width: 1200px)
.container {
    width: 1170px;
}
@media (min-width: 992px)
.container {
    width: 970px;
}
@media (min-width: 768px)
.container {
    width: 750px;
}


#qodx_footer {
    padding: 80px 0 70px;
    color: #999;
    background-color: #292929;
}
#qodx_footer {
    padding: 80px 0 70px;
    color: #999;
    background-color: #292929;
}#qodx_footer .widget, #qodx_footer p, #qodx_footer .widget_nav_menu ul li a {
    color: ;
    font-size: 16px;
}
#qodx_footer .widget, #qodx_footer p, #qodx_footer .widget_nav_menu ul li a {
    color: ;
    font-size: 16px;
}
#qodx_footerWrapper h4.widgettitle {
    color: #fff;
    font-size: 20px;
    line-height: 28px;
    margin-bottom: 15px;
}
#qodx_footer .widget, #qodx_footer p, #qodx_footer .widget_nav_menu ul li a {
    color: ;
    font-size: 16px;
}
#qodx_footer p {
    color: #999;
}
#qodx_footer .widget, #qodx_footer p, #qodx_footer .widget_nav_menu ul li a {
    color: ;
    font-size: 16px;
}
#qodx_footer p {
    color: #999;
}
#qodx_footerBottom {
    color: #999;
    background: #222;
    padding: 20px 0 10px;
}
#qodx_footerBottom {
    background-color: ;
}
#qodx_footerWrapper .qodx_copyright {
    color: ;
    font-size: 16px;
}
#qodx_footerWrapper .qodx_copyright {
    color: ;
    font-size: 16px;
}
#qodx_footerBottom p {
    color: #999;
}
#qodx_footerBottom p {
    color: #999;
}
.footer-icons li, #menu-footer-menu li, #menu-footer-menu, .footer-news li, .footer-tags li {
    width: auto !important;
    display: inline-block !important;
    vertical-align: top;
    clear: none !important;
    padding: 0;
    margin: 0;
}
.widget li a:hover, #qodx_footerWrapper .widget li a:hover {
    color: #25c6ff;
}
.widget li a:hover, #qodx_footerWrapper .widget li a:hover {
    color: #25c6ff;
}
#qodx_footerWrapper .widget li a {
    color: #999;
}
#qodx_footerWrapper .widget li a {
    color: #999;
}
#qodx_footerWrapper .widget li a {
    color: #999;
}
#qodx_footerWrapper .widget li a {
    color: #999;
}
#menu-footer-menu a:hover {
    color: #25c6ff;
    text-decoration: underline;
}
#menu-footer-menu a:hover {
    color: #25c6ff;
    text-decoration: underline;
}
#menu-footer-menu a {
    font-size: 15px;
    color: #999;
    margin: 0 7px;
    display: block;
    text-decoration: underline;
}

                </style>
			
            <div id="qodx_footerWrapper" class="clearfix">
 <footer id="qodx_footer" class="clearfix">	<div class="container">
		<div class="row">
		<div class="qodx_footer_col col-sm-5 col-md-3"><section id="text-2" class="widget widget-block widget_text"><div class="widget-block-container"><div class="widget-block-title"><h4 class="widgettitle"><span>Inh. George Sood Fahrschule MENTOR</span></h4></div><div class="widget-block-content">			<div class="textwidget"><p>  We aim to bring out the very best in our students. It is one of our major aims to promote safe driving practices. our instructors are experts and trained in their niche. Mentor is the first internationale driving school that provides Theory and practical lessons in English, Hindi, Punjabi, Urdu apart from German.</p></div>
		</div></div></section></div>
		<div class="qodx_footer_col col-sm-5 col-md-3"><section id="text-3" class="widget widget-block widget_text"><div class="widget-block-container"><div class="widget-block-title"><h4 class="widgettitle"><span>OFFICE HOURS</span></h4></div><div class="widget-block-content">			<div class="textwidget"><p class="grey-color m-bottom-15"></p><p class="txt-semi-bold">
                 Mon - Fri 16.00 - 20:00 &amp; Sat 11:00 - 14:00</p>
<ul class="footer-contacts">
<li><i class="fa fa-map-marker" aria-hidden="true"></i>
<p>Kurfurstenplatz 34, 60486 Frankfurt am Main</p>
</li>
<li><i class="fa fa-phone" aria-hidden="true"></i>
<p>+49-69-770-69 -770</p>
</li>
<li><i class="fa fa-fax" aria-hidden="true"></i>
<p>+49-69-771-69 -771</p>
</li>
<li><i class="fa fa-envelope-o" aria-hidden="true"></i>
<p class="txt-semi-bold">info@fahrschule-mentor.de</p> 
</li>
</ul></div>
		</div></div></section></div>
		<div class="qodx_footer_col col-sm-2 col-md-2"><section id="text-4" class="widget widget-block widget_text"><div class="widget-block-container"><div class="widget-block-title"><h4 class="widgettitle"><span>Follow Us</span></h4></div><div class="widget-block-content">			<div class="textwidget"><ul class="footer-icons clearfix">									
<li><a class="foo-social" href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
<li><a class="foo-social" href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
<li><a class="foo-social" href="#"><i class="fa fa-behance" aria-hidden="true"></i> Behance</a></li>
<li><a class="foo-social" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>									
<li><a class="foo-social" href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>				
</ul></div>
		</div></div></section></div>
		<div class="qodx_footer_col col-sm-9 col-md-4"><section id="text-6" class="widget widget-block widget_text"><div class="widget-block-container"><div class="widget-block-title"><h4 class="widgettitle"><span>Quellenangaben fur die verwendeten Bilder und Grafiken</span></h4></div><div class="widget-block-content">			<div class="textwidget"><p><em>http://www.freepik.com&gt;Designed by yanalya</em></p>
<p><em>http://www.freepik.com&gt;Designed by Asierromero </em></p>
<p>&nbsp;</p>
</div>
		</div></div></section>
		</div> <!-- End row -->
	</div> <!-- End container -->
</div></footer> <!-- End footer -->
	<footer id="qodx_footerBottom" class="clearfix"><div class="container">		<div class="row">
			<div class="col-sm-6 col-md-6">
                <div class="copyright-block">
                    <div class="copyright-block-container">
                                                    <p class="qodx_copyright"> 2018 <a href="#" title="Fahrschule MENTOR">Fahrschule MENTOR</a>, all rights reserved.</p>
                                            </div> <!-- End copyright-block-container --> 
                </div> <!-- End copyright-block -->    
            </div> <!-- End col-md-6 --> 
            <div class="col-sm-6 col-md-6 text-right">                 
                <section id="nav_menu-2" class="widget copyright-block widget_nav_menu"><div class="copyright-block-container"><div class="menu-footer-menu-container"><ul id="menu-footer-menu" class="menu"><li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89"><a href="http://www.fahrschule-mentor.de/privacy-policy">Datenschutzerklarung</a></li>
<li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90"><a href="http://www.fahrschule-mentor.de/agb/">AGB</a></li>
</ul></div></div></section>   
            </div> <!-- End col-md-6 -->
                   
		</div> <!-- End row -->     
	</div> <!-- End container -->
</footer> <!-- End footerBottom -->
</div>
		
			
			
			
			
		</div>	<!-- END PAGE CONTENT -->
		
		
		
		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>	
		<script src="js/modernizr.custom.js" type="text/javascript"></script>
		<script src="js/jquery.easing.js" type="text/javascript"></script>
		
		<script src="js/jquery.stellar.min.js" type="text/javascript"></script>	
		<script src="js/jquery.scrollto.js" type="text/javascript"></script>
		<script defer="" src="js/typed.js" type="text/javascript"></script>
		<script defer="" src="js/jquery.appear.js" type="text/javascript"></script>			
		<script defer="" src="js/jquery.vide.min.js" type="text/javascript"></script>	
		<script defer="" src="js/jquery.countdown.min.js" type="text/javascript"></script>	
		
		<script src="js/jquery.easypiechart.min.js"></script>	
		<script src="js/owl.carousel.js" type="text/javascript"></script>
		<script src="js/jquery.mixitup.js" type="text/javascript"></script>
		<script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
		
		<script defer="" src="js/jquery.flexslider.js" type="text/javascript"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/contact_form.js" type="text/javascript"></script>	
		<script src="js/callback_form.js" type="text/javascript"></script>	
		<script src="js/register_form.js" type="text/javascript"></script>
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		
		<!-- Custom Script -->		
		<script src="js/custom.js" type="text/javascript"></script>	
		
						
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
						
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->	
		
		
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->


	
	
	

<a id="scrollUp" href="#top" title="" style="position: fixed; z-index: 2147483647; display: none;"></a></body></html>