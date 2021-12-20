<?php

use backend\modules\regionmanager\models\District;
use backend\modules\regionmanager\models\Region;
use kartik\widgets\DepDrop;
use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model backend\models\Polyclinic */

?>


<?php $form = ActiveForm::begin(); ?>

<?= Form::widget([
    'model' => $model,
    'form' => $form,
    'attributes' => [
        'name',
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

                ],
                'data' => District::mapByRegionId($model->region_id),
            ]
        ],
        'address',
        'map',
    ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

