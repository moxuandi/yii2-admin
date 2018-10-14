<?php
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \moxuandi\admin\models\searchs\AuthItem */
/* @var $context \moxuandi\admin\components\ItemController */

use yii\grid\GridView;
use yii\helpers\Html;
use moxuandi\admin\components\RouteRule;
use moxuandi\admin\components\Configs;

$context = $this->context;
$labels = $context->labels();

$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p><?= Html::a(Yii::t('rbac-admin', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?></p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => Yii::t('rbac-admin', 'Name'),
        ],
        [
            'attribute' => 'ruleName',
            'label' => Yii::t('rbac-admin', 'Rule Name'),
            'filter' => $rules
        ],
        [
            'attribute' => 'description',
            'label' => Yii::t('rbac-admin', 'Description'),
        ],
        ['class' => 'yii\grid\ActionColumn',],
    ],
]) ?>
