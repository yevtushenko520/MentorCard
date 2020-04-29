<?php

namespace backend\controllers;

use Yii;
use app\models\Quesions;
use app\models\QuesionsSearch;
use app\models\LangsQuestion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\Model;
use yii\helpers\ArrayHelper;
/**
 * QuesionsController implements the CRUD actions for Quesions model.
 */
class QuesionsController extends Controller
{
    
    public $array_d;
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
     * Lists all Quesions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuesionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Quesions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $langsView = LangsQuestion::find()->asArray()->where(['question_id' => $id])->all();
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'langsQuestions' => $langsView,
        ]);


    }

    /**
     * Creates a new Quesions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quesions();
          $modelsQuestion = [new LangsQuestion];

          if ($model->load(Yii::$app->request->post()) ) {

            $modelsQuestion = Model::createMultiple(LangsQuestion::classname());
            Model::loadMultiple($modelsQuestion, Yii::$app->request->post());

             // validate all models
             $valid = $model->validate();
             $valid = Model::validateMultiple($modelsQuestion) && $valid;
     
               
          //   $model->save();
             $questionId = $model->id;
              $image = UploadedFile::getInstance($model,'image');


              if($image!=null){
            
                $imageName = 'stu_' . $questionId . '.' . $image ->getExtension();
                $image->saveAs( Yii::getAlias('@webroot') . '/images/students/' .$imageName);
   
                $model ->image = $imageName;
    
                }
              
            //  $model->save(); 

             
             if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ( $modelsQuestion as  $modelsQuestion) {
                            $modelsQuestion->question_id = $model->id;
                            if (! ($flag = $modelsQuestion->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }  
        
        }

        return $this->render('create', [
            'model' => $model,
            'modelsQuestion' => (empty($modelsQuestion)) ? [new LangsQuestion] : $modelsQuestion
        ]);
    }

  
    /**
     * Updates an existing Quesions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsQuestion = $model->langsQuestions;

       

        if ($model->load(Yii::$app->request->post()) ) {

           
            $model = new Quesions();
            $modelsQuestion = [new LangsQuestion];
     
            $posts1375 = Yii::$app->db->createCommand('DELETE FROM  langs_question WHERE question_id='.$id)->execute();

           $modelsQuestion = Model::createMultiple(LangsQuestion::classname());
           Model::loadMultiple($modelsQuestion, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsQuestion) && $valid;



     foreach ($modelsQuestion as $modelsQuestion) {
        $modelsQuestion->question_id = $modelsQuestion->id;

        $posts455 = Yii::$app->db->createCommand('INSERT INTO langs_question (question_id,languege,question,answer_yes,answer_no1,answer_no2,one,two,three) 
        
        VALUES ('.$id.',
         "'.$modelsQuestion->languege.'",
         "'.$modelsQuestion->question.'",
         "'.$modelsQuestion->answer_yes.'",
         "'.$modelsQuestion->answer_no1.'",
         "'.$modelsQuestion->answer_no2.'",
         '.$modelsQuestion->one.',
         '.$modelsQuestion->two.',
         '.$modelsQuestion->three.')')->execute();

    

     }

     $questionId = $id;
     $image = UploadedFile::getInstance($model,'image');

     if($image!=null){
     
     $imageName = 'stu_' . $questionId . '.' . $image ->getExtension();
     $image->saveAs( Yii::getAlias('@webroot') . '/images/students/' .$imageName);

     $model ->image = $imageName;

     $model->save();

     $posts126 = Yii::$app->db->createCommand('UPDATE quesions SET image="'.$imageName.'" WHERE id='.$id)->execute();

     }else{

         $posts02 = Yii::$app->db->createCommand('SELECT * FROM quesions  WHERE id='.$id)->queryAll();

         $name = $posts02[0]['image'];

         $model->save();

         $posts126 = Yii::$app->db->createCommand('UPDATE quesions SET image="'.$name.'" WHERE id='.$id)->execute();

     }
          
        
        
            return $this->redirect(['view', 'id' => $id]);
        }

         

        return $this->render('update', [
            'model' => $model,
            'modelsQuestion' => (empty($modelsQuestion)) ? [new LangsQuestion] : $modelsQuestion
        ]);
    }

    /**
     * Deletes an existing Quesions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $connection = Yii::$app->getDb();

        try{
        $connection->createCommand()->delete('langs_question', ['question_id' => $id])->execute();
        $connection->createCommand()->delete('qeust_tags', ['qeust_id' => $id])->execute();

        }catch(Exception $e){

        }

        $this->findModel($id)->delete();


        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_mock WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_mock WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM answer_chache_practice WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  answer_chache_practice WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_mock_test WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cache_end_but_mock_test WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cache_end_but_practice WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cache_end_but_practice WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cache_question_mock WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cache_question_mock WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cache_question_practice WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cache_question_practice WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cache_quest_chap WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cache_quest_chap WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM cande_question WHERE question_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  cande_question WHERE question_id='.$id)->execute();

        }
        
        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM end_cache_mock_test WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  end_cache_mock_test WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM false_answer WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  false_answer WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM langs_question WHERE question_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  langs_question WHERE question_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM local_mock_quest WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  local_mock_quest WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM local_prac_quest WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  local_prac_quest WHERE quest_id='.$id)->execute();

        }
        
        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM qeust_tags WHERE qeust_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  qeust_tags WHERE qeust_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM quest_soc WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  quest_soc WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM quest_table_cache WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  quest_table_cache WHERE quest_id='.$id)->execute();

        }

        $posts1001 = Yii::$app->db->createCommand('SELECT * FROM true_answer WHERE quest_id='.$id)->queryAll();

        if($posts1001!=null){
            $posts1002 = Yii::$app->db->createCommand('DELETE FROM  true_answer WHERE quest_id='.$id)->execute();

        }
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quesions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quesions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quesions::find()->with('tags')->andWhere(['id'=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
