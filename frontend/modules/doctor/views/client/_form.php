<?php

use backend\modules\regionmanager\models\Region;
use common\models\User;
use kartik\depdrop\DepDrop;
use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;
use soft\widget\adminlte3\Card;

/* @var $this soft\web\View */
/* @var $model frontend\modules\doctor\models\Client */


$districts = [];

if (!empty($model->district_id)){

}

?>

<?php Card::begin() ?>

<h4 align="center" class="text-primary"><i class="fas fa-user"></i> Yangi mijoz qo'shish</h4>

<?php $form = ActiveForm::begin(); ?>

<?= Form::widget([
    'model' => $model,
    'form' => $form,
    'initCard' => false,
    'columns' => 3,
    'attributes' => [
        'firstname',
        'lastname',
        'middlename',
        'passport',
        'date_of_birth:date',
        'phone:phone',
        'region_id:select2' => [
            'options' => [
                'data' => Region::map(),
                'options' => [
                    'id' => 'region-id'
                ]
            ]

        ],
        'district_id:widget' => [
            'widgetClass' => DepDrop::class,
            'options' => [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => [
                    'id' => 'district-id',
                    'placeholder' => 'Tuman/shaharni tanlang...',
                    'required' => true,
                ],
                'pluginOptions' => [
                    'depends' => ['region-id'],
                    'url' => to(['districts']),
                    'placeholder' => 'Tuman/shaharni tanlang...',
                ]
            ]
        ],
        'quarter_id:widget' => [
            'widgetClass' => DepDrop::class,
            'options' => [
                'type' => DepDrop::TYPE_SELECT2,
                'options' => [
                    'id' => 'quarter-id',
                    'placeholder' => 'Hududni tanlang...',
                    'required' => true,
                ],
                'pluginOptions' => [
                    'depends' => ['district-id'],
                    'url' => to(['quarters']),
                    'placeholder' => 'Hududni tanlang...',
                ]
            ]
        ],
        'street',
        'house_number',
        'gender_id:dropdownList' => [
            'items' => User::genders(),
            'options' => [
                'prompt' => 'Tanlang...'
            ]
        ]
    ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

<?php Card::end() ?>
