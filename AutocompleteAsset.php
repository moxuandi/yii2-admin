<?php
namespace moxuandi\admin;

use yii\web\AssetBundle;

/**
 * Description of AutoCompleteAsset
 */
class AutoCompleteAsset extends AssetBundle
{
    public $sourcePath = '@moxuandi/admin/assets';

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
