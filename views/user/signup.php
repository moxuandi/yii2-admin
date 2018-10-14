<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\form\Signup */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('rbac-admin', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p>Please fill out the following fields to signup:</p>
<?= Html::errorSummary($model)?>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('rbac-admin', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
