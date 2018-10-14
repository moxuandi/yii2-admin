<?php
/* @var $this \yii\web\View */
/* @var $model \moxuandi\admin\models\AuthItem */
/* @var $context \moxuandi\admin\components\ItemController */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use moxuandi\admin\components\RouteRule;
use moxuandi\admin\assets\AutoCompleteAsset;
use moxuandi\admin\components\Configs;

AutoCompleteAsset::register($this);

$context = $this->context;
$labels = $context->labels();
$rules = Configs::authManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$this->registerJs("$('#rule_name').autocomplete({source: $source});");
?>
<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
            <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>
            <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('rbac-admin', 'Create') : Yii::t('rbac-admin', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
            'name' => 'submit-button',
        ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
