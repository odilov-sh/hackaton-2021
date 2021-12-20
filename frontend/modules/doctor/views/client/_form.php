<?php

use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;
use soft\widget\adminlte3\Card;

/* @var $this soft\web\View */
/* @var $model frontend\modules\doctor\models\Client */

?>

<?php Card::begin()  ?>

<h4 align="center" class="text-primary"> <i class="fas fa-user"></i> Yangi mijoz qo'shish</h4>

<?php $form = ActiveForm::begin(); ?>

<?= Form::widget([
    'model' => $model,
    'form' => $form,
    'initCard' => false,
    'columns' => 2,
    'attributes' => [
        'username',
        'status',
        'firstname',
        'lastname',
        'type_id',
    ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

<?php Card::end()  ?>
