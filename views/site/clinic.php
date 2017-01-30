<?php

use yii\helpers\Html;

?>


<?= Html::beginTag('div', ['class'=>'row']);?>
<?= Html::beginTag('div', ['class'=>'col-lg-12']);?>
<?= Html::beginTag('center');?>
<?= Html::img('@web/images/logo.jpg', ['alt' => 'Наш логотип']) ?>
<?= Html::tag('/br') ?>
<?= Html::a('Перейти в панель управления', ['/clinic/default'], ['class' => 'btn btn-info']) ?>
<?= Html::endTag('center');?>
<?= Html::endTag('div');?>
<?= Html::endTag('div');?>