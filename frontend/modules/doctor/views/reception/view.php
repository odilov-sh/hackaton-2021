<?php


/* @var $this soft\web\View */
/* @var $model common\models\Reception */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Receptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= \soft\widget\bs4\DetailView::widget([
        'model' => $model,
        'panel' => $this->isAjax ? false : [],
        'attributes' => [
              'id', 
              'client_id', 
              'weight', 
              'fever', 
              'height', 
              'blood_pressure', 
              'complaint', 
              'analiz_result', 
              'diagnos', 
              'created_by', 
              'updated_by', 
              'created_at', 
              'updated_at', 
        ],
    ]) ?>