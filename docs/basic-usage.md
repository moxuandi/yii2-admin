Admin Module
------------
- `layout` 默认为`left-menu`. 如果要使用当前布局, 请设置为`null`.
- `menus` 更改可用于模块的列表菜单.

在配置中使用模块:

```php
'modules' => [
    'admin' => [
        'class' => 'moxuandi\admin\Module',
        'layout' => 'left-menu', // 也可以是 '@path/to/your/layout'.
        'controllerMap' => [
            'assignment' => [
                'class' => 'moxuandi\admin\controllers\AssignmentController',
                'userClassName' => 'app\models\User',
                'idField' => 'user_id'
            ],
            'other' => [
                'class' => 'path\to\OtherController', // 添加其它控制器
            ],
        ],
        'menus' => [
            'assignment' => [
                'label' => 'Grand Access' // 更改标签
            ],
            'route' => null, // 禁用菜单
        ]
	],
],
```

Access Control Filter(访问控制过滤器)
---------------------
Access Control Filter (ACF) 是一种简单的授权方法, 最适合仅需要一些简单访问控制的应用程序.
正如其名称所示, ACF 是一个动作过滤器, 可以作为行为附加到控制器或模块.
ACF 将检查一组访问规则, 以确保当前用户可以访问所请求的操作.

下面的代码显示了如何使用 ACF, 它实现为`moxuandi\admin\components\AccessControl`:

```php
'as access' => [
    'class' => 'moxuandi\admin\components\AccessControl',
    'allowActions' => [
        'site/login',
        'site/error',
    ]
]
```

Filter ActionColumn Buttons(ActionColumn 按钮过滤器)
---------------------------
当你使用`GridView`时, 你还可以过滤按钮的可见性.
```php
use moxuandi\admin\components\Helper;

'columns' => [
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => Helper::filterActionColumn('{view}{delete}{posting}'),
    ]
]
```
它将检查按钮的授权访问并显示或隐藏它.

To check access for route, you can use
```php
use moxuandi\admin\components\Helper;

if(Helper::checkRoute('delete')){
    echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
        'class' => 'btn btn-danger',
        'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
        'data-method' => 'post',
    ]);
}

```

更多...
---------------

- [基本配置](configuration.md)
- [用户管理](user-management.md)
- [使用菜单](using-menu.md)
