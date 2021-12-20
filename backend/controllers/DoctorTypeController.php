<?php

namespace backend\controllers;

use Yii;
use backend\models\DoctorType;
use backend\models\search\DoctorTypeSearch;
use soft\web\SoftController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DoctorTypeController extends SoftController
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
                    'bulk-delete' => ['POST'],
                ],
            ],
            /*'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]*/
        ];
    }

    /**
    * Lists all DoctorType models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new DoctorTypeSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    * Displays a single DoctorType model.
    * @param integer $id
    * @return string
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->ajaxCrud->viewAction($model);
    }

    /**
    * Creates a new DoctorType model.
    * @return string
    */
    public function actionCreate()
    {
        $model = new DoctorType();
        return $this->ajaxCrud->createAction($model);
    }

    /**
    * Updates an existing DoctorType model.
    * @param integer $id
    * @return string
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        return $this->ajaxCrud->updateAction($model);
    }

    /**
    * Deletes an existing DoctorType model.
    * @param integer $id
    * @return mixed
    * @throws NotFoundHttpException if the model cannot be found
    */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->ajaxCrud->closeModalResponse();
    }

    /**
    * Delete multiple existing DoctorType model.
    * @param integer $id
    * @return mixed
    */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }
        return $this->ajaxCrud->closeModalResponse();
    }

    /**
    * Finds a single model for crud actions
    * @param $id
    * @return DoctorType
    * @throws yii\web\NotFoundHttpException
    */
    public function findModel($id)
    {
        $model = DoctorType::find()->andWhere(['id' => $id])->one();
        if ($model == null){
            not_found();
        }
        return $model;
    }
}
