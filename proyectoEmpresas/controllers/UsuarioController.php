<?php

namespace app\controllers;

use Yii;
use app\models\usuarioForm;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use SoapClient;
use stdClass;
use yii\helpers\VarDumper;
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

        $list = [];
        $client = Yii::$app->WSUsuarios;               
        $result = $client->getUsuarios();

        if(property_exists($result,"getUsuariosResult"))
        {
            $usuarios = $result->getUsuariosResult->UsuarioDTO;
            
            foreach ($usuarios as $usuario) {
                $i=$usuario->Id;
                $model1 = new usuarioForm();
                $model1->id=$usuario->Id;
                $model1->Nombres=$usuario->Nombres;
                $model1->Apellidos=$usuario->Apellidos;
                $model1->NroIdentificacion=$usuario->Identificacion;
                $model1->empresaId=$usuario->EmpresaId;    
               $list+=["$i"=>$model1];
            }

            $dataProvider = new ArrayDataProvider([
                'allModels' => $list,
            ]);
    
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        // throw new NotFoundHttpException();

       
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

            $client = Yii::$app->WSUsuarios;

            $params = array('usuario' => array(
                'Id' => intval( $model->id),
                'Nombres' => $model->Nombres,
                'Apellidos' =>  $model->Apellidos,
                'Identificacion' => $model->NroIdentificacion,
                'EmpresaId' => intval($model->empresaId),
                )
            );  

            $result = $client->insert($params);
            if(property_exists($result,"insertResult"))
            {
                $id = $result->insertResult;
                
                return $this->redirect(['view', 'id' =>$id]);
            }
              throw new NotFoundHttpException();
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

            $client = Yii::$app->WSUsuarios;

            $params = array('usuario' => array(
                'Id' => intval( $model->id),
                'Nombres' => $model->Nombres,
                'Apellidos' =>  $model->Apellidos,
                'Identificacion' => $model->NroIdentificacion,
                'EmpresaId' => intval($model->empresaId),
                )
            );  

            $result = $client->update($params);
            if(property_exists($result,"updateResult"))
            {
                $exito = $result->updateResult;
                
                return $this->redirect(['view', 'id' => $model->id]);
            }
            throw new NotFoundHttpException();
            
           
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

            $client = Yii::$app->WSUsuarios;
            $params = new stdClass();
            $params->id = $id;
            $result = $client->delete($params);
            if(property_exists($result,"deleteResult"))
            {
                $exito = $result->deleteResult;
                
                return $this->redirect(['index']);
            }
            throw new NotFoundHttpException();
    }

   
     function findModel($id)
    {
        

        $client = Yii::$app->WSUsuarios;
        $params = new stdClass();
        $params->id = $id;
        $result = $client->getUsuarioById($params);
        if(property_exists($result,"getUsuarioByIdResult"))
        {
            $usuario = $result->getUsuarioByIdResult;
            $model1 = new usuarioForm();
            $model1->id=$usuario->Id;
            $model1->Nombres=$usuario->Nombres;
            $model1->Apellidos=$usuario->Apellidos;
            $model1->NroIdentificacion=$usuario->Identificacion;
            $model1->empresaId=$usuario->EmpresaId;        
            return $model1; 
        }
        throw new NotFoundHttpException();
       
        


/*
        
         echo '<br>
         <br><br><br><br><br><br><br>
         <pre>';
         VarDumper::dump($simpleresult);
         echo '</pre>';
       
*/
        
    }
}




