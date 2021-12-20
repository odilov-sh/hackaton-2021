<?php


/* @var $this \yii\web\View */

use backend\modules\regionmanager\models\District;
use soft\grid\GridView;
use yii\bootstrap4\Html;

$this->title = "Hududlar bo'yicha";
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>

<?= GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{create}',
    'toolbarButtons' => [
        'create' => false
    ],
    'columns' => [
        [
            'attribute' => 'name_uz',
            'format' => 'raw',
            'value' => static function (District $model) {
                return Html::a($model->name_uz, ['client/district-client', 'id' => $model->id], ['data-pjax' => "0"]);
            }
        ],
        [
            'attribute' => 'districtClientCount',
            'label' => 'Bemorlar soni',
            'format' => 'raw',
        ],
    ],
]); ?>