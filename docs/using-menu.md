使用菜单
==========

菜单管理器用于构建分层菜单. 这将自动检查用户的角色和权限, 然后返回他有权访问的菜单.

```php
use moxuandi\admin\components\MenuHelper;
use yii\bootstrap\Nav;

echo Nav::widget([
    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
]);
```


`moxuandi\admin\components\MenuHelper::getAssignedMenu()`的默认返回格式如下:

```php
[
    [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'items' => [
			[
				'label' => $menu['name'], 
				'url' => [$menu['route']]
            ],
        ]
    ],
    [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'items' => [
			[
				'label' => $menu['name'], 
				'url' => [$menu['route']]
            ]
        ]
    ],
]
```

其中, `$menu`变量对应于表`menu`中的记录. 你可以通过提供此方法的回调函数来自定义`moxuandi\admin\components\MenuHelper::getAssignedMenu()`的返回格式.
回调函数的前面必须是`function($menu){}`.

你可以在菜单中添加 HTML 选项属性, 例如"title". 当你创建菜单时, 在字段数据(textarea)中填写以下内容:
```
return ['title'=>'Title of Your Link Here'];
```

然后在视图中:

```php
$callback = function($menu){
    $data = eval($menu['data']);
    return [
        'label' => $menu['name'], 
        'url' => [$menu['route']],
        'options' => $data,
        'items' => $menu['children']
    ];
}

$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
```

默认结果是从`cache`中获得的. 如果要强制重新生成, 请将`true`作为第四个参数提供.

你可以修改回调函数以进行更高级的用户.

![List Menu](/docs/image09.png)
![Create Menu](/docs/image10.png)

Using Sparated Menu
-------------------
Second parameter of `moxuandi\admin\components\MenuHelper::getAssignedMenu()` used to get menu on it's own hierarchy.
E.g. Your menu structure:

* Side Menu
  * Menu 1
    * Menu 1.1
    * Menu 1.2
    * Menu 1.3
  * Menu 2
    * Menu 2.1
    * Menu 2.2
    * Menu 2.3
* Top Menu
  * Top Menu 1
    * Top Menu 1.1
    * Top Menu 1.2
    * Top Menu 1.3
  * Top Menu 2
  * Top Menu 3
  * Top Menu 4

You can get 'Side Menu' chldren by calling

```php
$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, $sideMenuId);
```

It will result in
* Menu 1
  * Menu 1.1
  * Menu 1.2
  * Menu 1.3
* Menu 2
  * Menu 2.1
  * Menu 2.2
  * Menu 2.3

过滤菜单
--------------
如果你有`NavBar`菜单项并希望根据登录用户进行过滤, 你可以使用 Helper 类:
```php

user moxuandi\admin\components\Helper;

$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'About', 'url' => ['/site/about']],
    ['label' => 'Contact', 'url' => ['/site/contact']],
    ['label' => 'Login', 'url' => ['/user/login']],
    [
        'label' => 'Logout (' . \Yii::$app->user->identity->username . ')',
        'url' => ['/user/logout'],
        'linkOptions' => ['data-method' => 'post']
    ],
    ['label' => 'App', 'items' => [
        ['label' => 'New Sales', 'url' => ['/sales/pos']],
        ['label' => 'New Purchase', 'url' => ['/purchase/create']],
        ['label' => 'GR', 'url' => ['/movement/create', 'type' => 'receive']],
        ['label' => 'GI', 'url' => ['/movement/create', 'type' => 'issue']],
    ]]
];

$menuItems = Helper::filter($menuItems);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
```

你还可以针对单独路由进行检查:
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

过滤 ActionColumn 按钮
---------------------------
当你使用`GridView`时, 你还可以过滤按钮的可见性. 它将检查按钮的访问授权并控制其显示/隐藏:
```php
use moxuandi\admin\components\Helper;

'columns' => [
    ...
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => Helper::filterActionColumn('{view}{delete}{posting}'),
    ]
]
```


更多...
---------------

- [基本配置](configuration.md)
- [基本用法](basic-usage.md)
- [用户管理](user-management.md)
