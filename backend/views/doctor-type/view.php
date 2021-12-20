<?php


/* @var $this soft\web\View */
/* @var $model backend\models\DoctorType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Doktor turlari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= \soft\widget\bs4\DetailView::widget([
        'model' => $model,
        'panel' => $this->isAjax ? false : [],
        'attributes' => [
//              'id',
              'name', 
        ],
    ]) ?>