<?php
use marekpetras\yii2ajaxboxwidget\Box;
use wokster\ltewidgets\BoxWidget;
use yii\helpers\Html;
use app\models\Langs;
use dosamigos\chartjs\ChartJs;
use antishov\Morris;
use yii\web\JsExpression;

if(Yii::$app->user->identity->username ==null){

  header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Flogin");
  die();

}else{

}


?>


<?php 



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
 
  $posts2228 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="practice"')->queryAll();
 

   $questions_bas = $questions_bas + $posts2228[0]['COUNT(*)'];
   

  
endforeach;








//echo round($proc_practice).' (19%)<br>';

$posts3 = Yii::$app->db->createCommand('SELECT username FROM user  WHERE id='.Yii::$app->user->identity->id)->queryAll();

if(Yii::$app->user->identity->role == 4){

$posts4 = Yii::$app->db->createCommand('SELECT id,categor FROM students WHERE username="'.$posts3[0]['username'].'"')->queryAll();

} else if(Yii::$app->user->identity->role == 3){

  $posts4 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$posts3[0]['username'].'"')->queryAll();

}else if(Yii::$app->user->identity->role == 2){

  $posts4 = Yii::$app->db->createCommand('SELECT id FROM admin WHERE username="'.$posts3[0]['username'].'"')->queryAll();

}else{


}

$posts1001 = Yii::$app->db->createCommand('SELECT * FROM stud_langs_write  WHERE student_id='.$posts4[0]['id'])->queryAll();


$set = $_COOKIE["govno"];

if($set!=null){

  //  язык
  $posts1002 = Yii::$app->db->createCommand('SELECT * FROM langs_backend  WHERE lang_id='.$set)->queryAll();
}else{
    
    header("Location: http://www.mentorcard.de/backend/web/index.php?r=site%2Fchoose_lang");
die();
   

}



$posts229 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer  WHERE cande_quest="practice" AND user_id='.$posts4[0]['id'])->queryAll();





if($posts2228[0]['COUNT(*)']!=0 && $posts229[0]['COUNT(*)']!=0){



  $proc_practice = $posts229[0]['COUNT(*)']*100/$posts2228[0]['COUNT(*)'];

}else{

  $proc_practice =0;

}

//узнаем сколько человек ответил по practice
$posts5 = Yii::$app->db->createCommand('SELECT quest_id FROM true_answer  WHERE user_id='.$posts4[0]['id'].' AND cande_quest="practice"')->queryAll();

$questions_practice =[];

foreach($posts5 as $vald):

  $questions_practice[$g] = $vald['quest_id'];

  $g++;

  //print_r($questions_practice);

endforeach;


$questions_pr = 0;
//количество пройденный ответов
foreach($questions_practice as $valg):
 
  $posts9 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=8'.' AND qeust_id='.$valg)->queryAll();
 
  $questions_pr = $questions_pr +$posts9[0]['COUNT(*)'];
  //print_r($questions_pr.'(выполнено)<br>');


endforeach;


//находим процент прохождения
$procent = 0;

$procent = 100*$questions_pr/$questions_bas;

//print_r($procent.'(%, пройдено)<br>');


$posts10 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question  WHERE cande="mock_test"')->queryAll();
 

$questions_mock;


  $questions_mock = $questions_mock+$posts10[0]['COUNT(*)'];



//print_r($questions_mock.'(кол. mock_test)<br>');


$questions_mock_end;

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

  $posts12 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=2'.' AND qeust_id='.$geg)->queryAll();

  $questions_mock_end = $questions_mock_end+$posts12[0]['COUNT(*)'];

endforeach;

$questions_mock_end_proc;

$questions_mock_end_proc = 100*$questions_mock_end/$questions_mock;




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




//кол не прав вопросов

$questions_mock_false;

$posts20 = Yii::$app->db->createCommand('SELECT quest_id FROM false_answer  WHERE user_id='.$posts4[0]['id'].' AND cande_quest="mock_test"')->queryAll();


$questions_mg = [];

if($posts20 ==null){
  $questions_mock_false = 0;
}else{

  foreach($posts20 as $gege):
  $questions_mg[$g] = $gege['quest_id'];

  $g++;

  endforeach;
  //print_r($questions_mg);
}


foreach($questions_mg as $ge):

  $posts21 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags  WHERE tags_id=2'.' AND qeust_id='.$ge)->queryAll();

  $questions_mock_false = $questions_mock_false+$posts21[0]['COUNT(*)'];

