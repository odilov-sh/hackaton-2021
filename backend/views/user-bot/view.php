<?php


/* @var $this soft\web\View */
/* @var $model backend\models\UserBot */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Bots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= \soft\widget\bs4\DetailView::widget([
        'model' => $model,
        'panel' => $this->isAjax ? false : [],
        'attributes' => [
              'id', 
              'user_id', 
              'first_name', 
              'username', 
              'step', 
              'created_at', 
              'updated_at', 
        ],
    ]) ?>