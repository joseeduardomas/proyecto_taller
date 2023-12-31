<?php

namespace app\controllers;

use app\models\usuario\Usuario;
use app\models\usuario\UsuarioSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index','create', 'update', 'view', 'delete',
                                'index-modificado'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
     * Lists all Usuario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Usuario models.
     *
     * @return string
     */
    public function actionIndexModificado()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index_modificado', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuario();
        $model->status = Usuario::STATUS_ACTIVO;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //PONEMOS EN MINUSCULA EL NOMBRE DE USUARIO PARA QUE SEA MAS FACIL VALIDAR POSTERIORMENTE
                $model->username = mb_strtolower($model->username, 'UTF-8');

                $password_actual = $model->password;
                $password_encriptada = md5($password_actual);

                //DONDE SE ASIGNA = VALOR ASIGNADO.
                //PARA ACCEDER A ELEMENTOS SE USA LA FLECHITA - >
                $model->password = $password_encriptada;

                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //Contraseña tal cual esta en la BASE DE DATOS
        $password_antigua = $model->password;

        if ($this->request->isPost && $model->load($this->request->post())) {
            //PONEMOS EN MINUSCULA EL NOMBRE DE USUARIO PARA QUE SEA MAS FACIL VALIDAR POSTERIORMENTE
            $model->username = mb_strtolower($model->username, 'UTF-8');

            //Contraseña que le pasamos a travez del formulario
            $password_actual = $model->password;
            //Se compara si el campo es diferente, en caso de ser así se tendrá que volver a encriptar
            //Porque se considera una nueva contraseña
            $esDiferenteLaContra = $password_antigua != $password_actual;

            if($esDiferenteLaContra) {
                $password_encriptada = md5($password_actual);
                $model->password = $password_encriptada;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        //Si esta activo, si actualmente esta en 1 la bandera se cambia a 0
        if($model->isActivo()){
            $model->status = Usuario::STATUS_INACTIVO;
        } else {
            $model->status = Usuario::STATUS_ACTIVO;
        }
        $model->save();

        return $this->redirect(['usuario/index-modificado']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
