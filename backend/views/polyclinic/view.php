<?php


/* @var $this soft\web\View */
/* @var $model backend\models\Polyclinic */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Poliklinikalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
//              'id',
        'name',
        [
            'attribute' => 'region.name',
            'label' => 'Viloyat nomi'
        ],
        [
            'attribute' => 'district.name',
            'label' => 'Tuman nomi'
        ],
        'address',
        [
            'attribute' => 'map',
            'format' => 'raw',
        ]
    ],
]) ?>