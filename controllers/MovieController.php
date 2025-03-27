<?php

namespace app\controllers;

use app\models\Movie;
use app\models\MovieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;
use yii\web\UploadedFile;

/**
 * MovieController implements the CRUD actions for Movie model.
 */
class MovieController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Movie models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MovieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movie model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Movie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {   
        $model = new Movie();

        if ($this->request->isPost && $model->load($this->request->post())) {
            Yii::debug('Ha entrado al POST');
            $model->fileImage = UploadedFile::getInstance($model, 'fileImage');


            // Yii::debug('Datos recibidos: ' . json_encode($model->attributes)); // Verifica si los datos llegan
            // Yii::debug('Archivo recibido: ' . json_encode($model->fileImage, JSON_PRETTY_PRINT), 'application');

            if (!$model->fileImage) {
                Yii::$app->session->setFlash('error', 'No file received.');
                Yii::debug('No file received.', 'upload'); // Agrega debug para el error
                return;
            }

            // if (isset($_FILES['Movie']['name']['image']) && $_FILES['Movie']['name']['image'] != '') {
            //     Yii::debug('Imagen subida: ' . $_FILES['Movie']['name']['image']);
            //     Yii::debug('Imagen cargada:', ['image' => $model->image]);
            // } else {
            //     Yii::debug('No se ha subido ninguna imagen.');
            // }

            if ($model->validate()) {
                Yii::debug('Datos validados correctamente');
            } else {
                // Mostrar los errores que no pasaron la validación
                Yii::debug('Errores de validación: ' . json_encode($model->errors));
            }
        //
            if ($model->validate()) {
                Yii::debug('Datos validados correctamente');
                $this->uploadImage($model);
                
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'An error ocurred saving the Movie.');
                }

            }
            
            // if ($model->load($this->request->post()) && $model->save()) {
            //     return $this->redirect(['view', 'id' => $model->id]);
            // }
        } 
        // else {
        //     $model->loadDefaultValues();
        // }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Movie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Movie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Movie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Movie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movie::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function uploadImage($model) {
        

        if($model->fileImage) {
            $filePath = Yii::getAlias('@webroot/uploads/') .  $model->fileImage->baseName . '.' . $model->fileImage->extension;
            if ($model->fileImage->saveAs($filePath)) {
                $model->image = 'uploads/' . $model->fileImage->baseName . '.' . $model->fileImage->extension;;
            } else {
                Yii::$app->session->setFlash('error', 'Failed to upload the image.');
            }
        }
    }
}
