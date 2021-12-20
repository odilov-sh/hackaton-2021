<?php

use yii\helpers\Html;

/* @var $this soft\web\View */
/* @var $model common\models\Reception */

$this->title = Yii::t('site', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qabul'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

