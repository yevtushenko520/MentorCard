<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use yii\helpers\Url;
?>


<?php 


if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}

//ид вопроса practice
$posts = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="practice"')->queryAll();


$questions = [];

foreach($posts as $valumi):

  $questions[$g] = $valumi['question_id'];

        $g++;
       
endforeach;


$questions_bas = 1;

//количество  вопросов Basic & practice 100%
foreach($questions as $val):
 
  $posts2 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=8'.' AND qeust_id='.$val)->queryAll();
 
 
 

   $questions_bas = $questions_bas + $posts2[0]['COUNT(*)'];
   

  
endforeach;


//echo $questions_bas.'(100%)<br>';




$posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

if(Yii::$app->user->identity->role == 4){

$posts4 = Yii::$app->db->createCommand('SELECT id,categor FROM students WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

} else if(Yii::$app->user->identity->role == 3){

  $posts4 = Yii::$app->db->createCommand('SELECT id FROM school WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();

}else if(Yii::$app->user->identity->role == 2){

  $posts4 = Yii::$app->db->createCommand('SELECT id FROM admin WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

}else{

  $posts4 = Yii::$app->db->createCommand('SELECT * FROM user WHERE username="'.Yii::$app->user->identity->username.'"')->queryAll();

}




/*
  
$catimg = 1;

  $posts10013 = Yii::$app->db->createCommand('SELECT * FROM quest_soc WHERE soc_id='.$catimg)->queryAll();

  $questions_1 = [];
  
  foreach($posts10013 as $kola2):

    $posts100135 = Yii::$app->db->createCommand('SELECT * FROM tags')->queryAll();

    foreach($posts100135 as $kola23):

    $posts10014 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cat="'.$kola23['name'].'" AND question_id='.$kola2['quest_id'])->queryAll();



    if($posts10014!=null){

      echo  $kola2['quest_id'];

      $posts121 = Yii::$app->db->createCommand('INSERT INTO count_soc (soc_id,count,cat) VALUES ('.$catimg.'
  , '.$kola2['quest_id'].',"'.$kola23['name'].'")')->execute();

    }

  endforeach;
endforeach;*/
/*
  $posts121 = Yii::$app->db->createCommand('INSERT INTO count_soc (soc_id,count,cat) VALUES (4
  , '.count($questions_1).',"'.$kola['name'].'")')->execute();*/





$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write WHERE student_id='.$posts4[0]['id'])->queryAll();




$set = $_COOKIE["govno"];

if($set!=null){

  //  язык

  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}




$posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$posts4[0]['id'])->execute();

//узнаем сколько человек ответил по practice
$posts5 = Yii::$app->db->createCommand('SELECT quest_id FROM true_answer  WHERE user_id='.$posts4[0]['id'].' AND cande_quest="practice"')->queryAll();

$questions_practice =[];

foreach($posts5 as $vald):

  $questions_practice[$g] = $vald['quest_id'];

  $g++;

  //print_r($questions_practice);

endforeach;


$questions_pr =0;
//количество пройденный ответов
foreach($questions_practice as $valg):
 
  $posts9 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=8'.' AND qeust_id='.$valg)->queryAll();
 
  $questions_pr = $questions_pr +$posts9[0]['COUNT(*)'];
 // print_r($questions_pr.'(выполнено)<br>');


endforeach;


//находим процент прохождения
$procent = 0;

$procent = 100*$questions_pr/$questions_bas;

//print_r($procent.'(%, пройдено)<br>');


$posts10 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="mock_test"')->queryAll();
 

$questions_mock = 0;


  $questions_mock = $questions_mock+$posts10[0]['COUNT(*)'];


//print_r($questions_mock.'(кол. mock_test)<br>');

$questions_mock_end = 0;

$posts11 = Yii::$app->db->createCommand('SELECT quest_id FROM true_answer  WHERE user_id='.$posts4[0]['id'].' AND cande_quest="mock_test"')->queryAll();



$questions_m = [];

if($posts11 ==null){
  $questions_mock_end = 0;
}else{

  foreach($posts11 as $gege):
  $questions_m[$g] = $gege['quest_id'];

  $g++;

  endforeach;
 // print_r($questions_m);
}


foreach($questions_m as $geg):

  $posts12 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=8'.' AND qeust_id='.$geg)->queryAll();

  $questions_mock_end = $questions_mock_end+$posts12[0]['COUNT(*)'];

endforeach;

$questions_mock_end_proc = 0;

//$questions_mock_end_proc = 100*$questions_mock_end/$questions_mock;




//print_r($questions_mock_end.'(кол. mock_test пройденно)<br>');
//print_r(round($questions_mock_end_proc).'(%,mock_test пройденно)<br>');


//questions table
$posts13 = Yii::$app->db->createCommand('SELECT id FROM quesions')->queryAll();

$questions_table_ids;

foreach ($posts13 as $kok):

  $questions_table_ids[$g] = $kok['id'];

  $g++;

endforeach;

//questions table 100%
$posts14 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM quesions')->queryAll();


$questions_table_kol;

$questions_table_kol = $questions_table_kol+$posts14[0]['COUNT(*)'];


//print_r($questions_table_kol.'(кол всех вопросов)<br>');

//отсеим id true ответов
$true_quest_table;
foreach ($questions_table_ids as $kok):

$posts15 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer WHERE quest_id='.$kok)->queryAll();

$true_quest_table = $true_quest_table+$posts15[0]['COUNT(*)'];


endforeach;

//print_r($true_quest_table.'(кол пройденно всех вопросов)<br>');


//отсеим id false ответов
$false_quest_table;
foreach ($questions_table_ids as $kok1):

$posts16 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer WHERE quest_id='.$kok1)->queryAll();

$false_quest_table = $false_quest_table+$posts15[0]['COUNT(*)'];


endforeach;

//print_r($false_quest_table.'(кол не правильно ответов  всех вопросов)<br>');

//все вопросы которые серые
$all_question_table;

$all_question_table = $questions_table_kol - $true_quest_table;

//print_r($all_question_table.'(кол готовых к ответу вопросов)<br>');

//процент готовых вопросов
$proc_all_quest_table;

$proc_all_quest_table= 100*$all_question_table/$questions_table_kol;

//print_r(round($proc_all_quest_table).'(%, готовых к ответу вопросов)<br>');



$posts33 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

//print_r($posts33[0]['username']);

$posts34 = Yii::$app->db->createCommand('SELECT res_id FROM students  WHERE username="'.$posts33[0]['username'].'"')->queryAll();

//print_r($posts34[0]['res_id']);

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$posts4[0]['id'])->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$posts4[0]['id'])->execute();

