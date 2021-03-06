<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\BizRule */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="rule-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
    <?= $form->field($model, 'className')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
