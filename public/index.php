<?php
require __DIR__.'/../vendor/autoload.php';

use App\Garden;
use App\Apple;
use App\Pear;



$garden = new Garden;
$garden->addTrees(new Apple, 10);
$garden->addTrees(new Pear, 15);
$garden->save();
?>

<table style="font-family: arial, sans-serif; border-collapse: collapse;">
<thead>
        <tr style="border: 1px grey solid;">
            <td style="border: 1px grey solid;">Вид</td>
            <td style="border: 1px grey solid;">Кол. деревьев (шт)</td>
            <td style="border: 1px grey solid;">Кол. плодов (шт)</td>
            <td>Вес (кг)</td>
        </tr>
</thead>
<? foreach ($garden->getharvest() as $key => $arrVal) { ?>

    <tbody>
        <tr style="border: 1px grey solid;">
            <td style="border: 1px grey solid;"><?=$key?></td>
            <td style="border: 1px grey solid;"><?=$arrVal['trees']?></td>
            <td style="border: 1px grey solid;"><?=$arrVal['quantity']?></td>
            <td style="border: 1px grey solid;"><?=$arrVal['weight']/1000?></td>
        </tr>
    </tbody>
<? } ?>
</table>