$posts349 = Yii::$app->db->createCommand('SELECT date FROM practice_date_cache  WHERE user_id='.$posts4[0]['id'])->queryAll();


$posts2228 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice"')->queryAll();

$posts229 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer  WHERE cande_quest="practice" AND user_id='.$posts4[0]['id'])->queryAll();


$posts218 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="Basic Material"')->queryAll();


$posts219 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="'.$posts4[0]['categor'].'"')->queryAll();

$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$posts4[0]['id'])->queryAll();

$pop_up = 0;

foreach($posts09 as $role):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();

  $posts219 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $pop_up =  $pop_up+$posts219[0]['COUNT(*)'];

endforeach;



$all_cat_mock = $posts218[0]['COUNT(*)'] + $pop_up;


if($posts2228[0]['COUNT(*)']!=0 && $posts229[0]['COUNT(*)']!=0){



  $proc_practice = $posts229[0]['COUNT(*)']*100/$posts2228[0]['COUNT(*)'];

}else{

  $proc_practice =0;

}


$posts223 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer WHERE cande_quest="mock_test" AND user_id='.$posts4[0]['id'])->queryAll();

if($all_cat_mock!=0 && $posts223[0]['COUNT(*)']!=0){
$proc_mock_end = $posts223[0]['COUNT(*)']*100/$all_cat_mock;
}else{
  $proc_mock_end =0;
}


//echo \Yii::getAlias('@webroot');


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
  preload.style.display = 'none';
  setTimeout(function(){
      preload.style.display = 'none';
   },600);
})

</script>

