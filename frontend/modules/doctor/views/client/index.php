<?php

use soft\helpers\Html;

/* @var $this soft\web\View */
/* @var $searchModel frontend\modules\doctor\models\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mijozlar';
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
<?= \soft\grid\GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{create}',
    'toolbarButtons' => [
        'create' => [
            /** @see soft\widget\button\Button for other configurations */
            'modal' => false,
            'cssClass' => 'btn btn-primary mr-2 rounded-0',
            'content' => "Yangi qo'shish"
        ]
    ],
    'bulkButtonsTemplate' => '{delete}',
    'bulkButtons' => [
        'delete' => [
            /** @see soft\widget\button\BulkButton for other configurations */
        ],
    ],
    'columns' => [
        'id',
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        //'email:email',
        //'status',
        //'created_at',
        //'updated_at',
        //'firstname',
        //'lastname',
        //'type_id',
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
