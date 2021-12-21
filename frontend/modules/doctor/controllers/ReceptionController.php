<?php

namespace frontend\modules\doctor\controllers;

use Yii;
use common\models\Reception;
use common\models\search\ReceptionSearch;
use soft\web\SoftController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ReceptionController extends SoftController
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return user()->isDoctor;
                        },
                    ],
                ],
            ]
        ];
    }

    /**
    * Lists all Reception models.
    * @return mixed
    */
    public function actionIndex()
    {
        $searchModel = new ReceptionSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
    * Displays a single Reception model.
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
    * Creates a new Reception model.
    * @return string
    */
    public function actionCreate()
    {
        $client_id=Yii::$app->request->get('client_id');

        if ($client_id)
        {
            $model = new Reception();
            $model->client_id=$client_id;

            return $this->ajaxCrud->createAction($model);
        }

        else{
            not_found();
        }

    }

    /**
    * Updates an existing Reception model.
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
    * Deletes an existing Reception model.
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
    * Delete multiple existing Reception model.
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
    * @return Reception
    * @throws yii\web\NotFoundHttpException
    */
    public function findModel($id)
    {
        $model = Reception::find()->andWhere(['id' => $id])->one();
        if ($model == null){
            not_found();
        }
        return $model;
    }
}
