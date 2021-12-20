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
    'columns' => [
        'firstname',
        'lastname',
        'middlename',
        [
            'attribute' => 'date_of_birth',
            'label' => "Tug'ilgan sana",
            'width' => '120px',
            'value' => function ($data) {
                return date('Y.m.d', $data->date_of_birth);
            },
            'filterInputOptions'=>[
                'placeholder' => 'YYYY.OO.KK',
                'class' => 'form-control'
            ]

        ],
        'passport',
        'actionColumn' => [

        ],
    ],
]); ?>
