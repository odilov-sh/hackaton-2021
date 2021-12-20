<?php/* @var $this soft\web\View *//* @var $content string */use frontend\assets\AdminLte3Asset;use soft\helpers\SiteHelper;use yii\helpers\Html;AdminLte3Asset::register($this);?><?php $this->beginPage() ?><!DOCTYPE html><html lang="<?= Yii::$app->language ?>"><head>    <title><?= Html::encode($this->title) ?></title>    <meta charset="<?= Yii::$app->charset ?>">    <meta http-equiv="X-UA-Compatible" content="IE=edge">    <meta name="viewport" content="width=device-width, initial-scale=1">    <?= SiteHelper::favicon() ?>    <?= Html::csrfMetaTags() ?>    <?php $this->head() ?></head><body class="hold-transition sidebar-mini text-sm"><?php $this->beginBody() ?><div class="wrapper">    <?= $this->render('_header') ?>    <?= $this->render('_left') ?>    <?= $this->render('_content', ['content' => $content]) ?>    <?= $this->render('_footer') ?></div><?php $this->endBody() ?></body></html><?php $this->endPage() ?>