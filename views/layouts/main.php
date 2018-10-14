<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;

list(, $url) = Yii::$app->assetManager->publish('@moxuandi/admin/assets');
$this->registerCssFile($url . '/main.css', ['depends' => ['yii\bootstrap\BootstrapAsset']]);
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
<?php
NavBar::begin([
    'brandLabel' => false,
    'options' => ['class' => 'navbar-inverse navbar-fixed-top'],
]);

if(!empty($this->params['top-menu']) && isset($this->params['nav-items'])){
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => $this->params['nav-items'],
    ]);
}

echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav navbar-right'],
    'items' => $this->context->module->navBar,
]);
NavBar::end();
?>
<div class="container"><?= $content ?></div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
