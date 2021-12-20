<?php


/* @var $this View */
/* @var $client Client */

/* @var $receptions */

use common\models\Reception;
use frontend\modules\doctor\models\Client;
use soft\helpers\PhoneHelper;
use soft\widget\bs4\Card;
use yii\web\View;

?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-8" id="printThisArea">
        <?php soft\widget\bs4\Card::begin() ?>
        <html>

        <head>
            <meta http-equiv=Content-Type content="text/html; charset=windows-1251">
            <meta name=Generator content="Microsoft Word 15 (filtered)">
            <style>
                <!--
                /* Font Definitions */
                @font-face {
                    font-family: "Cambria Math";
                    panose-1: 2 4 5 3 5 4 6 3 2 4;
                }

                @font-face {
                    font-family: Calibri;
                    panose-1: 2 15 5 2 2 2 4 3 2 4;
                }

                /* Style Definitions */
                p.MsoNormal, li.MsoNormal, div.MsoNormal {
                    margin-top: 0cm;
                    margin-right: 0cm;
                    margin-bottom: 8.0pt;
                    margin-left: 0cm;
                    line-height: 107%;
                    font-size: 11.0pt;
                    font-family: "Calibri", sans-serif;
                }

                p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph {
                    margin-right: 0cm;
                    margin-left: 0cm;
                    font-size: 12.0pt;
                    font-family: "Times New Roman", serif;
                }

                .MsoChpDefault {
                    font-family: "Calibri", sans-serif;
                }

                .MsoPapDefault {
                    margin-bottom: 8.0pt;
                    line-height: 107%;
                }

                @page WordSection1 {
                    size: 595.3pt 841.9pt;
                    margin: 42.55pt 42.5pt 2.0cm 3.0cm;
                }

                div.WordSection1 {
                    page: WordSection1;
                }

                -->
            </style>

        </head>

        <body lang=RU>

        <div class=WordSection1>

            <p class=MsoNormal align=center style='text-align:center;line-height:normal'><b><span
                            lang=EN-US style='font-size:16.0pt;font-family:"Times New Roman",serif;
color:#212529'>Tibbiy ko‘rik anketasi</span></b></p>

            <p class=MsoNormal align=center style='text-align:center;line-height:normal'><b><span
                            lang=EN-US style='font-size:14.0pt;font-family:"Times New Roman",serif'>Bemor haqida
ma’lumot:</span></b></p>

            <div align=center>
                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=625
                       style='width:469.1pt;border-collapse:collapse;border:none'>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>FISH:</span></b>
                            </p>
                        </td>
                        <td width=469 colspan=3 style='width:351.85pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
  font-family:"Times New Roman",serif'><?= $client->fullname ?? '' ?></span></p>
                        </td>
                    </tr>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Tug‘ilgan
  sanasi:</span></b></p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
  font-family:"Times New Roman",serif'><?= Yii::$app->formatter->asDate($client->date_of_birth, 'dd.MM.yyyy') ?></span>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Jinsi:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?= $client->genderName ?? '' ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Viloyat</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?= $client->region->name ?? '' ?></span>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Tuman:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.3pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?= $client->district->name ?? '' ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:18.9pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Manzil:</span></b>
                            </p>
                        </td>
                        <td width=469 colspan=3 style='width:351.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?= $client->street ?? ' ' ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Telefon:</span></b>
                            </p>
                        </td>
                        <td width=469 colspan=3 style='width:351.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?= PhoneHelper::clearPhoneNumber($client->phone) ?? '' ?></span>
                            </p>
                        </td>
                    </tr>
                </table>

            </div>

            <p class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
font-family:"Times New Roman",serif;color:#212529;background:white'>&nbsp;</span></p>

            <p class=MsoNormal align=center style='text-align:center;line-height:normal'><b><span
                            lang=EN-US style='font-size:14.0pt;font-family:"Times New Roman",serif'>Tibbiy
