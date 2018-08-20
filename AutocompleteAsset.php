<?php
namespace moxuandi\admin;

use yii\web\AssetBundle;

/**
 * Description of AutocompleteAsset
 */
class AutocompleteAsset extends AssetBundle
{
    public $sourcePath = '@mdm/admin/assets';

    public $css = [
        'jquery-ui.css',
    ];

    public $js = [
        'jquery-ui.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
