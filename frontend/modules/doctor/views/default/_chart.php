<?php

/** @var \soft\web\View $this */
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- DONUT CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Viloyatlar bo'yicha ro'yhatga olingan bermorlar soni</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

<?php

$regions = \backend\modules\regionmanager\models\Region::find()
    ->all();

$regionNames = [];
$regionColors = ['#f94144', '#4cc9f0', '#f3722c', '#4895ef', '#4361ee', '#f8961e', '#3f37c9', '#f9844a', '#3a0ca3', '#f9c74f', '#480ca8', '#90be6d', '#43aa8b', '#4d908e'];
$regionCount = [];
foreach ($regions as $region) {

    $regionNames[] = $region->name_uz;
    $regionCount[] = $region->getRegionClientCount();
}
$regionNames = json_encode($regionNames);
$regionColors = json_encode($regionColors);
$regionCount = json_encode($regionCount);
$js = <<<JS
    $(function () {
      
        
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
            labels: $regionNames,
            datasets: [
                {
                    data: $regionCount,
                    backgroundColor : $regionColors,
                }
            ]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

     

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
JS;

$this->registerJs($js);

?>