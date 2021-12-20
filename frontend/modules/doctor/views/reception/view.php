<?php


/* @var $this soft\web\View */

/* @var $model common\models\Reception */

use common\models\Reception;
use soft\widget\bs4\DetailView;

$this->title = $model->client->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qabul'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
//        'id',
        [
            'attribute' => 'client.fullname',
            'format' => 'raw',
            'label' => 'Bemor F.I.SH'
        ],
        'weight',
        'fever',
        'height',
       [
           'attribute' =>  'blood_pressure',
           'format' => 'raw'
       ],
        //'complaint',
        [
            'attribute' => 'complaint',
            'value' => function (Reception $model) {
                return strip_tags($model->complaint);
            }
        ],
        [
            'attribute' => 'analiz_result',
            'value' => function (Reception $model) {
                return strip_tags($model->analiz_result);
            }
        ],
        [
            'attribute' => 'diagnos',
            'value' => function (Reception $model) {
                return strip_tags($model->diagnos);
            }
        ],
        [
            'attribute' => 'created_by',
            'value' => function (Reception $model) {
                return $model->createdBy->username;
            }
        ],
        [
            'attribute' => 'updated_by',
            'value' => function (Reception $model) {
                return $model->updatedBy->username;
            }
        ],
        'created_at:date',
        'updated_at:date',
    ],
]) ?>