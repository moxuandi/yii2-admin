<?php
namespace moxuandi\admin\assets;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 */
class AnimateAsset extends AssetBundle
{
    public $sourcePath = '@moxuandi/admin/static';

    public $css = [
        'animate.css',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
