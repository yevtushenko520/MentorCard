<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignUpForm;
use backend\models\Students;
use common\models\User;
use common\components\paypal;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $user_role_person;

    public $gick_movie;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','payment','signup',
                        'dashboard_stud','statistics_stud','info_sys','chapters','mock_test',
                    'question_table','practice','conc','mock_end','choose_lang','create_per','res_stude_create','forgot_password1','ban_list','start','products',
                    'list_products',
                'checkout'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
              ],
        ];
    }
   

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

       
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  
  $posts100122 = Yii::$app->db->createCommand('SELECT * FROM log_out  WHERE ip="'.$ip.'" AND username="'.Yii::$app->user->identity->username.'"')->queryAll();
  
  if($posts100122!=null){
  
  $posts1375 = Yii::$app->db->createCommand('DELETE FROM  log_out WHERE username="'.Yii::$app->user->identity->username.'" AND ip="'.$ip.'"' )->execute();
  
    Yii::$app->user->logout();

   
    return $this->goHome();
  
  }else{
  
  
  }

        if(Yii::$app->user->identity->role != 1){
       // $user_role_person = User::findBysql('SELECT role FROM user WHERE id=3' )->all();
        return $this->render('dashboard_stud');
        }else{
            return $this->render('index');
        }
    }

    
    public function actionProducts(){


        

        return $this->render('products');

    }



    public function actionList_products(){


        

        return $this->render('list_products');

    }


    

   // pizda
    public function actionConc(){

        if(Yii::$app->request->isAjax){

            if($_POST['coc']==1){

            $user_id = $_POST['user_id'];
            $gick_movie = $_POST['id_quest'];

            $posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE user_id='.$user_id)->queryAll();

            if($posts522 !=null){

                $posts121 = Yii::$app->db->createCommand('UPDATE cache_end_but_practice SET quest_id='.$gick_movie.' WHERE user_id='.$user_id)->execute();

                $rigth_answer = 'yes';
                       return   $rigth_answer;

            }else{

                $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_practice (quest_id,user_id) VALUES ('.$gick_movie.'
                , '.$user_id.')')->execute();

                $rigth_answer = 'yes';
                       return   $rigth_answer;


            }

        }else if($_POST['coc']==2){

            $user_id = $_POST['user_id'];
            $gick_movie = $_POST['id_quest'];


        }

        }

        return $this->render('conc');

    }

    public function actionMock_end(){

        if(Yii::$app->request->isAjax){

            if($_POST['coc']==1){

            $user_id = $_POST['user_id'];
            $gick_movie = $_POST['id_quest'];

            $posts522 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_mock_test WHERE user_id='.$user_id)->queryAll();

            if($posts522 !=null){

                $posts121 = Yii::$app->db->createCommand('UPDATE cache_end_but_mock_test SET quest_id='.$gick_movie.' WHERE user_id='.$user_id)->execute();

                $rigth_answer = 'yes';
                       return   $rigth_answer;

            }else{

                $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_end_but_mock_test (quest_id,user_id) VALUES ('.$gick_movie.'
                , '.$user_id.')')->execute();

                $rigth_answer = 'yes';
                       return   $rigth_answer;


            }

        }else if($_POST['coc']==2){
            
            $user_id = $_POST['user_id'];
            $gick_movie = $_POST['id_quest'];


        }else if($_POST['coc']==3){

            $price = $_POST['price'];

            $posts121 = Yii::$app->db->createCommand('UPDATE price SET price='.$price.' WHERE id=1')->execute();

            $rigth_answer = 'yes';
                   return   $rigth_answer;


        }



        }

        return $this->render('mock_end');

    }




    public function actionQuestion_table(){

        if(Yii::$app->request->isAjax){

            if($_POST['coc']==0){

            $user_id = $_POST['user_id'];
            
            $gick_movie = $_POST['id_soc'];
            $rigth_answer = 'yes';


            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$user_id)->execute();


            $posts52256 = Yii::$app->db->createCommand('SELECT * FROM question_table_cache_but WHERE user_id='.$user_id)->queryAll();

            if($posts52256!=null){

                $posts121 = Yii::$app->db->createCommand('UPDATE question_table_cache_but SET count=0 WHERE user_id='.$user_id)->execute();

            }else{

                $posts121 = Yii::$app->db->createCommand('INSERT INTO question_table_cache_but (count,user_id) VALUES (0,'.$user_id.')')->execute();

            }

    
   $posts121 = Yii::$app->db->createCommand('UPDATE filtr_quest_table SET cache='.$gick_movie.' WHERE user_id='.$user_id)->execute();

           

            
                

                       return   $rigth_answer;


                   }else if($_POST['coc']==4){


                    $user_id = $_POST['user_id'];

                    $posts1375 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE user_id='.$user_id)->execute();

                    $posts121 = Yii::$app->db->createCommand('UPDATE question_table_cache_but SET count=0 WHERE user_id='.$user_id)->execute();

                    return   "yes";
                   }else if($_POST['coc']==3){

                    $user_id = $_POST['user_id'];

                    $gick_movie = $_POST['id_quest'];

                    $answer1 = $_POST['answer_1'];
     
                      $answer2 = $_POST['answer_2'];
     
                   $answer3 = $_POST['answer_3'];

                   $next = $_POST['next_id'];



                   $posts121 = Yii::$app->db->createCommand('UPDATE quest_table_cache SET quest_id='.$next.' WHERE user_id='.$user_id)->execute();


                   $posts52255 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie)->queryAll();


                   


                   if($answer1 == $posts52255[0]['one'] && $answer2 == $posts52255[0]['two'] && $answer3 == $posts52255[0]['three']){

                    $posts52256 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();


                    $posts52257 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$gick_movie.' AND user_id='.$user_id)->queryAll();

                    if($posts52257!=null){


                        $count = $posts52257[0]['count']++;

                        $posts12122 = Yii::$app->db->createCommand('UPDATE true_answer SET count='.$count.'  WHERE quest_id='.$gick_movie.' AND user_id='.$user_id.'')->execute();


                    }else{

                    $posts1222 = Yii::$app->db->createCommand('INSERT INTO true_answer (quest_id,user_id,cande_quest,count) VALUES ('.$gick_movie.', '.$user_id.', "'.$posts52256[0]['cande'].'", 1)')->execute();


                    }

                    
                    return   "yes";

                   }else{

                    $posts52256 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();


                    $posts52257 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$gick_movie)->queryAll();

                    if($posts52257!=null){


                        $count = $posts52257[0]['count']++;

                        $posts1218 = Yii::$app->db->createCommand('UPDATE false_answer SET count='.$count.' WHERE quest_id='.$gick_movie.' AND user_id='.$user_id.'')->execute();


                    }else{

                        $posts12178 = Yii::$app->db->createCommand('INSERT INTO false_answer (quest_id,user_id,cande_quest,count) VALUES ('.$gick_movie.', '.$user_id.', "'.$posts52256[0]['cande'].'", 1)')->execute();


                    }

                    return   "yes";
                   }



                    return   "yes";
                   }
                   
                   else{

                    $user_id = $_POST['user_id'];
                    $gick_movie = $_POST['id_quest'];

                   



                    $posts52255 = Yii::$app->db->createCommand('SELECT * FROM question_table_cache_but WHERE user_id='.$user_id)->queryAll();

                    if($posts52255!=null){

                        $posts121 = Yii::$app->db->createCommand('UPDATE question_table_cache_but SET count=1 WHERE user_id='.$user_id)->execute();

                    }else{

                        $posts121 = Yii::$app->db->createCommand('INSERT INTO question_table_cache_but (count,user_id) VALUES (1
                , '.$user_id.')')->execute();

                    }
                    

                    $posts5223 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE user_id='.$user_id)->queryAll();

                    if($posts5223!=null){

                        $posts121 = Yii::$app->db->createCommand('UPDATE quest_table_cache SET quest_id='.$gick_movie.' WHERE user_id='.$user_id)->execute();

                        $posts5224 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE user_id='.$user_id)->queryAll();


                        return   $posts5224[0]['quest_id'];
        
                    }else{

                        $posts121 = Yii::$app->db->createCommand('INSERT INTO quest_table_cache (quest_id,user_id) VALUES ('.$gick_movie.'
                , '.$user_id.')')->execute();


                $posts5224 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE user_id='.$user_id)->queryAll();


                return   $posts5224[0]['quest_id'];
        
                        
                    }

                   

                   }
                }


        return $this->render('question_table', [
            'model' => $model,
        ]);
    }






    public function actionMock_test(){


        if(Yii::$app->request->isAjax){

           

            if($_POST['coc']==2){

            

                $user_id = $_POST['user_id'];
             $gick_movie = $_POST['id_count'];
             $gick_movi2 = $_POST['id_value'];
             $rigth_answer = 'yes';

            
             $posts522 = Yii::$app->db->createCommand('SELECT cat FROM cache_mock WHERE user_id='.$user_id)->queryAll();

             if($posts522 !=null){

                $posts121 = Yii::$app->db->createCommand('UPDATE cache_mock SET number='.$gick_movie.', cat= "'.$gick_movi2.'" WHERE user_id='.$user_id)->execute();

             }else{

                $posts121 = Yii::$app->db->createCommand('INSERT INTO cache_mock (number, cat,user_id) VALUES ('.$gick_movie.', "'.$gick_movi2.'"
                , '.$user_id.')')->execute();

             }





$posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_mock WHERE user_id='.$user_id)->queryAll();

$posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_mock WHERE user_id='.$user_id)->queryAll();

$posts50 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="mock_test" AND cat="'.$posts51[0]['cat'].'"')->queryAll();


if($posts55 ==null){



$posts121 = Yii::$app->db->createCommand('INSERT INTO cache_question_mock (quest_id) VALUES ('.$posts50[0]['question_id'].')')->execute();

}else{

    $posts121 = Yii::$app->db->createCommand('UPDATE cache_question_mock SET quest_id='.$posts50[0]['question_id'].' WHERE user_id='.$user_id)->execute();

}


                        return   $rigth_answer;

            }else if($_POST['coc']==3){

                $gick_movie = $_POST['id_quest'];

               $answer1 = $_POST['answer_1'];

                 $answer2 = $_POST['answer_2'];

              $answer3 = $_POST['answer_3'];

              $user_id = $_POST['user_id'];

              $posts5792 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie.'')->queryAll();

              

              $posts5005 = Yii::$app->db->createCommand('SELECT * FROM cache_mock WHERE user_id='.$user_id.'')->queryAll();

              if($posts5792[0]['one']==$answer1 && $posts5792[0]['two']==$answer2 && $posts5792[0]['three']==$answer3){

             //   $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1,answer="true" WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
             //   $posts122 = Yii::$app->db->createCommand('UPDATE local_mock_quest SET cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
                

              }else{
            //    $posts122 = Yii::$app->db->createCommand('UPDATE local_mock_quest SET cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
             //   $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
              }

              $posts50 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();

              $posts51 = Yii::$app->db->createCommand('SELECT max(id) FROM local_mock_quest WHERE cat="'.$posts50[0]['cat'].'" AND user_id='.$user_id)->queryAll();

              $posts53 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE id='.$posts51[0]['max(id)'])->queryAll();

              $posts52 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE quest_id='.$posts53[0]['quest_id'].' AND user_id='.$user_id)->queryAll();


              if($posts52[0]['quest_id']==$gick_movie){

                
            //    $posts1375 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'"')->execute();//есть

                
              $posts294 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM answer_chache_mock  WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'" AND answer="false" AND cache=0')->queryAll();

                if($posts294[0]['COUNT(*)']<20){

                    $posts55 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="'.$posts5005[0]['cat'].'"')->queryAll();

                    $gg = 0;

                    foreach($posts55 as $kola):

                        $posts56 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$user_id.' AND quest_id='.$kola['question_id'])->queryAll();

                        if($gg<20){
                        if($posts56[0]['cache']==0 && $posts56[0]['answer']=="false"){

                        
                  //          $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['question_id'].')')->execute();
                        

                        $gg++;

                    }else if($posts56[0]['cache']==1 && $posts56[0]['answer']=="false"){

                    }else if($posts56[0]['answer']=="true"){

                    }
                    
                    else{

              //          $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['question_id'].')')->execute();
                        

                        $gg++;

                    }
                }

                    endforeach;


                }else{

                    $posts295 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock  WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'" ')->queryAll();

                    $gg = 0;

                    foreach($posts295 as $kola):

                        if($gg<20){

                            if($posts295[0]['cache']==0 && $posts295[0]['answer']=="false"){

                      //      $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['quest_id'].')')->execute();
                            
                            $gg++;
                            }else{

                            }

                        }

                        
                    endforeach;



                }


              }



          /*    $posts50 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();

              $posts51 = Yii::$app->db->createCommand('SELECT max(id) FROM local_mock_quest WHERE cat="'.$posts50[0]['cat'].'" AND user_id='.$user_id)->queryAll();

              $posts53 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE id='.$posts51[0]['max(id)'])->queryAll();

              $posts52 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE quest_id='.$posts53[0]['quest_id'].' AND user_id='.$user_id)->queryAll();

              

              if($posts52[0]['quest_id']==$gick_movie){

                $posts55 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="'.$posts50[0]['cat'].'"')->queryAll();

                $new_quest  = array();

                foreach($posts55 as $kola):

                    $posts502 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE quest_id='.$kola['question_id'].' AND user_id='.$user_id.' ')->queryAll();

                   if ($posts502[0]['cache']==0 && $posts502[0]['answer']=="false" ){

                        $new_quest[] = $kola['question_id'];

                       
                    }else{

                    }

                endforeach;

                $posts1375 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$user_id.' AND cat="'.$posts50[0]['cat'].'"')->execute();


                for($i=0;$i<=count($new_quest);$i++){

                if($i<20){

                    $posts1007 = Yii::$app->db->createCommand('INSERT INTO fast_test (quest_id) VALUES ('.$new_quest[$i].')')->execute();

              $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts50[0]['cat'].'", '.$new_quest[$i].')')->execute();

                }

        

        

                }

              }else{

               

              


              

              }*/

              
