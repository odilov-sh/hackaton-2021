<?php

namespace frontend\modules\doctor\controllers;

use yii\web\Controller;
use yii\web\ErrorAction;

/**
 * Default controller for the `doctor` module
 */
class DefaultController extends Controller
{

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
