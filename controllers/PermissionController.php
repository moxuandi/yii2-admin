<?php
namespace moxuandi\admin\controllers;

use yii\rbac\Item;
use moxuandi\admin\components\ItemController;

/**
 * PermissionController implements the CRUD actions for AuthItem model.
 */
class PermissionController extends ItemController
{

    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_PERMISSION;
    }
}
