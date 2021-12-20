<?php


/* @var $this soft\web\View */
/* @var $model backend\models\UserBot */

$this->title = Yii::t('site', 'Create a new');
$this->params['breadcrumbs'][] = ['label' => 'User Bots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>