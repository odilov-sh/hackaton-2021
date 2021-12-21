<?php

namespace frontend\modules\doctor;

use soft\helpers\SiteHelper;
use Yii;
use yii\web\ErrorHandler;

/**
 * doctor module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\doctor\controllers';

    public function init()
    {
        parent::init();

        $config = require(__DIR__ . '/config/main.php');

        Yii::configure(Yii::$app, $config);

        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        Yii::$app->set('errorHandler', $handler);
        $handler->register();

    }

}
