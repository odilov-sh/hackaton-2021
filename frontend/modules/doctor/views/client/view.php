<?php


/* @var $this soft\web\View */
/* @var $model frontend\modules\doctor\models\Client */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= \soft\widget\bs4\DetailView::widget([
        'model' => $model,
        'panel' => $this->isAjax ? false : [],
        'attributes' => [
              'id',
              'username',
              'auth_key',
              'password_hash',
              'password_reset_token',
              'email',
              'status',
              'created_at',
              'updated_at',
              'firstname',
              'lastname',
              'type_id',
        ],
    ]) ?>
