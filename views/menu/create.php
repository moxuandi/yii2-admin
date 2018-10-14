<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\Menu */

use yii\helpers\Html;

$this->title = Yii::t('rbac-admin', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('h1', Html::encode($this->title), ['class' => 'rbac-title']);
echo $this->render('_form', ['model' => $model]);
