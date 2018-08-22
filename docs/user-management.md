用户管理
===============

对于需要将用户存储在数据库中的`基本应用程序模板(basic)`. 要使用此功能, 请通过执行迁移创建所需的表.
```
./yii migrate --migrationPath=@moxuandi/admin/migrations
```
然后, 修改用户组件的配置:
```php
'components' => [
    'user' => [
        'identityClass' => 'moxuandi\admin\models\User',
        'loginUrl' => ['admin/user/login'],
    ],
]
```
然后你可以通过`index.php?r=admin/user`访问此菜单.


注册用户
-----------
```
http://localhost/myapp/index.php?r=admin/user/signup
```
默认注册用户的状态为`ACTIVE`, 表示用户无需激活即可登录.
你可以在`config/params.php`中修改它:
```php
// config/params.php

return [
    'moxuandi.admin.configs' => [
        'defaultUserStatus' => 0, // 0 = inactive, 10 = active
    ]
];
```

登录页面
----------
登录页面访问`index.php?r=admin/user/login`.


更多...
---------------

- [基本配置](configuration.md)
- [基本用法](basic-usage.md)
- [使用菜单](using-menu.md)
