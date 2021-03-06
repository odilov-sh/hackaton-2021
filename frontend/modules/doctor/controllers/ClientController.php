<?php

namespace frontend\modules\doctor\controllers;

use backend\modules\regionmanager\actions\DistrictsAction;
use backend\modules\regionmanager\actions\QuartersAction;
use backend\modules\regionmanager\models\District;
use backend\modules\regionmanager\models\search\DistrictSearch;
use backend\modules\regionmanager\models\search\RegionSearch;
use common\models\Reception;
use common\models\search\ReceptionSearch;
use http\Client\Curl\User;
use Yii;
use frontend\modules\doctor\models\Client;
use frontend\modules\doctor\models\search\ClientSearch;
use soft\web\SoftController;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ClientController extends SoftController
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

    //<editor-fold desc="CRUD" defaultstate="collapsed">

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->ajaxCrud->viewAction($model);
    }

    /**
     * Creates a new User model.
     * @return string
     * @throws \Exception
     */
    public function actionCreate()
    {
        $model = new Client();
        $model->scenario = Client::SCENARIO_DOCTOR_FORM;
        $model->doctor_id = Yii::$app->user->getId();
        $model->type_id = Client::TYPE_CLIENT;
        if ($this->modelSave($model)) {
            return $this->redirect(['client/view', 'id' => $model->id]);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Client::SCENARIO_DOCTOR_FORM;
        if ($this->modelSave($model)) {
            return $this->redirect(['client/view', 'id' => $model->id]);
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing User model.
     * @param integer $id
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->ajaxCrud->closeModalResponse();
    }

    /**
     * Finds a single model for crud actions
     * @param $id
     * @return Client
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */
    public function findModel($id)
    {
        $model = Client::find()->andWhere(['id' => $id])->one();
        if ($model == null) {
            not_found();
        }
        return $model;
    }


    //</editor-fold>

    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionPechat($id)
    {
        $model = $this->findModel($id);
        return $this->render('pechat', ['model' => $model]);
    }

    public function actionPechatView($client_id)
    {
        $client = $this->findModel($client_id);
        $receptions = Yii::$app->request->post('selection');
        if (empty($client) || empty($receptions)) {

            throw new ForbiddenHttpException(Yii::t('app', 'The requested action does not exist.'));
        }
        return $this->render('pechat_view', [
            'client' => $client,
            'receptions' => $receptions
        ]);
    }

    public function actionMyClient()
    {

        $searchModel = new ClientSearch();

        $query = Client::find()
            ->andWhere(['doctor_id' => Yii::$app->user->id]);

        $dataProvider = $searchModel->search($query);

        return $this->render('my_client', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRegion()
    {
        $searchModel = new RegionSearch();
        $dataProvider = $searchModel->search();

        return $this->render('_region', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDistrict()
    {
        $id = Yii::$app->request->get('id');

        $searchModel = new DistrictSearch();
        $query = District::find()
            ->andWhere(['region_id' => $id]);

        $dataProvider = $searchModel->search($query);

        return $this->render('_district', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDistrictClient()
    {
        $district_id = Yii::$app->request->get('id');

        $searchModel = new ClientSearch();

        $query = Client::find()
            ->andWhere(['district_id' => $district_id]);

        $dataProvider = $searchModel->search($query);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionWord($id)
    {
        $section = Yii::$app->request->get('section');
        $model = $this->findModel($id);
        return $model->downloadWord($section);
    }
}
