<?php
/* @var $this \yii\web\View */
/* @var $routes [] */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\YiiAsset;
use moxuandi\admin\assets\AnimateAsset;

YiiAsset::register($this);
AnimateAsset::register($this);

$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;

$opts = Json::htmlEncode(['routes' => $routes]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<div class="row">
    <div class="col-sm-11">
        <div class="input-group">
            <input id="inp-route" type="text" class="form-control" placeholder="<?= Yii::t('rbac-admin', 'New route(s)') ?>">
            <span class="input-group-btn">
                <?= Html::a(Yii::t('rbac-admin', 'Add') . $animateIcon, ['create'], [
                    'id' => 'btn-new',
                    'class' => 'btn btn-success',
                    'title' => Yii::t('rbac-admin', 'Add'),
                ]) ?>
            </span>
        </div>
    </div>
</div>
<div class="row divider">
    <div class="col-sm-5">
        <div class="input-group">
            <input class="form-control search" data-target="available" placeholder="<?= Yii::t('rbac-admin', 'Search for available') ?>">
            <span class="input-group-btn">
                <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['refresh'], [
                    'id' => 'btn-refresh',
                    'class' => 'btn btn-default',
                    'title' => Yii::t('rbac-admin', 'Refresh'),
                ]) ?>
            </span>
        </div>
        <select multiple="multiple" size="20" class="form-control list" data-target="available"></select>
    </div>
    <div class="col-sm-1">
        <br><br>
        <?= Html::a('&gt;&gt;' . $animateIcon, ['assign'], [
            'class' => 'btn btn-success btn-assign',
            'data-target' => 'available',
            'title' => Yii::t('rbac-admin', 'Assign'),
        ]) ?>
        <br><br>
        <?= Html::a('&lt;&lt;' . $animateIcon, ['remove'], [
            'class' => 'btn btn-danger btn-assign',
            'data-target' => 'assigned',
            'title' => Yii::t('rbac-admin', 'Remove'),
        ]) ?>
    </div>
    <div class="col-sm-5">
        <input class="form-control search" data-target="assigned" placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
        <select multiple="multiple" size="20" class="form-control list" data-target="assigned"></select>
    </div>
</div>