endforeach;

//print_r($questions_mock_false.'(не правильно ответов mock_test)<br>');

//кол вопросов по мок тесту серых
$all_mock_test_gray;

$all_mock_test_gray = $questions_mock - $questions_mock_end;

//print_r($all_mock_test_gray.'(кол вопросов готовых к mock_test)<br>');

$posts17 = Yii::$app->db->createCommand('SELECT username FROM user WHERE id='.Yii::$app->user->identity->id)->queryAll();





$id_students;

foreach ($posts17 as $kok228):


  if(Yii::$app->user->identity->role == 4){

  $posts18 = Yii::$app->db->createCommand('SELECT categor,id FROM students WHERE username="'.$kok228['username'].'"')->queryAll();



$id_students = $posts18[0]['id'];

  }else if(Yii::$app->user->identity->role == 3){

    $posts18 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$kok228['username'].'"')->queryAll();


    
    
    $id_students = $posts18[0]['id'];

  }else if(Yii::$app->user->identity->role == 2){

    $posts18 = Yii::$app->db->createCommand('SELECT id FROM admin WHERE username="'.$kok228['username'].'"')->queryAll();


    
    
    $id_students = $posts18[0]['id'];

  }

endforeach;



//print_r($posts19[0]['id']." (ID Categor)<br>");

$count_false_answer = 0;


$num_vorp = 0;


$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$id_students)->queryAll();

foreach($posts09 as $role):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


  $posts20 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM qeust_tags WHERE tags_id='.$posts02[0]['id'])->queryAll();
  
  $num_vorp = $num_vorp+$posts20[0]['COUNT(*)'];

endforeach;

//print_r($num_vorp.' (кол. вопросов по категории)<br><br>');


$posts21 = Yii::$app->db->createCommand('SELECT quest_id FROM true_answer WHERE user_id='.$id_students)->queryAll();




foreach ($posts21 as $kok227):


  

//print_r($kok227['quest_id']." (ID правильного ответа)<br>");



$posts23 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags WHERE qeust_id='.$kok227['quest_id'])->queryAll();


$count_true_answer;

foreach ($posts23 as $kok223):


  if($kok223['tags_id']==$id_quest){

//print_r($kok223['tags_id']." (ID категории)<br>");


$count_true_answe++;




  }else{

  }


endforeach;

endforeach;


//print_r($count_true_answer." (кол правильных ответов по категории)<br>");

$posts24 = Yii::$app->db->createCommand('SELECT quest_id FROM false_answer WHERE user_id='.$id_students)->queryAll();



foreach ($posts24 as $kok221):



  $posts25 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags WHERE qeust_id='.$kok221['quest_id'])->queryAll();

 


  foreach ($posts25 as $kok222):


    if($kok223['tags_id']==$id_quest){
  
  //print_r($kok223['tags_id']." (ID категории)<br>");
  
  
  $count_false_answer++;
  
  

  
    }else{
  
    }
  
  
  endforeach;

endforeach;


$count_true_again_answer = 0;
//print_r($count_false_answer." (кол неправильных ответов по категории)<br>");


$posts26 = Yii::$app->db->createCommand('SELECT quest_id FROM again_true WHERE user_id='.$id_students)->queryAll();


foreach ($posts26 as $kok211):


  $posts27 = Yii::$app->db->createCommand('SELECT tags_id FROM qeust_tags WHERE qeust_id='.$kok211['quest_id'])->queryAll();

 


  foreach ($posts27 as $kok122):


    if($kok122['tags_id']==$id_quest){
  
  //print_r($kok223['tags_id']." (ID категории)<br>");
  
  
  $count_true_again_answer++;
  
  

  
    }else{
  
    }
  
  
  endforeach;

endforeach;


//print_r($count_true_again_answer." (кол заного ответов по категории)<br>");



$all_g = $num_vorp - ($count_true_answe +$count_true_again_answer+$count_false_answe);


//$proc_true = 100*$count_true_answe/$num_vorp;
//$proc_false = 100*$count_false_answe/$num_vorp;

$proc_again = 0;

//$proc_all = 100*$all_g/$num_vorp;


/*
print_r(
  $proc_true
."% правильно ответил <br>");


print_r(
  $proc_false
."% не правильно ответил <br>");


print_r(
  $proc_again
."% заного ответил <br>");

print_r(
  $proc_all
."% не ответил еще <br>");*/




