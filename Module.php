<?php
namespace moxuandi\admin;

use Yii;
use yii\helpers\Inflector;

/**
 * GUI manager for RBAC.
 *
 * 使用 [[\yii\base\Module::$controllerMap]] 更改控制器的属性.
 * 要更改列出的菜单, 请使用属性 [[$menus]].
 *
 * ```
 * 'layout' => 'left-menu', // 默认为`null`, 表示使用应用程序布局.
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => 'moxuandi\admin\controllers\AssignmentController',
 *         'userClassName' => 'app\models\User',
 *         'idField' => 'id'
 *     ]
 * ],
 * 'menus' => [
 *     'assignment' => [
 *         'label' => 'Grand Access' // 修改标签
 *     ],
 *     'route' => null, // 禁用菜单
 * ],
 * ```
 *
 * @property string $mainLayout 模块使用的布局视图. 默认为父模块的布局.
 * 当`layout`设置为`left-menu`, `right-menu`或`top-menu`时, 使用它.
 * @property array $menus 列出模块的可用菜单. 它有模块项目生成.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Module extends \yii\base\Module
{
    /**
     * @var string 该模块的默认路由.
     */
    public $defaultRoute = 'assignment';
    /**
     * @var array 导航栏项目.
     */
    public $navBar;
    /**
     * @var string 模块使用的布局视图. 默认为父模块的布局.
     * 当`layout`设置为`left-menu`, `right-menu`或`top-menu`时, 使用它.
     */
    public $mainLayout = '@moxuandi/admin/views/layouts/main.php';
    /**
     * @var array
     * @see [[menus]]
     */
    private $_menus = [];
    /**
     * @var array
     * @see [[menus]]
     */
    private $_coreItems = [
        'user' => 'Users',
        'assignment' => 'Assignments',
        'role' => 'Roles',
        'permission' => 'Permissions',
        'route' => 'Routes',
        'rule' => 'Rules',
        'menu' => 'Menus',
    ];
    /**
     * @var array
     * @see [[items]]
     */
    private $_normalizeMenus;

    /**
     * @var string 面包屑的默认URL.
     */
    public $defaultUrl;

    /**
     * @var string 面包屑的默认URL标签.
     */
    public $defaultUrlLabel;


    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['rbac-admin'])) {
            Yii::$app->i18n->translations['rbac-admin'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@moxuandi/admin/messages',
            ];
        }

        // 用户没有定义 $navBar 时, 自动生成
        if ($this->navBar === null && Yii::$app instanceof \yii\web\Application) {
            $this->navBar = [
                ['label' => Yii::t('rbac-admin', 'Help'), 'url' => ['default/index']],
                ['label' => Yii::t('rbac-admin', 'Application'), 'url' => Yii::$app->homeUrl],
            ];
        }
    }

    /**
     * 获取可用的菜单项.
     * @return array|null
     */
    public function getMenus()
    {
        if ($this->_normalizeMenus === null) {
            $mid = '/' . $this->getUniqueId() . '/';
            // resolve core menus
            $this->_normalizeMenus = [];

            $config = components\Configs::instance();
            $conditions = [
                'user' => $config->db && $config->db->schema->getTableSchema($config->userTable),
                'assignment' => ($userClass = Yii::$app->getUser()->identityClass) && is_subclass_of($userClass, 'yii\db\BaseActiveRecord'),
                'menu' => $config->db && $config->db->schema->getTableSchema($config->menuTable),
            ];
            foreach ($this->_coreItems as $id => $lable) {
                if (!isset($conditions[$id]) || $conditions[$id]) {
                    $this->_normalizeMenus[$id] = ['label' => Yii::t('rbac-admin', $lable), 'url' => [$mid . $id]];
                }
            }
            foreach (array_keys($this->controllerMap) as $id) {
                $this->_normalizeMenus[$id] = ['label' => Yii::t('rbac-admin', Inflector::humanize($id)), 'url' => [$mid . $id]];
            }

            // user configure menus
            foreach ($this->_menus as $id => $value) {
                if (empty($value)) {
                    unset($this->_normalizeMenus[$id]);
                    continue;
                }
                if (is_string($value)) {
                    $value = ['label' => $value];
                }
                $this->_normalizeMenus[$id] = isset($this->_normalizeMenus[$id]) ? array_merge($this->_normalizeMenus[$id], $value)
                    : $value;
                if (!isset($this->_normalizeMenus[$id]['url'])) {
                    $this->_normalizeMenus[$id]['url'] = [$mid . $id];
                }
            }
        }
        return $this->_normalizeMenus;
    }

    /**
     * 设置或添加可用的菜单项.
     * @param array $menus
     */
    public function setMenus($menus)
    {
        $this->_menus = array_merge($this->_menus, $menus);
        $this->_normalizeMenus = null;
    }

    /**
     * 执行当前模块中的动作之前被调用.
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $view = $action->controller->getView();
            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: Yii::t('rbac-admin', 'Admin')),
                'url' => ['/' . ($this->defaultUrl ?: $this->uniqueId)],
            ];
            return true;
        }
        return false;
    }
}
