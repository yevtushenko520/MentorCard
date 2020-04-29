<?php

namespace backend\controllers;

use Yii;
use app\models\School;
use app\models\SchoolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelSchool = new SchoolSearch();
        $dataProviderSchool = $searchModelSchool->search(Yii::$app->request->queryParams);

        

        return $this->render('index', [
            'searchModelSchool' => $searchModelSchool,
            'dataProviderSchool' => $dataProviderSchool,
        ]);
    }

    /**
     * Displays a single School model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();

        if ($model->load(Yii::$app->request->post()) ) {

            
            $posts055 = Yii::$app->db->createCommand('SELECT max(id) FROM school ')->queryAll();

           
            $new_test_id = $posts055[0]['max(id)'] +1;

            $posts1375 = Yii::$app->db->createCommand('INSERT INTO `school` (`id`,`school_name`, `first_name`, `last_name`,
             `password`, `date_birth`, `telephone_no`, `mobile_number`, `email`, `street`, `post_code`, `city`, `iban`, `bic`) 
            VALUES ('.$new_test_id.',"'.$model->school_name.'", "'.$model->first_name.'", "'.$model->last_name.'", "'.$model->password.'", 
            "'.$model->date_birth.'","'.$model->telephone_no.'", "'.$model->mobile_number.'", "'.$model->email.'", "'.$model->street.'", '.$model->post_code.',
            "'.$model->city.'", '.$model->iban.', '.$model->bic.')' )->execute();

            

            $article = new User;
            $article->username = $model->email;
            $article->auth_key = Yii::$app->security->generateRandomString();
            $article->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $article->email = $model->email;
            $article->role = 3;
            $article->insert();






            $posts03 = Yii::$app->db->createCommand('SELECT * FROM school WHERE school_name="'.$model->school_name.'"')->queryAll();



            $article = Yii::$app->security->generateRandomString();
            $article2 = Yii::$app->security->generatePasswordHash($model->password);
    
            if($posts03!=null){
    
    $posts333 = Yii::$app->db->createCommand('SELECT max(id) FROM school')->queryAll();
    
    if($posts333[0]['max(id)']<=20000){
    
     $new_id = $posts333[0]['max(id)'] +20000;
    
     $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $model->school_name.'"')->execute();
    
    }else{
    
        $new_id = $posts333[0]['max(id)'] ;
    
        $posts1262 = Yii::$app->db->createCommand('UPDATE school SET id='.$new_id.' WHERE school_name="'. $model->school_name.'"')->execute();
    
    }
    
                $posts126 = Yii::$app->db->createCommand('UPDATE user SET password_hash="'.$article2.'", email="'.$model->email.'" WHERE username="'.$model->email.'"')->execute();
    
                $posts40 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$model->school_name.'"')->queryAll();
    
            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  user_tags WHERE user_id='.$posts40[0]['id'])->execute();
            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_stud WHERE stud_id='.$posts40[0]['id'])->execute();
            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  stud_langs_write WHERE student_id='.$posts40[0]['id'])->execute();
            $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE user_id='.$posts40[0]['id'])->execute();
            $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_practice WHERE user_id='.$posts40[0]['id'])->execute();
            $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_buttons WHERE user_id='.$posts40[0]['id'])->execute();
            $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_practice WHERE user_id='.$posts40[0]['id'])->execute();
    
            $posts138 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE user_id='.$posts40[0]['id'])->execute();
         //   $posts138 = Yii::$app->db->createCommand('DELETE FROM   answer_chache_mock WHERE user_id='.$posts40[0]['id'])->execute();
            $posts138 = Yii::$app->db->createCommand('DELETE FROM    cache_question_mock WHERE user_id='.$posts40[0]['id'])->execute();
    
            foreach($model->categor as $role):
                   
        
                $posts455 = Yii::$app->db->createCommand('INSERT INTO user_tags (user_id,tag_id) VALUES ('.$posts40[0]['id'].', '.$role.')')->execute();
        
            endforeach;
    
            $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_write (student_id,lang_id) VALUES ('.$posts40[0]['id'].','.$model->lang_array.')')->execute();
    
            foreach($model->langs_array as $role):
                 
                 
                 
               $posts45 = Yii::$app->db->createCommand('INSERT INTO stud_langs_stud (stud_id,langs_id) VALUES ('.$posts40[0]['id'].','.$role.')')->execute();
               
               endforeach;
    
     $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$model->school_name.'"')->queryAll();
    
               if($posts33!=null){
    
                $posts1262 = Yii::$app->db->createCommand('UPDATE school_name SET name="'.$model->school_name.'" WHERE id='. $posts33[0]['id'])->execute();
    
               }else{
    
                $posts45 = Yii::$app->db->createCommand('INSERT INTO school_name (name) VALUES ("'.$model->school_name.'")')->execute();
    
               }
    
    
    
               
               $msg = "Welcome to Mentorcard! You are successfully registered.\n\nUsername: ".$model->email."\nPassword: ".$model->password;
    
    
               $header = "From: info@mentrocard.de";
               
               $mail = $model->email;
       
       // send email
       mail($mail,"MentorCard",$msg,$header);
       
       
       $length = 10;
        
       for($x=0;$x<=999;$x++){
       
         $characters = '0123456789';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
       
           }
       
        $custom_id = "RS-".$randomString;
       
       
        $posts55 = Yii::$app->db->createCommand('SELECT * FROM customer_id  WHERE customer="'.$custom_id.'"')->queryAll();
       
        if($posts55==null){
       
           $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$model->school_name.'"')->queryAll();
       
           $posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$new_test_id.',
           "res","'.$custom_id.'")')->execute();
       
       
        }else{
       
       
           for($x=0;$x<=999;$x++){
       
               $characters = '0123456789';
               $charactersLength = strlen($characters);
               $randomString = '';
               for ($i = 0; $i < $length; $i++) {
                   $randomString .= $characters[rand(0, $charactersLength - 1)];
               }
             
                 }
             
              $custom_id = "RS-".$randomString;
       
              $posts33 = Yii::$app->db->createCommand('SELECT * FROM school_name  WHERE name="'.$model->school_name.'"')->queryAll();
       
              $posts45 = Yii::$app->db->createCommand('INSERT INTO customer_id (user_id,type,customer) VALUES ('.$new_test_id.',"res","'.$custom_id.'")')->execute();
       
        }
        
    
            }
            
           
    
    

            
 $posts40 = Yii::$app->db->createCommand('SELECT * FROM school  WHERE email="'.$model->school_name.'"')->queryAll();

            $new_id =  $posts40[0]['id'];

            return $this->redirect(['view', 'id' => $new_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    
    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing School model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
         SELECT school_name FROM school
         WHERE id = '$id'
         ");
     
        $result = $command->queryAll(); 
         
         foreach ($result as $row) {
     
             $cu_id2 = $row['school_name'];
         }
     
         $connection->createCommand()->delete('user', ['username' => $cu_id2])->execute();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
