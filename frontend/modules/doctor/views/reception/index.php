<?php

use soft\helpers\Html;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\ReceptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qabul');
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
    <?= \soft\grid\GridView::widget([
        'id' => 'crud-datatable',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'toolbarTemplate' => '{create}{refresh}',
        'toolbarButtons' => [
            'create' =>false,
        ],
        'bulkButtonsTemplate' => '{delete}',
        'bulkButtons' => [
            'delete' => [
                /** @see soft\widget\button\BulkButton for other configurations */
            ],
        ],
        'columns' => [
            'id',
            'client_id',
            'weight',
            'fever',
            'height',
            //'blood_pressure',
            //'complaint:ntext',
            //'analiz_result:ntext',
            //'diagnos:ntext',
            //'created_by',
            //'updated_by',
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
    