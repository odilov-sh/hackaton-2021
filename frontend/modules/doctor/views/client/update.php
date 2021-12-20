<?php

use yii\helpers\Html;

/* @var $this soft\web\View */
/* @var $model frontend\modules\doctor\models\Client */

$this->title = Yii::t('site', 'Update');
$this->params['breadcrumbs'][] = ['label' => 'Bemorlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

