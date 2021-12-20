<?php

/* @var $this soft\web\View */

use soft\helpers\Url;

$this->title = Yii::$app->name;

?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">

                        <p>Doktorlar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <a href="<?= Url::to(['/usermanager/doctor/index']) ?>" class="small-box-footer">
                        Doktorlar
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Doktor turlari</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-star-of-life"></i>
                    </div>
                    <a href="<?= Url::to(['/doctor-type']) ?>"
                       class="small-box-footer">
                        Doktor turlari
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Poliklinikalar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hospital-user"></i>
                    </div>
                    <a href="<?= Url::to(['/polyclinic']) ?>"
                       class="small-box-footer">Poliklinikalar <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>Hududlar bo'yicha</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                    <a href="<?= Url::to(['/doctor/client/my-client']) ?>"
                       class="small-box-footer">Mening bemorlarim <i
                                class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
