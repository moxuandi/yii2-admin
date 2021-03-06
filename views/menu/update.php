<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\Menu */

use yii\helpers\Html;

$this->title = Yii::t('rbac-admin', 'Update Menu') . ': ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');

echo Html::tag('h1', Html::encode($this->title), ['class' => 'rbac-title']);
echo $this->render('_form', ['model' => $model]);
