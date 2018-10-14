<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\form\PasswordResetRequest */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="rbac-title"><?= Html::encode($this->title) ?></h1>
<p>Please fill out your email. A link to reset password will be sent there.</p>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
        <?= $form->field($model, 'email') ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('rbac-admin', 'Send'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
