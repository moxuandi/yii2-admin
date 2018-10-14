<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\form\ChangePassword */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('rbac-admin', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p>Please fill out the following fields to change password:</p>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'form-change']); ?>
        <?= $form->field($model, 'oldPassword')->passwordInput() ?>
        <?= $form->field($model, 'newPassword')->passwordInput() ?>
        <?= $form->field($model, 'retypePassword')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('rbac-admin', 'Change'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
