<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\AuthItem */

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p>
    <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
    <?php
    echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
        'class' => 'btn btn-danger',
        'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
        'data-method' => 'post',
    ]);
    ?>
</p>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'className',
    ],
]) ?>
