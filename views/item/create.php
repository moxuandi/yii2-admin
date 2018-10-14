<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\AuthItem */
/* @var $context \moxuandi\admin\components\ItemController */

use yii\helpers\Html;

$context = $this->context;
$labels = $context->labels();

$this->title = Yii::t('rbac-admin', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo Html::tag('h1', Html::encode($this->title), ['class' => 'rbac-title']);
echo $this->render('_form', ['model' => $model]);
