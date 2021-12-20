<?php

/* @var $this soft\web\View */

use common\models\Reception;
use common\models\search\ReceptionSearch;
use soft\widget\bs4\DetailView;

/* @var $model frontend\modules\doctor\models\Client */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Bemorlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$searchModel = new ReceptionSearch();

$query = Reception::find()
    ->andWhere(['client_id' => $model->id]);

$dataProvider = $searchModel->search($query);

$cleintReceprions = $dataProvider->models;

?>

<?= DetailView::widget([
    'model' => $model,
    'panel' => $this->isAjax ? false : [],
    'attributes' => [
        'firstname',
        'lastname',
        'middlename',
        'date_of_birth:date',
        'passport',
        'created_at',
        'updated_at',
    ],
]) ?>
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
                <h5 class="text-center text-info"><i class="fas fa-clipboard-list"> Bemorning tahlil natijalari</i> <br><i
                            style="margin-left: 10px" class="fas fa-user"> Bemor: <?= $model->fullname ?></i></h5>
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
                                Nomi
                                <span class="text-sm" style="margin-left: 10px"><i
                                            class="fas fa-calendar-alt"> 12-12-2021</i></span>
                                <br>
                                <i class="fas fa-user-md text-primary"
                                   style="margin-left: 5px">&nbsp;&nbsp;Doktor full name</i>
                            </span>
                                <!-- card tools -->
                                <div class="card-tools" style="margin-top: -20px">
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
                                        <td>1</td>
                                        <td>
                                            <b> <span class="text-sm"> Nomi</span></b><br>

                                            <span class="text-sm">salom</span>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>