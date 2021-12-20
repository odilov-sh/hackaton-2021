<?php

use backend\models\Client;
use backend\models\DoctorType;
use backend\models\Polyclinic;
use backend\modules\regionmanager\models\Region;
use backend\modules\usermanager\models\User;
use common\models\Branch;
use kartik\widgets\DepDrop;
use soft\helpers\Html;
use soft\widget\input\VisiblePasswordInput;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;


/* @var $this soft\web\View */
/* @var $model backend\modules\usermanager\models\User */
/* @var $form ActiveForm */

$passwordHint = '';
if (!$model->isNewRecord) {
    $passwordHint = "Parolni o'zgartirish uchun bu yerga yangi parolni yozing. Ushbu maydonni bo'sh qoldirsangiz, parol o'zgarmaydi!";
}

?>

<div class="row">
    <div class="col-md-12">

        <?php $form = ActiveForm::begin(); ?>

        <!--        --><? //= $form->field($model, 'branch_id')->dropDownList(map(Branch::find()->all(), 'id', 'name')) ?>
        <?= Form::widget([
            'model' => $model,
            'form' => $form,
            'attributes' => [
                'username',
                'firstname',
                'lastname',
                'middlename',
                'phone',
                'password:widget' => [
                    'widgetClass' => VisiblePasswordInput::class,
                    'hint' => $passwordHint
                ],
                'type_id' => [
                    'type' => Form::INPUT_DROPDOWN_LIST,
                    'items' => User::types(),
                ],
                'doctor_type_id' => [
                    'type' => Form::INPUT_DROPDOWN_LIST,
                    'items' => DoctorType::map(),
                    'options' => [
                            'prompt' => '---'
                    ]
                ],
                'polyclinic_id:select2'=>[
                    'options' => [
                        'data' => Polyclinic::map(),
                    ]
                ],
                'status:radioButtonGroup' => [
                    'items' => User::statuses(),
                ],
            ]
        ]); ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
            <?= a('Bekor qilish', ['index'], ['class' => 'btn btn-warning']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
