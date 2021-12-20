<?php

/* @var $this soft\web\View */
/* @var $model frontend\modules\doctor\models\Client */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mijozlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
        'firstname',
        'lastname',
        'middlename',
        'date_of_birth:date',
        'passport',
        'created_at',
        'updated_at',
    ],
]) ?>
