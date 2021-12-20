<?php

/* @var $this soft\web\View */

use common\models\Reception;
use common\models\search\ReceptionSearch;
use soft\widget\bs4\DetailView;
use yii\bootstrap4\Html;

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
<?= Html::beginForm(['client/pechat-view', 'client_id' => $model->id], 'post') ?>
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
                        <div class="col-md-6">
                            <div class="card card-white">
                                <div class="card-header">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck<?= $cleintReceprion->id ?>"
                                               name="selection[]" value="<?= $cleintReceprion->id?>">
                                        <label class="form-check-label"
                                               for="exampleCheck<?= $cleintReceprion->id ?>"><?= $cleintReceprion->createdBy->fullname ?></label>
                                        <label><i class="fas fa-calendar-alt text-primary"
                                                  style="margin-left: 10px"> <?= Yii::$app->formatter->asDate($cleintReceprion->created_at, 'dd-MM-Y') ?></i></label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <button type="submit" class="btn btn-primary">Chop etish</button>

            </div>
        </div>
    </div>
</div>
<?= Html::endForm() ?>