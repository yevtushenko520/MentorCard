<?php

namespace backend\controllers;

use Yii;
use app\models\FrontendComment;
use backend\models\FrontendCommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FrontendCommentController implements the CRUD actions for FrontendComment model.
 */
class FrontendCommentController extends Controller
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
     * Lists all FrontendComment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendCommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrontendComment model.
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
     * Creates a new FrontendComment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendComment();

        if ($model->load(Yii::$app->request->post())) {

            $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
            $questionId = $randomString;
            $image = UploadedFile::getInstance($model,'image');

            if($image!=null){
            
            $imageName = 'stu_' . $questionId . '.' . $image ->getExtension();
            $image->saveAs(Yii::getAlias('@webroot') . '/images/students/' .$imageName);

            $model ->image = $imageName;

            }
             
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FrontendComment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $length = 6;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }

            $questionId = $randomString;
            $image = UploadedFile::getInstance($model,'image');

            if($image!=null){
            
            $imageName = 'stu_' . $questionId . '.' . $image ->getExtension();
            $image->saveAs( Yii::getAlias('@webroot') . '/images/students/' .$imageName);

            $model ->image = $imageName;

            $model->save();

            $posts126 = Yii::$app->db->createCommand('UPDATE frontend_comment SET image="'.$imageName.'" WHERE id='.$id)->execute();

            }else{

                $posts02 = Yii::$app->db->createCommand('SELECT * FROM frontend_comment  WHERE id='.$id)->queryAll();

                $name = $posts02[0]['image'];

                $model->save();

                $posts126 = Yii::$app->db->createCommand('UPDATE frontend_comment SET image="'.$name.'" WHERE id='.$id)->execute();

            }
            
            

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FrontendComment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FrontendComment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendComment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FrontendComment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
