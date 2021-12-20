<?php

use soft\helpers\Html;
use soft\widget\bs4\Card;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model common\models\Reception */

?>

<?php Card::begin() ?>
<h4 class="text-info"><i class="fas fa-user"></i> Bemor: <?= $model->client->fullname ?> <i style="margin-left: 10px" class="fas fa-calendar-alt"></i> <?= date('d-m-Y') ?></h4>
<?php Card::end() ?>
<?php $form = ActiveForm::begin(); ?>
<?= Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 2,

    'attributes' => [
        'weight',
        'fever',
        'height',
        'blood_pressure',
        'complaint:ckeditor',
        'analiz_result:ckeditor',
        'diagnos:ckeditor',
        'reference:ckeditor',
    ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

