<?php

namespace app\controllers;

use Yii;
use app\models\usuarioForm;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class UsuarioController extends Controller
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
     * Lists all usuarioForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model1 = new usuarioForm();
        $model1->id=1;
        $model1->Nombres="Andres";
        $model1->Apellidos="Roa";
        $model1->NroIdentificacion="152156465";
        $model1->empresaId=1; 

        $model2 = new usuarioForm();
        $model2->id=2;
        $model2->Nombres="carlos";
        $model2->Apellidos="Rocas";
        $model2->NroIdentificacion="152156465";
        $model2->empresaId=2; 
        $list = [];
        $list[]=$model1;
        $list[]=$model2;


        $dataProvider = new ArrayDataProvider([
            'allModels' => $list,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single usuarioForm model.
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
     * Creates a new usuarioForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new usuarioForm();

        if ($model->load(Yii::$app->request->post()) ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing usuarioForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing usuarioForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

   
     function findModel($id)
    {
        $model1 = new usuarioForm();
        $model1->id=$id;
        $model1->Nombres="Andres";
        $model1->Apellidos="Roa";
        $model1->NroIdentificacion="152156465";
        $model1->empresaId=1;        
        return $model1; 
    }
}