$posts30 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=01 AND id_user='.$id_students)->queryAll();

if($posts30[0]['proc']==null){
  $count_date_1 = 0;
}else{
  $count_date_1 = $posts30[0]['proc'];
}


$posts31 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=02 AND id_user='.$id_students)->queryAll();

if($posts31[0]['proc']==null){
  $count_date_2 = 0;
}else{
  $count_date_2 = $posts31[0]['proc'];
}


$posts32 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=03 AND id_user='.$id_students)->queryAll();

if($posts32[0]['proc']==null){
  $count_date_3 = 0;
}else{
  $count_date_3 = $posts32[0]['proc'];
}


$posts33 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=04 AND id_user='.$id_students)->queryAll();

if($posts33[0]['proc']==null){
  $count_date_4 = 0;
}else{
  $count_date_4 = $posts33[0]['proc'];
}


$posts35 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=05 AND id_user='.$id_students)->queryAll();

if($posts35[0]['proc']==null){
  $count_date_5 = 0;
}else{
  $count_date_5 = $posts35[0]['proc'];
}

$posts36 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=06 AND id_user='.$id_students)->queryAll();

if($posts36[0]['proc']==null){
  $count_date_6 = 0;
}else{
  $count_date_6 = $posts36[0]['proc'];
}


$posts37 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=07 AND id_user='.$id_students)->queryAll();

if($posts37[0]['proc']==null){
  $count_date_7 = 0;
}else{
  $count_date_7 = $posts37[0]['proc'];
}

$posts38 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=08 AND id_user='.$id_students)->queryAll();

if($posts38[0]['proc']==null){
  $count_date_8 = 0;
}else{
  $count_date_8 = $posts38[0]['proc'];
}

$posts39 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=09 AND id_user='.$id_students)->queryAll();

if($posts39[0]['proc']==null){
  $count_date_9 = 0;
}else{
  $count_date_9 = $posts39[0]['proc'];
}

$posts40 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=10 AND id_user='.$id_students)->queryAll();

if($posts40[0]['proc']==null){
  $count_date_10 = 0;
}else{
  $count_date_10 = $posts40[0]['proc'];
}


$posts41 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=11 AND id_user='.$id_students)->queryAll();

if($posts41[0]['proc']==null){
  $count_date_11 = 0;
}else{
  $count_date_11 = $posts41[0]['proc'];
}


$posts42 = Yii::$app->db->createCommand('SELECT proc FROM date_answer WHERE date=12 AND id_user='.$id_students)->queryAll();

if($posts42[0]['proc']==null){
  $count_date_12 = 0;
}else{
  $count_date_12 = $posts42[0]['proc'];
}



$posts43 = Yii::$app->db->createCommand('SELECT max(id) FROM date_answer')->queryAll();


$posts43 = Yii::$app->db->createCommand('SELECT date FROM date_answer WHERE id='.$posts43[0]['max(id)'])->queryAll();

$all_proc_new = $count_true_answer + $count_true_again_answer;


//print_r($posts43[0]['date'].'<br>');


$posts431 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$id_students)->queryAll();

$quest = [];

foreach($posts431 as $kola):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();

  

  $posts03 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cat="'.$posts02[0]['name'].'"')->queryAll();


  foreach($posts03 as $fof):

    $posts05 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE user_id='.$id_students.' AND quest_id='.$fof['question_id'])->queryAll();

    if($posts05!=null){

      $quest[$g] = $fof['question_id'];

      $g++;

    }else{

    }

  endforeach;



endforeach;


$posts034 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cat="'.$posts02[0]['name'].'"')->queryAll();

$count_gg = count($quest);

$new_p = $count_gg*100/$posts034[0]['COUNT(*)'];



if(date('m')==$posts43[0]['date']){

}else if(date('m')>$posts43[0]['date']){

 

  $posts44 = Yii::$app->db->createCommand('INSERT INTO date_answer (date,id_user,proc) VALUES ("'.date('m').'", '.$id_students.','.round($new_p).')')->execute();

}else if(date('m')<$posts43[0]['date']){

  $posts44 = Yii::$app->db->createCommand('INSERT INTO date_answer (date,id_user,proc) VALUES ("'.date('m').'", '.$id_students.','.round($new_p).')')->execute();

}


$posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$id_students)->execute();

$posts121 = Yii::$app->db->createCommand('DELETE FROM question_table_cache_but WHERE user_id='.$id_students)->execute();

$posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$id_students)->execute();