<div class="row">
        <div class="col-xs-6">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $posts1002[0]['prac']?></span>
              <span class="info-box-number"><?php echo round($proc_practice)?>% <?php echo $posts1002[0]['made']?></span>

              <div class="progress">
              <?php echo '<div class="progress-bar" style="width:'.round($proc_practice).'%"></div>'?>
                
              </div>
                  <span class="progress-description">
                  <?php echo $posts1002[0]['last_on']?> <?php echo $posts349[0]['date']?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $posts1002[0]['mock']?></span>
              <span class="info-box-number"><?php echo $posts223[0]['COUNT(*)']  ?> <?php echo $posts1002[0]['of']?> <?php echo $all_cat_mock?> <?php echo $posts1002[0]['done']?></span>

              <div class="progress">
              <?php echo '<div class="progress-bar" style="width:'.round($proc_mock_end).'%"></div>'?>
              </div>
                  <span class="progress-description">
                  <?php echo $posts1002[0]['not_allowed']?>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        </div>

    
    

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $posts1002[0]['school_info']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> <?php echo $posts1002[0]['education']?></strong>


<?php 

if(Yii::$app->user->identity->role == 4){
if($posts34[0]['res_id']!=0){

  $posts35 = Yii::$app->db->createCommand('SELECT * FROM school WHERE id='.$posts34[0]['res_id'])->queryAll();

  $name_school = $posts35[0]['school_name'];
  $city_school = $posts35[0]['city'];
  $post_code_school =  $posts35[0]['post_code'];
  $street_school = $posts35[0]['street'];
  $email_school =  $posts35[0]['email'];

  $user_name1 = $posts35[0]['first_name'];
  $user_name2 = $posts35[0]['last_name'];

}else{
  
  $name_school = $posts1002[0]['free_user'];
  $city_school = $posts1002[0]['free_user'];
  $post_code_school =  $posts1002[0]['free_user'];
  $street_school = $posts1002[0]['free_user'];
  $email_school =  $posts1002[0]['free_user'];

}

}else if(Yii::$app->user->identity->role == 3){




  $posts35 = Yii::$app->db->createCommand('SELECT * FROM school WHERE school_name="'.Yii::$app->user->identity->username.'"')->queryAll();

  $name_school = $posts35[0]['school_name'];
  $city_school = $posts35[0]['city'];
  $post_code_school =  $posts35[0]['post_code'];
  $street_school = $posts35[0]['street'];
  $email_school =  $posts35[0]['email'];
  $user_name1 = $posts35[0]['first_name'];
  $user_name2 = $posts35[0]['last_name'];


}else{

  if($posts34[0]['res_id']!=0){

    $posts35 = Yii::$app->db->createCommand('SELECT * FROM school WHERE id='.$posts34[0]['res_id'])->queryAll();
  
    $name_school = $posts35[0]['school_name'];
    $city_school = $posts35[0]['city'];
    $post_code_school =  $posts35[0]['post_code'];
    $street_school = $posts35[0]['street'];
    $email_school =  $posts35[0]['email'];

    $user_name1 = $posts35[0]['first_name'];
    $user_name2 = $posts35[0]['last_name'];
  
  }else{
    
    $name_school = $posts1002[0]['free_user'];
    $city_school = $posts1002[0]['free_user'];
    $post_code_school =  $posts1002[0]['free_user'];
    $street_school = $posts1002[0]['free_user'];
    $email_school =  $posts1002[0]['free_user'];
  
  }

}

?>
              <p class="text-muted">
                <?php echo $name_school." - ".$user_name1." ".$user_name2?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> <?php echo $posts1002[0]['location']?></strong>

              <p class="text-muted"><?php echo $city_school?><br><?php echo $post_code_school?>, <?php echo $street_school?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> <?php echo $posts1002[0]['school_skill']?></strong>
              
              <p>
                <span class="label label-warning" style="background-color: #222d32 !important;">Basic</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">B-Cars</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">A-Motorcycle</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">C-Trucks</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">CE Trucks with Trailer</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">Mofa</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">DE Bus with trailers</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">D- Bus</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">A,A1,A2</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">T,L</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">C1,D1</span>
                <span class="label label-warning" style="background-color: #222d32 !important;">C1E,D1E</span>
              </p>

              <hr>

              <strong><i class="fa fa-envelope-o"></i> <?php echo $posts1002[0]['email']?></strong>

              <p> <?php echo $email_school?></p>
            </div>
            <!-- /.box-body -->
          </div>
   