<?php


/* @var $this soft\web\View */
/* @var $model backend\modules\usermanager\models\User */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Doktorlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>


<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
        'username',
        'firstname',
        'lastname',
        'middlename',
        'phone',
        'typeName',
        'status:status',
        'created_at',
        'updated_at',
    ],
]) ?>