$posts349 = Yii::$app->db->createCommand('SELECT date FROM practice_date_cache  WHERE user_id='.$id_students)->queryAll();



$posts218 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="Basic Material"')->queryAll();


//$posts219 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="'.$posts4[0]['categor'].'"')->queryAll();

$posts09 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$id_students)->queryAll();

$pop_up = 0;

foreach($posts09 as $role):

  $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();

  $posts219 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM cande_question WHERE cande="mock_test" AND cat="'.$posts02[0]['name'].'"')->queryAll();

  $pop_up =  $pop_up+$posts219[0]['COUNT(*)'];

endforeach;



$all_cat_mock = $posts218[0]['COUNT(*)'] + $pop_up;




$posts220 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM false_answer WHERE cande_quest="mock_test" AND user_id='.$id_students)->queryAll();



$count_true_mock=0;

$posts221 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE cande_quest="mock_test" AND user_id='.$id_students)->queryAll();

foreach ($posts221 as $gnida):

  $posts222 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gnida['quest_id'])->queryAll();

if($posts222!=null){

if($posts222[0]['cande_quest']=='mock_test' ){


  foreach($posts09 as $role):

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


    if($posts222[0]['cat']==$posts02[0]['name']){


      $count_true_mock++;

    }

  endforeach;

  

}


}

endforeach;




$posts223 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM true_answer WHERE cande_quest="mock_test" AND user_id='.$id_students)->queryAll();

$proc_mock_end = $posts223[0]['COUNT(*)']*100/$all_cat_mock;


$proc_cat_9_true = $count_true_mock*100/$all_cat_mock;


$count_false_mock=0;


$posts224 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE cande_quest="mock_test" AND user_id='.$id_students)->queryAll();

foreach ($posts224 as $gnida):

  $posts225 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gnida['quest_id'])->queryAll();

  

  if($posts225!=null){

    if($posts225[0]['cande']=='mock_test' ){

      

      foreach($posts09 as $role):

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$role['tag_id'])->queryAll();


    if( $posts225[0]['cat']==$posts02[0]['name']){

      
      $count_false_mock++;

    }

  endforeach;
     
    
    }


  }

endforeach;


$proc_false_mock_9 =  $count_false_mock*100/$all_cat_mock;


$proc_all_quest_mock = ($num_vorp-$count_true_mock-$count_true_again_answer-$count_false_mock)*100/$num_vorp;




