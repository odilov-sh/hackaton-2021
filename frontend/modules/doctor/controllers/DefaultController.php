<?php

namespace frontend\modules\doctor\controllers;

use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Default controller for the `doctor` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                      'allow' => true,
                      'actions' => ['error'],
                    ],
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
            'error' => [
                'class' => ErrorAction::class,
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
