<?php


/* @var $this View */
/* @var $client Client */

/* @var $receptions */

use common\models\Reception;
use frontend\modules\doctor\models\Client;
use soft\helpers\PhoneHelper;
use soft\widget\bs4\Card;
use yii\helpers\Url;
use yii\web\View;

?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-8" id="printThisArea">
        <?php soft\widget\bs4\Card::begin() ?>
        <?=$client->getWordView($receptions)?>
        <?php Card::end() ?>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-app" href="javascript:void(0);" id="printButton">
                    <i class="fa fa-print"></i> Chop etish
                </a>
                <a class="btn btn-app" href="<?= Url::to(['client/word', 'id' => $client->id,'section[]'=>$receptions]) ?>" id="printButton">
                    <i class="fa fa-file-word"></i> Word
                </a>
            </div>
        </div>
    </div>
</div>
<?php

$js = "  $('#printButton').on('click', function () {
        w = window.open();
        w.document.write($('#printThisArea').html());
        w.print();
        w.close();
    });";

$this->registerJs($js);
?>