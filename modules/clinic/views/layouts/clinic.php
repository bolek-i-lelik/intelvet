<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'название клиники',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $navItems=[
        ['label' => 'Пользователи', 'url' => ['/admin/user']],
        ['label' => 'Status', 'url' => ['/status/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']]
      ];
      if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Sign In', 'url' => ['/user/login']],['label' => 'Sign Up', 'url' => ['/user/register']]);
      } else {
        array_push($navItems,['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']]
        );
      }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Intelvet <?= date('Y') ?></p>

        
    </div>
</footer>
<?php
// Модальное окно для загрузки содержимого с помощью ajax
Modal::begin([
    'header' => '<h4 class="modal-title">Заполните форму</h4>',
    'id' => 'default-modal',
    'size' => 'modal-md',
]);
?>
<div id='modal-content'>Загружаю...</div>
<?php Modal::end(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>