?>






  <script>
            $(function($) {
                $(".knob").knob({
    
    
});
            });
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
        <span class="info-box-number"><?php echo $posts223[0]['COUNT(*)'] ?> of <?php echo $all_cat_mock?> <?php echo $posts1002[0]['done']?></span>

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

   
      <?php BoxWidget::begin([
        'title' => $posts1002[0]['study_prog'], //string
        'border' => true,       //boolean
        'color' => 'primary',    //bootstrap color name 'success', 'danger' еtс.
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


 <div class="row">
 <div class="col-xs-6 col-md-3 text-center">
                  <div style="display:inline;width:90px;height:90px;">
                  
                  <?php //round($questions_mock_end_proc) ?>

                  <?php echo '<input type="text" class="knob" value="'.round($questions_mock_end_proc).'"  
                  data-width="120" data-height="120" 
                  data-fgcolor="#C6300F" data-readonly="true" 
                  readonly="readonly"
                 
                   style="width: 49px; 
                  height: 30px; position: absolute; vertical-align:
                   middle; margin-top: 30px; margin-left: -69px; 
                   border: 0px; background: none; font-style: 
                   normal; font-variant: normal; font-weight: bold; 
                   font-stretch: normal; font-size: 18px; line-height:
                    normal; font-family: Arial; text-align: center; 
                    color: rgb(60, 141, 188); padding: 0px; -webkit-appearance: none;">' ?>
                  </div>

                  <div class="knob-label" style="text-align:left;margin-top:10px;"><?php echo $posts1002[0]['comp_all_quest1']?><br>
                  <?php echo $posts1002[0]['comp_all_quest2']?>
                  </div>
                </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php echo $posts1002[0]['correct_answer']?></span>
              <span class="info-box-number"><?php echo $questions_mock_end?> <?php echo $posts1002[0]['questions']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-times"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><?php echo $posts1002[0]['wrong_answer']?></span>
              <span class="info-box-number"><?php echo $posts220[0]['COUNT(*)']?> <?php echo $posts1002[0]['questions']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-far fa-question-circle"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><?php echo $posts1002[0]['no_answer_quest']?></span>
              <span class="info-box-number"><?php echo $all_cat_mock-$posts220[0]['COUNT(*)']; ?> <?php echo $posts1002[0]['questions']?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
   <?php BoxWidget::end();?>

    <?php BoxWidget::begin([
        'title' => $posts1002[0]['quest_status'], //string
        'border' => true,       //boolean
        'color' => 'primary',    //bootstrap color name 'success', 'danger' еtс.
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

    <div class="row">
 
  <canvas id="myChart" ></canvas>


  <?php 
  
  $proc_true_new = $questions_mock_end*100/$all_cat_mock;

  $proc_false_new = $posts220[0]['COUNT(*)']*100/$all_cat_mock;

  $proc_all_quest_mock = 100- ($proc_true_new+$proc_false_new);
  
  ?>
  
  
</div>
     
        <script>
      var data = {
  labels: [
    "<?php echo round($proc_true_new,2)?>% <?php echo $posts1002[0]['quest_ready']?> <?php echo $questions_mock_end?> <?php echo $posts1002[0]['out_of']?> <?php echo $all_cat_mock?> <?php echo $posts1002[0]['questions']?>",
    "<?php echo round($proc_again,2)?>% <?php echo $posts1002[0]['quest_right']?> <?php echo $count_true_again_answer?> <?php echo $posts1002[0]['out_of']?> <?php echo $all_cat_mock?>",
    "<?php echo round($proc_false_new,2)?>% <?php echo $posts1002[0]['quest_wrong']?> <?php echo $posts220[0]['COUNT(*)']?> <?php echo $posts1002[0]['out_of']?> <?php echo $all_cat_mock?>",
    "<?php echo round($proc_all_quest_mock,2)?>% <?php echo $posts1002[0]['quest_un']?> <?php echo $all_cat_mock - ($questions_mock_end +$count_true_again_answer+ $posts220[0]['COUNT(*)'])?> <?php echo $posts1002[0]['out_of']?> <?php echo $all_cat_mock?>"
  ],
  datasets: [
    {
      data: [<?php echo round($proc_true_new,2)?>, <?php echo round($proc_again)?>,<?php echo round($proc_false_new,2)?>,<?php echo round($proc_all_quest_mock)?>],
      backgroundColor: [
        "#008000",
        "#FFFF00",
        "#FF0000",
        "#DCDCDC",
      ],
      hoverBackgroundColor: [
        "#008000",
        "#FFFF00",
        "#FF0000",
        "#DCDCDC",
      ]
    }]
};

var promisedDeliveryChart = new Chart(document.getElementById('myChart'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
    
        maintainAspectRatio: false,
    legend: {
      position: 'right'
    }
    
  }
});

Chart.pluginService.register({
  beforeDraw: function(chart) {
    var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

    ctx.restore();
    var fontSize = 3/2;
    ctx.font = fontSize + "em sans-serif";
    


    var text = '<?php echo $all_cat_mock." ".$posts1002[0]['ask']?>',
        textX = Math.round((width - ctx.measureText(text).width) /3),
        textY = height /2;

    ctx.fillText(text, textX, textY);
    ctx.save();
  }
});
</script>
    </script>
    <?php BoxWidget::end();?>
   <?php BoxWidget::begin([
        'title' => $posts1002[0]['quest_status'], //string
        'border' => true,       //boolean
        'color' => 'primary',    //bootstrap color name 'success', 'danger' еtс.
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
    
  <?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 50,
        'width' => 100
    ],
    'data' => [
        'labels' => [$posts1002[0]['january'], $posts1002[0]['february'], $posts1002[0]['march'], $posts1002[0]['april'], $posts1002[0]['may'], $posts1002[0]['june'], $posts1002[0]['july'],
        $posts1002[0]['august'],$posts1002[0]['september'],$posts1002[0]['october'],$posts1002[0]['november'],$posts1002[0]['december']],

        'datasets' => [
            [
              
                'label' => $posts1002[0]['development'],
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "#3c8dbc",
                'pointBackgroundColor' => "#3c8dbc",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [ $count_date_1,  $count_date_2,  $count_date_3,  $count_date_4,  $count_date_5,  $count_date_6,  $count_date_7, $count_date_8, $count_date_9, $count_date_10, $count_date_11, $count_date_12]
            ],
            
        ]
    ]
]);
?>


     
    <?php BoxWidget::end();?>

  