if($_POST['next_quest']!=0){

$id_c = $_POST['next_quest'];

$posts126 = Yii::$app->db->createCommand('UPDATE cache_question_mock SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();

$posts579 = Yii::$app->db->createCommand('SELECT points FROM all_test_points_mock_test WHERE user_id='.$user_id.'')->queryAll();

//$new_points = $posts579[0]['points'] - $points;

//$posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_mock_test SET points='.$new_points.' WHERE user_id='.$user_id)->execute();

//$posts126 = Yii::$app->db->createCommand('UPDATE cache_question_mock SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();



}else{

 

 }

 $rigth_answer = 'yes';

                return   $rigth_answer;

            } else if($_POST['coc']==10){


                $gick_movie = $_POST['id_quest'];

                $answer1 = $_POST['answer_1'];
 
                  $answer2 = $_POST['answer_2'];
 
               $answer3 = $_POST['answer_3'];
 
               $user_id = $_POST['user_id'];
 
               $posts5792 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie.'')->queryAll();
 
               
 
               $posts5005 = Yii::$app->db->createCommand('SELECT * FROM cache_mock WHERE user_id='.$user_id.'')->queryAll();
 
               if($answer1!=0 || $answer2 !=0 || $answer3!=0){

               if($posts5792[0]['one']==$answer1 && $posts5792[0]['two']==$answer2 && $posts5792[0]['three']==$answer3){
 
                 $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1,answer="true" WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
                 $posts122 = Yii::$app->db->createCommand('UPDATE local_mock_quest SET cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
                 
 
               }else{
                 $posts122 = Yii::$app->db->createCommand('UPDATE local_mock_quest SET cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
                 $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
               }

            }else{

                $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=2 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
                 $posts122 = Yii::$app->db->createCommand('UPDATE local_mock_quest SET cache=0 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();

            }
 
               $posts50 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();
 
               $posts51 = Yii::$app->db->createCommand('SELECT max(id) FROM local_mock_quest WHERE cat="'.$posts50[0]['cat'].'" AND user_id='.$user_id)->queryAll();
 
               $posts53 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE id='.$posts51[0]['max(id)'])->queryAll();
 
               $posts52 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE quest_id='.$posts53[0]['quest_id'].' AND user_id='.$user_id)->queryAll();
 
 
               if($posts52[0]['quest_id']==$gick_movie){
 
                 
                 $posts1375 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'"')->execute();//есть
 
                 
               $posts294 = Yii::$app->db->createCommand('SELECT COUNT(*) FROM answer_chache_mock  WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'" AND answer="false" AND cache=0')->queryAll();
 
                 if($posts294[0]['COUNT(*)']<20){
 
                     $posts55 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE cande="mock_test" AND cat="'.$posts5005[0]['cat'].'"')->queryAll();
 
                     $gg = 0;
 
                     foreach($posts55 as $kola):
 
                         $posts56 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$user_id.' AND quest_id='.$kola['question_id'])->queryAll();
 
                         if($gg<20){
                         if($posts56[0]['cache']==0 && $posts56[0]['answer']=="false"){
 
                         
                            $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['question_id'].')')->execute();
                         
 
                         $gg++;
 
                     }else if($posts56[0]['cache']==1 && $posts56[0]['answer']=="false"){
 
                     }else if($posts56[0]['answer']=="true"){
 
                     }
                     
                     else{
 
                         $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['question_id'].')')->execute();
                         
 
                         $gg++;
 
                     }
                 }
 
                     endforeach;
 
 
                 }else{
 
                     $posts295 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock  WHERE user_id='.$user_id.' AND cat="'.$posts5005[0]['cat'].'" ')->queryAll();
 
                     $gg = 0;
 
                     foreach($posts295 as $kola):
 
                         if($gg<20){
 
                             if($posts295[0]['cache']==0 && $posts295[0]['answer']=="false"){
 
                             $posts1004 = Yii::$app->db->createCommand('INSERT INTO local_mock_quest (user_id,cat,quest_id) VALUES ('.$user_id.', "'.$posts5005[0]['cat'].'", '.$kola['quest_id'].')')->execute();
                             
                             $gg++;
                             }else{
 
                             }
 
                         }
 
                         
                     endforeach;
 
 
 
                 }
 
 
               }
 
               

 
 $posts579 = Yii::$app->db->createCommand('SELECT points FROM all_test_points_mock_test WHERE user_id='.$user_id.'')->queryAll();

  $posts570 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie.'')->queryAll();


 if($answer1!=0 && $answer2!=0 && $answer3!=0){
 
     if($posts570[0]['one']==$answer1 && $posts570[0]['two']==$answer2 && $posts570[0]['three']==$answer3){
 
         $new_points = $posts579[0]['points'] - $points;
 
         $posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_mock_test SET points='.$new_points.' WHERE user_id='.$user_id)->execute();
 
 
     }
 }else{
 
     //tyt
     $posts5799 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->queryAll();
 
     if($posts5799[0]['cache']==2){
 
         $new_points = $posts579[0]['points'] + $points;
 
         $posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_mock_test SET points='.$new_points.' WHERE user_id='.$user_id)->execute();
         
 
     }else{
 
     }
 
 }

 
 
  $rigth_answer = 'yes';
 
                 return   $rigth_answer;

            }
            
            
            else if($_POST['coc']==4){


                $gick_movie = $_POST['id_quest'];

                $points = $_POST['points'];

               $answer1 = $_POST['answer_1'];

                 $answer2 = $_POST['answer_2'];

              $answer3 = $_POST['answer_3'];

              $user_id = $_POST['user_id'];


              $posts5020 = Yii::$app->db->createCommand('DELETE FROM mark WHERE user_id = '.$user_id)->execute();


              
              $posts5792 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie.'')->queryAll();

              if($posts5792[0]['one']==$answer1 && $posts5792[0]['two']==$answer2 && $posts5792[0]['three']==$answer3){
                $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1,answer="true" WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();

              }else{

                $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_mock SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();
              }



                
    
                $posts501 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE user_id='.$user_id)->queryAll();

                if($posts501 !=null){


                    foreach($posts501 as $v1):

                        $posts502 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$v1['quest_id'])->queryAll();

                        if($v1['answer_1'] ==$posts502[0]['one'] && $v1['answer_2'] ==$posts502[0]['two'] && $v1['answer_3'] ==$posts502[0]['three']){

                            $posts504 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->queryAll();

                            if($posts504 !=null){

                                $user_id = $_POST['user_id'];

                                $new_count = $posts504[0]['count'];

                                $new_count++;

                                $posts126 = Yii::$app->db->createCommand('UPDATE true_answer SET count= '.$new_count.'
                                WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->execute();


                            }else{

                                $user_id = $_POST['user_id'];

                                $posts126 = Yii::$app->db->createCommand('INSERT INTO true_answer (user_id,quest_id,cande_quest,count) 
                                VALUES ('.$user_id.', '.$v1['quest_id'].', "mock_test", 1)')->execute();

                            }

    

                        }else{

                            $user_id = $_POST['user_id'];

                            $posts505 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->queryAll();

                            if($posts505 != null){

                                

                                $new_count = $posts504[0]['count'];

                                $new_count++;

                                $posts126 = Yii::$app->db->createCommand('UPDATE false_answer SET count= '.$new_count.'
                                WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->execute();

                            }else{

                                $user_id = $_POST['user_id'];

                                $new_count = $posts504[0]['count'];
    
                                $new_count++;
    
                                $posts126 = Yii::$app->db->createCommand('INSERT INTO false_answer (user_id,quest_id,cande_quest,count) 
                                VALUES ('.$user_id.', '.$v1['quest_id'].', "mock_test", '.$new_count.')')->execute();

                            }

                           


                        }
                    endforeach;

                    $user_id = $_POST['user_id'];

                    $rigth_answer = 'yes';

                  //  $posts1375 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_mock WHERE user_id='.$user_id)->execute();

                return   $rigth_answer;


                }else{

                    $rigth_answer = 'no';
                    return   $rigth_answer;
                }
            
                
            }else if($_POST['coc']==5){

                $id_c = $_POST['id_quest'];

                $rigth_answer = 'yes';
       
            $user_cat =  $_POST['user_cat'];
                $user_id = $_POST['user_id'];


                 
   $posts5020 = Yii::$app->db->createCommand('SELECT * FROM mark WHERE user_id='.$user_id.' AND quest_id='.$id_c)->queryAll();
   
   if($posts5020 !=null){
   
       $posts126 = Yii::$app->db->createCommand('UPDATE mark SET quest_id='.$id_c.' WHERE user_id='.$user_id.' AND cat="'.$user_cat.'"')->execute();
   
   }else{
   
       $posts126 = Yii::$app->db->createCommand('INSERT INTO mark (quest_id,user_id,cat) VALUES ('.$id_c.', '.$user_id.', "'.$user_cat.'")')->execute();
   
   }

   return   $rigth_answer;

            }else if($_POST['coc']==6){


                $id_c = $_POST['id_quest'];

                $rigth_answer = 'yes';
       
       
                $user_id = $_POST['user_id'];


                 
   $posts5020 = Yii::$app->db->createCommand('DELETE FROM mark WHERE user_id = '.$user_id.' AND quest_id ='.$id_c)->execute();


                return   $rigth_answer;

            }
            
            else{
            
            $id_c = $_POST['id_quest'];

            $rigth_answer = 'yes';
   
   
            $user_id = $_POST['user_id'];
   
   
   $posts5020 = Yii::$app->db->createCommand('SELECT * FROM cache_question_mock WHERE user_id='.$user_id)->queryAll();
   
   if($posts5020 !=null){
   
       $posts126 = Yii::$app->db->createCommand('UPDATE cache_question_mock SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();
   
   }else{
   
       $posts126 = Yii::$app->db->createCommand('INSERT INTO cache_question_mock (quest_id,user_id) VALUES ('.$id_c.', '.$user_id.')')->execute();
   
   }
           
   
   
   
            return   $rigth_answer;
                    }

                }

        return $this->render('mock_test', [
            'model' => $model,
        ]);
    }



    public function actionPractice(){

        if(Yii::$app->request->isAjax){

           

            if($_POST['coc']==2){

                $user_id = $_POST['user_id'];

            
             $gick_movie = $_POST['id_count'];
             $gick_movi2 = $_POST['id_value'];
             $rigth_answer = 'yes';

            

$posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number='.$gick_movie.', cat = "'.$gick_movi2.'" WHERE user_id='.$user_id)->execute();




$posts55 = Yii::$app->db->createCommand('SELECT quest_id FROM cache_question_practice WHERE user_id='.$user_id)->queryAll();

$posts51 = Yii::$app->db->createCommand('SELECT cat FROM cache_buttons WHERE user_id='.$user_id)->queryAll();

$posts50 = Yii::$app->db->createCommand('SELECT question_id FROM cande_question  WHERE cande="practice" AND cat="'.$posts51[0]['cat'].'"')->queryAll();


if($posts55 !=null){

  
//$posts121 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$posts50[0]['question_id'].' WHERE user_id='.$user_id)->execute();

}else{

 
//$posts121 = Yii::$app->db->createCommand('INSERT INTO cache_question_practice (quest_id,user_id) VALUES ('.$posts50[0]['question_id'].', '.$user_id.')')->execute();
}


                        return   $rigth_answer;

            }else if($_POST['coc']==3){

                $gick_movie = $_POST['id_quest'];

                $points = $_POST['points'];

               $answer1 = $_POST['answer_1'];

                 $answer2 = $_POST['answer_2'];

              $answer3 = $_POST['answer_3'];

              $user_id = $_POST['user_id'];


//$posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_practice SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();




 


$id_c = $_POST['next_quest'];

$lasy = $_POST['lasy'];






$posts52 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons WHERE user_id='.$user_id)->queryAll();

$posts51 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$user_id)->queryAll();

if($posts52[0]['cat']=="Basic Material" && $lasy==20){

    $tags_all = array();

    $x = 0;

$tags_all[$x] = "Basic Material";

    foreach($posts51 as $kola):

        $x++;

        $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();
      
        $tags_all[$x] = $posts02[0]['name'];

    endforeach;

    $new_num = $posts52[0]['number']+1;

    $new_cat = $tags_all[$new_num];

    $new_count = $posts52[0]['number']+1;

     if($new_cat!=null){

        $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number='.$new_count.', cat = "'.$new_cat.'" WHERE user_id='.$user_id)->execute();
    }else{

        $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number=0, cat = "Basic Material" WHERE user_id='.$user_id)->execute();
        
    }

}else if($posts52[0]['cat']=="Basic Material" && $lasy<20){

    $posts126 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();

}else if($posts52[0]['cat']!="Basic Material" && $lasy<10){

    $posts126 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();

}else  if($posts52[0]['cat']!="Basic Material" && $lasy==10){

    $tags_all = array();

    $x = 0;

$tags_all[$x] = "Basic Material";

foreach($posts51 as $kola):

    $x++;

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();
  
    $tags_all[$x] = $posts02[0]['name'];

endforeach;

    $new_cat = $tags_all[$posts52[0]['number']+1];

    $new_count = $posts52[0]['number']+1;

     if($new_cat!=null){

        $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number='.$new_count.', cat = "'.$new_cat.'" WHERE user_id='.$user_id)->execute();
    }else{

        $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number=0, cat = "Basic Material" WHERE user_id='.$user_id)->execute();
        
    }

}

                $rigth_answer = 'yes';

                return   $rigth_answer;

            }else if($_POST['coc']==10){

                $gick_movie = $_POST['id_quest'];

                $points = $_POST['points'];

               $answer1 = $_POST['answer_1'];

                 $answer2 = $_POST['answer_2'];

              $answer3 = $_POST['answer_3'];

              $user_id = $_POST['user_id'];

              if($answer1!=0 || $answer2!=0 || $answer3!=0){

$posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_practice SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();

              }else{

                $posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_practice SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=2 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();

              }


 


$id_c = $_POST['next_quest'];


//xyu1

//$posts126 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();


$posts579 = Yii::$app->db->createCommand('SELECT points FROM all_test_points_prac WHERE user_id='.$user_id.'')->queryAll();


$posts570 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie.'')->queryAll();


if($answer1!=0 && $answer2!=0 && $answer3!=0){

    if($posts570[0]['one']==$answer1 && $posts570[0]['two']==$answer2 && $posts570[0]['three']==$answer3){

        $new_points = $posts579[0]['points'] - $points;

$posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_prac SET points='.$new_points.' WHERE user_id='.$user_id)->execute();


    }
}else{

    //tyt
    $posts5799 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->queryAll();

    if($posts5799[0]['cache']==2){

        $new_points = $posts579[0]['points'] + $points;

        $posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_prac SET points='.$new_points.' WHERE user_id='.$user_id)->execute();
        

    }else{

    }

}


                $rigth_answer = 'yes';

                return   $rigth_answer;

            }else if($_POST['coc']==11){

                $gick_movie = $_POST['id_quest'];

                $user_id = $_POST['user_id'];

                $rigth_answer = 'yes';


$posts488 = Yii::$app->db->createCommand('SELECT * FROM help WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->queryAll();

if($posts488==null){

    $posts599 = Yii::$app->db->createCommand('INSERT INTO help (user_id,quest_id)
    VALUES ('.$user_id.', '.$gick_movie.')')->execute();

    return   $rigth_answer;

}else{

    return   $rigth_answer;

}
                    

                

            }
            
            else if($_POST['coc']==4){

                $gick_movie = $_POST['id_quest'];

                $points = $_POST['points'];

               $answer1 = $_POST['answer_1'];

                 $answer2 = $_POST['answer_2'];

              $answer3 = $_POST['answer_3'];

              $user_id = $_POST['user_id'];




$posts121 = Yii::$app->db->createCommand('UPDATE answer_chache_practice SET answer_1='.$answer1.', answer_2='.$answer2.', answer_3='.$answer3.',cache=1 WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();




 

$posts488 = Yii::$app->db->createCommand('SELECT * FROM practice_date_cache WHERE user_id='.$user_id.'')->queryAll();

if($posts488!=null){

    $posts499 = Yii::$app->db->createCommand('UPDATE practice_date_cache SET date="'.date('d.m.y').'" WHERE user_id='.$user_id)->execute();

}else{

    $posts599 = Yii::$app->db->createCommand('INSERT INTO practice_date_cache (user_id,date)
    VALUES ('.$user_id.', "'.date('d.m.y').'")')->execute();

}


$id_c = $_POST['next_quest'];



//$posts135 = Yii::$app->db->createCommand('TRUNCATE TABLE  cache_question_practice')->execute();
$posts126 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();


$posts579 = Yii::$app->db->createCommand('SELECT points FROM all_test_points_prac WHERE user_id='.$user_id.'')->queryAll();




$new_points = $posts579[0]['points'] - $points;

$posts126 = Yii::$app->db->createCommand('UPDATE all_test_points_prac SET points='.$new_points.' WHERE user_id='.$user_id)->execute();

    
                $posts501 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE user_id='.$user_id)->queryAll();

                if($posts501 !=null){


                    foreach($posts501 as $v1):

                        $posts502 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$v1['quest_id'])->queryAll();

                        if($v1['answer_1'] ==$posts502[0]['one'] && $v1['answer_2'] ==$posts502[0]['two'] && $v1['answer_3'] ==$posts502[0]['three']){

                            $posts504 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->queryAll();

                            if($posts504 !=null){

                                $user_id = $_POST['user_id'];

                                $new_count = $posts504[0]['count'];

                                $new_count++;

                                $posts126 = Yii::$app->db->createCommand('UPDATE true_answer SET count= '.$new_count.'
                                WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->execute();


                            }else{

                                $user_id = $_POST['user_id'];

                                $posts126 = Yii::$app->db->createCommand('INSERT INTO true_answer (user_id,quest_id,cande_quest,count) 
                                VALUES ('.$user_id.', '.$v1['quest_id'].', "practice", 1)')->execute();

                            }

    

                        }else{

                            $user_id = $_POST['user_id'];

                            $posts505 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->queryAll();

                            if($posts505 != null){

                                

                                $new_count = $posts504[0]['count'];

                                $new_count++;

                                $posts126 = Yii::$app->db->createCommand('UPDATE false_answer SET count= '.$new_count.'
                                WHERE quest_id='.$v1['quest_id'].' AND user_id='.$user_id)->execute();

                            }else{

                                $user_id = $_POST['user_id'];

                                $new_count = $posts504[0]['count'];
    
                                $new_count++;
    
                                $posts126 = Yii::$app->db->createCommand('INSERT INTO false_answer (user_id,quest_id,cande_quest,count) 
                                VALUES ('.$user_id.', '.$v1['quest_id'].', "practice", '.$new_count.')')->execute();

                            }

                           


                        }
                    endforeach;

                    $user_id = $_POST['user_id'];

                    $rigth_answer = 'yes';

                    

                return   $rigth_answer;


                }else{

                    $rigth_answer = 'no';
                    return   $rigth_answer;
                }
            
                
            }
            else if($_POST['coc']==7){


                $user_id = $_POST['user_id'];
               $quest_id = $_POST['id_quest'];



                $posts126 = Yii::$app->db->createCommand('UPDATE video_req SET status= 0
                WHERE quest_id='.$quest_id.' AND user_id='.$user_id)->execute();


                $rigth_answer = 'yes';

                    

                return   $rigth_answer;


            }
            else if($_POST['coc']==99){


                $user_id = $_POST['user_id'];
               $quest_id = $_POST['id_quest'];
               $status = $_POST['status'];



                $posts126 = Yii::$app->db->createCommand('UPDATE video_req SET status= '.$status.'
                WHERE quest_id='.$quest_id.' AND user_id='.$user_id)->execute();


                $rigth_answer = 'yes';

                    

                return   $rigth_answer;


            }
            else{

         $id_c = $_POST['id_quest'];

        
         $lasy = $_POST['lasy'];


         $rigth_answer = 'yes';


         $user_id = $_POST['user_id'];

         if($lasy==1){

$posts52 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons WHERE user_id='.$user_id)->queryAll();

$posts51 = Yii::$app->db->createCommand('SELECT * FROM user_tags WHERE user_id='.$user_id)->queryAll();


    $tags_all = array();

    $x = 0;

$tags_all[$x] = "Basic Material";

foreach($posts51 as $kola):

    $x++;

    $posts02 = Yii::$app->db->createCommand('SELECT * FROM tags WHERE id='.$kola['tag_id'])->queryAll();
  
    $tags_all[$x] = $posts02[0]['name'];

endforeach;

$new_count = $posts52[0]['number']-1;

$new_cat = $tags_all[$new_count];



 if($new_cat!=null){

    $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number='.$new_count.', cat = "'.$new_cat.'" WHERE user_id='.$user_id)->execute();
}else{

    $posts121 = Yii::$app->db->createCommand('UPDATE cache_buttons SET number=0, cat = "Basic Material" WHERE user_id='.$user_id)->execute();
    
}

         }else{

         

        // $posts5050 = Yii::$app->db->createCommand('SELECT * FROM cache_buttons WHERE user_id='.$user_id)->queryAll();

$posts5020 = Yii::$app->db->createCommand('SELECT * FROM cache_question_practice WHERE user_id='.$user_id)->queryAll();

if($posts5020 !=null){

    $posts126 = Yii::$app->db->createCommand('UPDATE cache_question_practice SET quest_id='.$id_c.' WHERE user_id='.$user_id)->execute();

}else{

    $posts126 = Yii::$app->db->createCommand('INSERT INTO cache_question_practice (quest_id,user_id) VALUES ('.$id_c.', '.$user_id.')')->execute();

}
}    



         return   $rigth_answer;

                
            }
                    }

                    

        return $this->render('practice', [
            'model' => $model,
        ]);
    }








    public function actionChapters(){

        if(Yii::$app->request->isAjax){

            if($_POST['coc']==1){

                $user_id = $_POST['user_id'];
                $id_soc = $_POST['id_soc'];

                $id_quest = $_POST['id_quest'];


                $posts50228 = Yii::$app->db->createCommand('SELECT * FROM chap_cache WHERE user_id='.$user_id)->queryAll();

                if($posts50228!=null){

                    $posts1268 = Yii::$app->db->createCommand('UPDATE chap_cache SET cat_id='.$id_soc.' WHERE user_id='.$user_id)->execute();

                }else{

                    $posts1289 = Yii::$app->db->createCommand('INSERT INTO chap_cache (cat_id,user_id) VALUES ('.$id_soc.', '.$user_id.')')->execute();

                }



                $posts523 = Yii::$app->db->createCommand('SELECT * FROM cache_quest_chap WHERE user_id='.$user_id)->queryAll();

                if($posts523!=null){

                    $posts1277 = Yii::$app->db->createCommand('UPDATE cache_quest_chap SET quest_id='.$id_quest.' WHERE user_id='.$user_id)->execute();

                }else{

                    $posts12879 = Yii::$app->db->createCommand('INSERT INTO cache_quest_chap (quest_id,user_id) VALUES ('.$id_quest.', '.$user_id.')')->execute();

                }




                return "yes";

            }else if($_POST['coc']==2){

                $user_id = $_POST['user_id'];

                $posts1375 = Yii::$app->db->createCommand('DELETE FROM  chap_cache WHERE user_id='.$user_id)->execute();

                $posts1376 = Yii::$app->db->createCommand('DELETE FROM  cache_quest_chap WHERE user_id='.$user_id)->execute();

                return "yes";

            }else if($_POST['coc']==3){

                $gick_movie = $_POST['id_quest'];

                    $answer1 = $_POST['answer_1'];
     
                      $answer2 = $_POST['answer_2'];
     
                   $answer3 = $_POST['answer_3'];


                $user_id = $_POST['user_id'];

                $id_soc = $_POST['next'];

                $posts523 = Yii::$app->db->createCommand('SELECT * FROM cache_quest_chap WHERE user_id='.$user_id)->queryAll();

                if($posts523!=null){

                    $posts1277 = Yii::$app->db->createCommand('UPDATE cache_quest_chap SET quest_id='.$id_soc.' WHERE user_id='.$user_id)->execute();

                }else{

                    $posts12879 = Yii::$app->db->createCommand('INSERT INTO cache_quest_chap (quest_id,user_id) VALUES ('.$id_soc.', '.$user_id.')')->execute();

                }

                $posts524 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$gick_movie)->queryAll();

                if($posts524[0]['one']==$answer1 && $posts524[0]['two']==$answer2 && $posts524[0]['three']==$answer3){

                    $posts525 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$gick_movie)->queryAll();

                    $posts526 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$gick_movie)->queryAll();

                    if($posts525!=null){

                    }else{

                        $posts5278 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$gick_movie)->queryAll();

                        if($posts5278!=null){

                            $count_gig = $posts5278[0]['count']++;

                            $posts1255 = Yii::$app->db->createCommand('INSERT INTO true_answer (quest_id,user_id,cande_quest,count) VALUES ('.$id_soc.', '.$user_id.', "'.$posts526[0]['cande'].'", '.$count_gig.')')->execute();

                            $posts1376 = Yii::$app->db->createCommand('DELETE FROM  false_answer WHERE user_id='.$user_id.' AND quest_id='.$gick_movie)->execute();

                        }else{

                            $posts1255 = Yii::$app->db->createCommand('INSERT INTO true_answer (quest_id,user_id,cande_quest,count) VALUES ('.$id_soc.', '.$user_id.', "'.$posts526[0]['cande'].'", 1)')->execute();

                        }

                        
                    }


                    return "yes";

                }else{

                    $posts527 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$gick_movie)->queryAll();

                    if($posts527!=null){

                        $count_g = $posts527[0]['count']++;
                        $posts1278 = Yii::$app->db->createCommand('UPDATE false_answer SET count='.$count_g.' WHERE quest_id='.$id_soc.' AND user_id='.$user_id)->execute();


                    }else{

                        $posts1257 = Yii::$app->db->createCommand('INSERT INTO false_answer (quest_id,user_id,cande_quest,count) VALUES ('.$id_soc.', '.$user_id.', "'.$posts526[0]['cande'].'", 1)')->execute();

                    }


                    

                }


                return "yes";

            }
            
            
            else{
                $user_id = $_POST['user_id'];


                return "yes";
            }

         

        }

        return $this->render('chapters', [
            'model' => $model,
        ]);
    }
    public function actionInfo_sys(){

        if(Yii::$app->request->isAjax){



            if($_POST['coc']==3){
                $user_id = $_POST['user_id'];

                $posts1 = Yii::$app->db->createCommand('DELETE FROM  all_test_points_mock_test WHERE user_id='.$user_id)->execute();
                $posts2 = Yii::$app->db->createCommand('DELETE FROM  all_test_points_prac WHERE user_id='.$user_id)->execute();

                
                $posts3 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_mock WHERE user_id='.$user_id)->execute();
                $posts4 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_practice WHERE user_id='.$user_id)->execute();

                $posts5 = Yii::$app->db->createCommand('DELETE FROM   cache_buttons WHERE user_id='.$user_id)->execute();

                $posts6 = Yii::$app->db->createCommand('DELETE FROM   cache_end_but_mock_test WHERE user_id='.$user_id)->execute();
                
                $posts7 = Yii::$app->db->createCommand('DELETE FROM   cache_end_but_practice WHERE user_id='.$user_id)->execute();

                $posts8 = Yii::$app->db->createCommand('DELETE FROM   cache_filtr WHERE user_id='.$user_id)->execute();

                $posts9 = Yii::$app->db->createCommand('DELETE FROM   cache_mock WHERE user_id='.$user_id)->execute();
               
                
                
                $posts10 = Yii::$app->db->createCommand('DELETE FROM   cache_question_mock WHERE user_id='.$user_id)->execute();
                
                
                $posts11 = Yii::$app->db->createCommand('DELETE FROM   cache_question_practice WHERE user_id='.$user_id)->execute();

               // $posts12 = Yii::$app->db->createCommand('DELETE FROM   date_answer WHERE id_user='.$user_id)->execute();

                 $posts12 = Yii::$app->db->createCommand('UPDATE date_answer SET proc=0 WHERE id_user='.$user_id)->execute();

                $posts13 = Yii::$app->db->createCommand('DELETE FROM   done_mock_test WHERE user_id='.$user_id)->execute();

                $posts14 = Yii::$app->db->createCommand('DELETE FROM   done_test_prac WHERE user_id='.$user_id)->execute();
                
                $posts15 = Yii::$app->db->createCommand('DELETE FROM   end_cache_mock_test WHERE user_id='.$user_id)->execute();
                
                $posts16 = Yii::$app->db->createCommand('DELETE FROM   end_cache_prac WHERE user_id='.$user_id)->execute();

                $posts17 = Yii::$app->db->createCommand('DELETE FROM   false_answer WHERE user_id='.$user_id)->execute();
                
                $posts18 = Yii::$app->db->createCommand('DELETE FROM   question_table_cache_but WHERE user_id='.$user_id)->execute();

                $posts19 = Yii::$app->db->createCommand('DELETE FROM   quest_table_cache WHERE user_id='.$user_id)->execute();
                
                $posts20 = Yii::$app->db->createCommand('DELETE FROM   true_answer WHERE user_id='.$user_id)->execute();


                //$posts21 = Yii::$app->db->createCommand('INSERT INTO  date_answer SET user_id='.$user_id.', ')->execute();

                return "yes";

        }else{

            $user_id = $_POST['user_id'];

            $posts126 = Yii::$app->db->createCommand('UPDATE users_ip SET zap=0 WHERE user_id='.$user_id)->execute();

            $posts5021 = Yii::$app->db->createCommand('SELECT * FROM synchronization WHERE user_id='.$user_id)->queryAll();

            $date = date('m/d/Y h:i:s a', time());

            if($posts5021!=null){

                $posts126 = Yii::$app->db->createCommand('UPDATE synchronization SET date_time='.$date.' WHERE user_id='.$user_id)->execute();

            }else{

                $posts126 = Yii::$app->db->createCommand('INSERT INTO synchronization (user_id,date_time) VALUES ('.$user_id.',"'.$date.'")')->execute();

            }

           

            return "yes";

        }

        }


        return $this->render('info_sys', [
            'model' => $model,
        ]);
    }

    

    public function actionCheckout(){

        if(Yii::$app->user->identity->role==3){
            $posts11 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
        }else {
            $posts11 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE email="'.Yii::$app->user->identity->username.'"')->queryAll();
        }
        

        $posts101 = Yii::$app->db->createCommand('SELECT * FROM buy_store WHERE user_id='.$posts11[0]['id'])->queryAll();

        $p = new paypal();
        $response = $p->teszt($posts101[0]['count'],[]);
        //echo '<pre/>';

        $url = $response->links[1]->href;
        //echo 'Redirect user here:'.$url.'<br/><br/>';
        //var_dump($response);

        //alert($url);

        header('Location: '.$url);
        die();
        

        return $this->render('checkout', [
            'model' => $model,
        ]);
    }
    
    public function actionPayment(){
 

       if(Yii::$app->request->isAjax){

        $user_id = $_POST['user_id'];
            $number = $_POST['number'];
            $sets = $_POST['sets'];
            
        $posts126 = Yii::$app->db->createCommand('INSERT INTO buy_store (user_id,count,number) VALUES ('.$user_id.','.round($number, 2).','.$sets.')')->execute();
    
                   

            return "yes";
        }

        return $this->render('payment', [
            'model' => $model,
        ]);
    }


    public function actionRes_stude_create(){

        return $this->render('res_stude_create', [
            'model' => $model,
        ]);
    }

    
    public function actionStart(){

        $this->layout = "main-login";

        return $this->render('start', [
            'model' => $model,
        ]);
    }

    public function actionBan_list(){

        if(Yii::$app->request->isAjax){

            
            $user_id = $_POST['user_id'];

            $posts7 = Yii::$app->db->createCommand('DELETE FROM ban_list WHERE user_id='.$user_id)->execute();

            

            return "yes";
        }

        return $this->render('ban_list', [
            'model' => $model,
        ]);
    }


    public function actionCreate_per(){

        return $this->render('create_per', [
            'model' => $model,
        ]);
    }
    
    public function actionForgot_password1(){

        $this->layout = "main-login";

        if(Yii::$app->request->isAjax){

            $email= $_POST['email'];
           
            $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }


            $posts101 = Yii::$app->db->createCommand('SELECT * FROM students WHERE email="'.$email.'"')->queryAll();
            $posts102 = Yii::$app->db->createCommand('SELECT * FROM school WHERE email="'.$email.'"')->queryAll();
            $posts103 = Yii::$app->db->createCommand('SELECT * FROM admin WHERE email="'.$email.'"')->queryAll();
            $posts104 = Yii::$app->db->createCommand('SELECT * FROM user WHERE email="'.$email.'"')->queryAll();

            $new_mail = $email;

            if($posts101!=null){
                $new_mail = $email;

                $new_pass = password_hash($randomString,PASSWORD_DEFAULT);


                $posts126 = Yii::$app->db->createCommand('UPDATE students SET password="'.$randomString.'" WHERE id='.$posts101[0]['id'])->execute();
                $posts127 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$new_pass.'" WHERE username="'.$posts101[0]['username'].'"')->execute();


            }else if($posts102!=null){
                $new_mail = $email;

                $posts126 = Yii::$app->db->createCommand('UPDATE school SET password="'.$randomString.'" WHERE id='.$posts101[0]['id'])->execute();
                $posts127 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$new_pass.'" WHERE username="'.$posts101[0]['school_name'].'"')->execute();
            }else if($posts103!=null){
                $new_mail = $email;

                $posts126 = Yii::$app->db->createCommand('UPDATE admin SET password="'.$randomString.'" WHERE id='.$posts101[0]['id'])->execute();
                $posts127 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$new_pass.'" WHERE username="'.$posts101[0]['username'].'"')->execute();

            }else if($posts104!=null){
                $new_mail = $email;

                $posts127 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$new_pass.'" WHERE username="'.$posts101[0]['username'].'"')->execute();
            }


           // $posts126 = Yii::$app->db->createCommand('INSERT INTO fast_test (email,new_pass) VALUES ("'.$new_mail.'","'.$randomString.'")')->execute();

   $to = $new_mail;
   $mail_subject = "New Password MentorCard";
   $mail_content = "Hello, your new password - ".$randomString;
   $header = "From : admin@mentorcard.com" . "\r\n";

   $result = mail($to,$mail_subject,$mail_content,$header);

   if($result){

    return "yes";

   }else{

    return "yes";
   }

            
        }

        return $this->render('forgot_password1', [
            'model' => $model,
        ]);
    }

    //choose_lang
    public function actionChoose_lang(){

        $this->layout = "main-login";

        if(Yii::$app->request->isAjax){

            $lang_id = $_POST['lang_id'];
            $user_ip = $_POST['user_ip'];

            $posts126 = Yii::$app->db->createCommand('INSERT INTO user_ip_front (id_lang,ip_ad) VALUES ('.$lang_id.',"'.$user_ip.'")')->execute();

            

            return "yes";
        }
     


        return $this->render('choose_lang', [
            'model' => $model,
        ]);
    }
    

    public function actionDashboard_stud(){

        


        return $this->render('dashboard_stud', [
            'model' => $model,
        ]);
    }

    public function actionStatistics_stud(){

        return $this->render('statistics_stud', [
            'model' => $model,
        ]);
    }
    /**
     * Login action.
     * @return string
     */
    
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();


        
            
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }

    }

    public function actionSignup()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = "main-login";
		$model = new SignUpForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $user->save();
               
                if (Yii::$app->getUser()->login($user)) {	
                    
                  /*  $article1 = new Students;
                    $article1->username =  $model->username;
                    $article1->first_name = $model->first_name;
                    $article1->last_name = $model->last_name;
                    $article1->day_birth = $model->day_birth;
                    $article1->place_birth = $model->place_birth;
                    $article1->country = $model->country;
                    $article1->phone_number = $model->phone_number;
                    $article1->password = $model->password;
                    $article1->langs_array = $model->langs_array;
                    $article1->lang_array = $model->lang_array;
                    $article1->email = $model->email;
                    $article1->activation_code = $model->activation_code;
                    $article1->insert();*/

                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
