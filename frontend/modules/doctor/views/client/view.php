<?php

/* @var $this soft\web\View */

use common\models\Reception;
use common\models\search\ReceptionSearch;
use soft\widget\bs4\DetailView;
use yii\bootstrap4\LinkPager;

/* @var $model frontend\modules\doctor\models\Client */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Bemorlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$searchModel = new ReceptionSearch();

$query = Reception::find()
    ->andWhere(['client_id' => $model->id]);

$dataProvider = $searchModel->search($query);

$cleintReceprions = $dataProvider->models;

$pages = $dataProvider->pagination;

?>

<?= DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
        'fio',
        'date_of_birth:date',
        'passport',
//        'created_at',
//        'updated_at',
    ],
]) ?>
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
                <h5 class="text-center text-info"><i class="fas fa-clipboard-list"> Bemorning tahlil natijalari</i></h5>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <?php foreach ($cleintReceprions as $cleintReceprion): ?>
                        <div class="col-6">
                            <div class="card bg-gradient-default collapsed-card">
                                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                            <span class="card-titl text-sm">
                                <span class="text-sm" style="margin-left: 10px"><i
                                            class="fas fa-calendar-alt"> <?= Yii::$app->formatter->asDate($cleintReceprion->created_at, 'd-M-Y') ?></i></span>
                                <i class="fas fa-user-md text-primary"
                                   style="margin-left: 5px">&nbsp;&nbsp;<?= $cleintReceprion->createdBy0->fullname ?></i>
                            </span>
                                    <!-- card tools -->
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                                title="Collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>

                                <div class="card-body" style="display: none;">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><b>Nomi</b></td>
                                            <td>
                                                <b> <span class="text-sm">Qiymati</span></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Og'irligi</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->weight ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Harorati</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->fever ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Bo'yi</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->height ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Qon bosimi</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->blood_pressure ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Bemor shikoyati</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->complaint ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Analiz natijalari</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->analiz_result ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tashxis</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->diagnos ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Shifokor tavsiyasi</b></td>
                                            <td>
                                                <span class="text-sm"><?= $cleintReceprion->reference ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php echo LinkPager::widget([
                        'pagination' => $pages,
                    ]); ?>
                </div>
            </div>
        </div>

    </div>
</div>
