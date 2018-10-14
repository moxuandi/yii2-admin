<?php
/* @var $this \yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \moxuandi\admin\models\searchs\Menu */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('rbac-admin', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p><?= Html::a(Yii::t('rbac-admin', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?></p>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        [
            'attribute' => 'menuParent.name',
            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                'class' => 'form-control', 'id' => null
            ]),
            'label' => Yii::t('rbac-admin', 'Parent'),
        ],
        'route',
        'order',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
Pjax::end();
?>
