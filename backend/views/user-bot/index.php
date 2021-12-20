<?php

use soft\helpers\Html;

/* @var $this soft\web\View */
/* @var $searchModel backend\models\search\UserBotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Bots';
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
    <?= \soft\grid\GridView::widget([
        'id' => 'crud-datatable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'toolbarTemplate' => '{create}{refresh}',
        'toolbarButtons' => [
            'create' => [
                /** @see soft\widget\button\Button for other configurations */
                'modal' => true,
            ]
        ],
        'bulkButtonsTemplate' => '{delete}',
        'bulkButtons' => [
            'delete' => [
                /** @see soft\widget\button\BulkButton for other configurations */
            ],
        ],
        'cols' => [
                    'id',
            'user_id',
            'first_name',
            'username',
            'step',
            //'created_at',
            //'updated_at',
            'actionColumn' => [
                'viewOptions' => [
                    'role' => 'modal-remote',
                ],
                'updateOptions' => [
                    'role' => 'modal-remote',
                ],
            ],
        ],
        ]); ?>
    