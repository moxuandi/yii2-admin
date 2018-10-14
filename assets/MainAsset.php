<?php
namespace moxuandi\admin\assets;

use yii\web\AssetBundle;

/**
 * Description of MainAsset
 */
class MainAsset extends AssetBundle
{
    public $sourcePath = '@moxuandi/admin/static';

    public $css = [
        'main.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
