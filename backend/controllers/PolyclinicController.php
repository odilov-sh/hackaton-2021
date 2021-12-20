<?php

namespace backend\controllers;

use backend\modules\regionmanager\actions\DistrictsAction;
use backend\modules\regionmanager\actions\QuartersAction;
use Yii;
use backend\models\Polyclinic;
use backend\models\search\PolyclinicSearch;
use soft\web\SoftController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PolyclinicController extends SoftController
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

    public function actions()
    {
        return [
            'districts' => [
                'class' => DistrictsAction::class,
            ],
            'quarters' => [
                'class' => QuartersAction::class,
            ],
        ];
    }
    /**
    * Lists all Polyclinic models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new PolyclinicSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    * Displays a single Polyclinic model.
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
    * Creates a new Polyclinic model.
    * @return string
    */
    public function actionCreate()
    {
        $model = new Polyclinic();
        return $this->ajaxCrud->createAction($model);
    }

    /**
    * Updates an existing Polyclinic model.
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
    * Deletes an existing Polyclinic model.
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
    * Delete multiple existing Polyclinic model.
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
    * @return Polyclinic
    * @throws yii\web\NotFoundHttpException
    */
    public function findModel($id)
    {
        $model = Polyclinic::find()->andWhere(['id' => $id])->one();
        if ($model == null){
            not_found();
        }
        return $model;
    }
}
