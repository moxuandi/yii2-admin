<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\User */

use yii\helpers\Html;
use yii\widgets\DetailView;
use moxuandi\admin\components\Helper;

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p>
    <?php if($model->status == 0 && Helper::checkRoute($controllerId . 'activate')){
        echo Html::a(Yii::t('rbac-admin', 'Activate'), ['activate', 'id' => $model->id], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                'method' => 'post',
            ],
        ]);
    } ?>
    <?php if (Helper::checkRoute($controllerId . 'delete')) {
        echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]);
    } ?>
</p>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'username',
        'email:email',
        'created_at:date',
        'status',
    ],
]) ?>
