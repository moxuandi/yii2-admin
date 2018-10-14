<?php
namespace moxuandi\admin\assets;

use yii\web\AssetBundle;

/**
 * Description of AutoCompleteAsset
 */
class AutoCompleteAsset extends AssetBundle
{
    public $sourcePath = '@moxuandi/admin/static';

    public $css = [
        'jquery-ui.min.css',
    ];

    public $js = [
        'jquery-ui.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
