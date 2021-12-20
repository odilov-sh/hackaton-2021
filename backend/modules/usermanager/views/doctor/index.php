<?php

use backend\modules\usermanager\models\User;
use common\models\Branch;

/* @var $this soft\web\View */
/* @var $searchModel backend\modules\usermanager\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doktorlar';
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
            'modal' => false,
            'pjax' => false,
            'cssClass' => 'btn btn-info',
            'content' => "Yangi qo'shish",
            'icon' => 'user-plus,fas'
        ]
    ],
    'columns' => [
        [
            'attribute' => 'username',
        ],
        'firstname',
        'lastname',
        [
            'attribute' => 'type_id',
            'format' => 'raw',
            'value' => 'typeName',
//            'filter' => User::types()
        ],
        [
            'attribute' => 'status',
//            'filter' => User::statuses(),
            'format' => 'raw',
            'value' => function ($model) {
                /** @var User $model */
                return $model->statusBadge;
            }
        ],
        'created_at',
//        'updated_at',
        'actionColumn',
    ],
]); ?>
    