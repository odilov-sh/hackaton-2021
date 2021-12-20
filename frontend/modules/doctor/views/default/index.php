<?php

use soft\helpers\Url;

?>
<div class="card">
    <div class="card-header">
        <h5 class="m-0"><span class="text-primary"><i
                        class="fas fa-user-md"> Doktor: <?= Yii::$app->user->identity->fullname ?? '' ?>
                </span></i></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">

                        <p>Bemorlar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= Url::to(['/doctor/client']) ?>" class="small-box-footer">
                        Bemorlar
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Qabullar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="<?= Url::to(['/doctor/reception']) ?>"
                       class="small-box-footer">
                        Qabullar
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>Mening bemorlarim</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= Url::to(['/doctor/client/my-client']) ?>"
                       class="small-box-footer">Mening bemorlarim <i
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