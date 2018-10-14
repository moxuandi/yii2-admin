<?php
namespace moxuandi\admin\controllers;

use yii\rbac\Item;
use moxuandi\admin\components\ItemController;

/**
 * RoleController implements the CRUD actions for AuthItem model.
 */
class RoleController extends ItemController
{
    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Role',
            'Items' => 'Roles',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_ROLE;
    }
}
