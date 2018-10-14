<?php
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $model \moxuandi\admin\models\BizRule */
/* @var $searchModel \moxuandi\admin\models\searchs\BizRule */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('rbac-admin', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a(Yii::t('rbac-admin', 'Create Rule'), ['create'], ['class' => 'btn btn-success']) ?></p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => Yii::t('rbac-admin', 'Name'),
        ],
        ['class' => 'yii\grid\ActionColumn',],
    ],
]) ?>