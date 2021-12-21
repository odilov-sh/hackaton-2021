<?php

/* @var $this View */

/* @var $content string */

use common\models\LoginForm;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use soft\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;

AppAsset::register($this);

$model = new LoginForm();
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body data-vide-bg="media/video/bgVideo">
    <?php $this->beginBody() ?>

    <div id="preloader">
        <div id="loader"></div>
    </div>


    <div class="nav">
        <div class="my-container">'
            <a href="<?= Url::base(['/']) ?>" class="logo">
                <img src="/template/login_page/img/svg/logo.svg">
                <h2>ISoft <span>medical</span></h2>
            </a>
            <a href="tel:+998888657777" class="phone">
                <img src="/template/login_page/img/svg/phone.svg">
                <div class="text">
                    <p>Call Center</p>
                    <h2>+998 88 865 77 77</h2>
                </div>
            </a>
        </div>
    </div>

    <div class="login">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="login-top">
            <h3>Shaxsiy kabinet</h3>
        </div>
        <div class="login-main">
            <div class="wrapper">
                <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Login'])->label(false) ?>
                <img src="/template/login_page/img/svg/user.svg">
            </div>
            <div class="wrapper">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => 'Parol'])->label(false) ?>
                <img src="/template/login_page/img/svg/lock.svg" alt="">
            </div>
            <div class="wrapper check">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Eslab qolish') ?>
                <!--                <label class="form-check-label" for="exampleCheck1">Eslab qolish</label>-->
            </div>
            <?= Html::submitButton('Kirish', ['class' => 'form-btn']) ?>

        </div>
        <?php ActiveForm::end(); ?>
    </div>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