ko‘rik ma’lumotlari</span></b><b><span style='font-size:14.0pt;font-family:
"Times New Roman",serif'>:</span></b></p>
            <?php foreach ($receptions as $reception):?>
            <?php $diagnos= Reception::find()->where(['id'=>$reception])->one()?>
            <div align=center>
                <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=625
                       style='width:469.1pt;border-collapse:collapse;border:none'>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Sana:</span></b>
                            </p>
                        </td>
                        <td width=469 colspan=3 style='width:351.85pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span style='font-size:12.0pt;
  font-family:"Times New Roman",serif'><?=$diagnos->formattedDate?></span></p>
                        </td>
                    </tr>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Og‘irligi:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=$diagnos->weight?> kg</span>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Bo‘yi:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=$diagnos->height?> sm</span>
                            </p>
                        </td>
                    </tr>
                    <tr style='height:19.75pt'>
                        <td width=156 style='width:117.25pt;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Isitma:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=$diagnos->fever?></span>
                            </p>
                        </td>
                        <td width=156 style='width:117.25pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><b><span lang=EN-US
                                                                                   style='font-size:12.0pt;font-family:"Times New Roman",serif'>Qon bosimi:</span></b>
                            </p>
                        </td>
                        <td width=156 style='width:117.35pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:19.75pt'>
                            <p class=MsoNormal style='line-height:normal'><span lang=EN-US
                                                                                style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=$diagnos->blood_pressure ?? ''?></span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b><i><span style='font-size:12.0pt;font-family:"Times New Roman",serif;
color:#212529;background:white'>&nbsp;</span></i></b></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b><i><span style='font-size:12.0pt;font-family:"Times New Roman",serif;
color:#212529;background:white'>&nbsp;</span></i></b><b><i><span lang=EN-US
                                                                 style='font-size:12.0pt;font-family:"Times New Roman",serif;color:#212529;
background:white'>Bemor shikoyati:</span></i></b></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span lang=EN-US style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=strip_tags($diagnos->complaint)?></span></p>

            <p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
"Times New Roman",serif;color:#212529;background:white'>&nbsp;</span></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b><i><span style='font-size:12.0pt;font-family:"Times New Roman",serif;
color:#212529;background:white'>&nbsp;</span></i></b><b><i><span lang=EN-US
                                                                 style='font-size:12.0pt;font-family:"Times New Roman",serif;color:#212529;
background:white'>Analizlar natijasi:</span></i></b></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span lang=EN-US style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=strip_tags($diagnos->analiz_result)?></span></p>

            <p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
"Times New Roman",serif;color:#212529;background:white'>&nbsp;</span></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b><i><span style='font-size:12.0pt;font-family:"Times New Roman",serif;
color:#212529;background:white'>&nbsp;</span></i></b><b><i><span lang=EN-US
                                                                 style='font-size:12.0pt;font-family:"Times New Roman",serif;color:#212529;
background:white'>Tashxis:</span></i></b></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span lang=EN-US style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=strip_tags($diagnos->diagnos)?></span></p>

            <p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
"Times New Roman",serif;color:#212529;background:white'>&nbsp;</span></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><b><i><span style='font-size:12.0pt;font-family:"Times New Roman",serif;
color:#212529;background:white'>&nbsp;</span></i></b><b><i><span lang=EN-US
                                                                 style='font-size:12.0pt;font-family:"Times New Roman",serif;color:#212529;
background:white'>Tavsiya:</span></i></b></p>

            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
normal'><span lang=EN-US style='font-size:12.0pt;font-family:"Times New Roman",serif'><?=strip_tags($diagnos->reference)?></span>
            </p>

            <p class=MsoNormal><span style='font-size:12.0pt;line-height:107%;font-family:
"Times New Roman",serif;color:#212529;background:white'>&nbsp;</span></p>

            <p class=MsoNormal>&nbsp;</p>

            <p class=MsoNormal>&nbsp;</p>

            <p class=MsoNormal>&nbsp;</p>

            <p class=MsoNormal><b><span lang=EN-US style='font-size:12.0pt;line-height:
107%;font-family:"Times New Roman",serif'>Doktor:          </span></b><span
                        lang=EN-US style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'><?=$diagnos->createdBy->fullname?? ''?>
                </span>
            </p>
            <?php endforeach;?>
        </div>

        </body>

        </html>
        <?php Card::end() ?>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-app" href="javascript:void(0);" id="printButton">
                    <i class="fa fa-print"></i> Chop etish
                </a>
                <a class="btn btn-app" href="javascript:void(0);" id="printButton">
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