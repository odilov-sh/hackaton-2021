<?php

use soft\grid\GridView;
use soft\helpers\Html;
use soft\helpers\Url;

/* @var $this soft\web\View */
/* @var $searchModel frontend\modules\doctor\models\search\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mijozlar';
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
<?= GridView::widget([
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
    'columns' => [
        'firstname',
        'lastname',
        'middlename',
        'date_of_birth:date',
        'passport',
        'actionColumn' =>
            [
                'template' => '{client} {view} {update} {delete}',
                'buttons' =>
                    [
                        'client' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-notes-medical"></i>', [Url::to(['reception/create', 'client_id' => $model->id])], [
                                'title' => 'Qabul',
                                'data-pjax' => '0'
                            ]);
                        }
                    ],
            ],
    ],
]); ?>
