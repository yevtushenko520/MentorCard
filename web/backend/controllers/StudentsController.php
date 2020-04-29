<?php

namespace backend\controllers;

use Yii;
use  backend\models\Students;
use app\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use app\models\Langs;


/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
{

    public $cu_id;
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    /**
     * Displays a single Students model.
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
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function getAuthKey()
    {
        return $this->auth_key1;
    }

    public function actionCreate()
    {
        $model = new Students();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            
            $article = new User;
            $article->username = $model->email;
            $article->auth_key = Yii::$app->security->generateRandomString();
            $article->password_hash = Yii::$app->security->generatePasswordHash($model->password);
            $article->email = $model->email;
            $article->role = 4;
            $article->insert();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $posts02 = Yii::$app->db->createCommand('SELECT * FROM students  WHERE id='.$id)->queryAll();

            $id_res = $posts02[0]['res_id'];

            if($model->sex!=null){
                $posts126 = Yii::$app->db->createCommand('UPDATE students SET gender="'.$model->sex.'" WHERE id='.$id)->execute();
            }

           $model->save();

           $posts126 = Yii::$app->db->createCommand('UPDATE students SET res_id='.$id_res.' WHERE id='.$id)->execute();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

   $connection = Yii::$app->getDb();
   $command = $connection->createCommand("
    SELECT username FROM students
    WHERE id = '$id'
    ");

   $result = $command->queryAll(); 
    
    foreach ($result as $row) {

        $cu_id = $row['username'];
    }
    
    $connection->createCommand()->delete('user', ['username' => $cu_id])->execute();
 
    $connection->createCommand()->delete('stud_langs_stud', ['stud_id' => $id])->execute();

    $connection->createCommand()->delete('stud_langs_write', ['student_id' => $id])->execute();

    $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::find()->with('langs')->andWhere(['id'=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
