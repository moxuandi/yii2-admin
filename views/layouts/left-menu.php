<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

list(, $url) = Yii::$app->assetManager->publish('@moxuandi/admin/assets');
$this->registerCssFile($url . '/list-item.css', ['depends' => ['yii\bootstrap\BootstrapAsset']]);

$controller = $this->context;
$menus = $controller->module->menus;
$route = $controller->route;
foreach($menus as $i => $menu){
    $menus[$i]['active'] = strpos($route, trim($menu['url'][0], '/')) === 0;
}
$this->params['nav-items'] = $menus;

$this->beginContent($controller->module->mainLayout);
?>
<div class="row">
    <div class="col-sm-3">
        <div id="manager-menu" class="list-group">
            <?php foreach($menus as $menu){
                $label = Html::tag('i', '', ['class' => 'glyphicon glyphicon-chevron-right pull-right']) . Html::tag('span', Html::encode($menu['label']));
                $active = $menu['active'] ? ' active' : '';
                echo Html::a($label, $menu['url'], ['class' => 'list-group-item' . $active]);
            } ?>
        </div>
    </div>
    <div class="col-sm-9"><?= $content ?></div>
</div>
<?php $this->endContent(); ?>
