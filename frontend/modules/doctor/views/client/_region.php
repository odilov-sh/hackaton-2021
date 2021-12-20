<?php


/* @var $this View */

use backend\modules\regionmanager\models\Region;
use backend\modules\regionmanager\models\search\RegionSearch;
use soft\grid\GridView;
use soft\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\web\View;

/* @var $searchModel \common\models\search\RegionSearch */
/* @var $dataProvider ActiveDataProvider */

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
            'value' => static function (Region $model) {
                return Html::a($model->name_uz, ['client/district', 'id' => $model->id],['data-pjax' => "0"]);
            }
        ],
        [
            'attribute' => 'regionClientCount',
            'label' => 'Bemorlar soni',
            'format' => 'raw',
        ],
    ],
]); ?>