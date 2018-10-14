<?php
namespace moxuandi\admin\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @param string $page 页面路径
     * @return string|\yii\console\Response|\yii\web\Response
     */
    public function actionIndex($page = 'README.md')
    {
        if(strpos($page, '.png') !== false){
            $file = Yii::getAlias("@moxuandi/admin/{$page}");
            return Yii::$app->getResponse()->sendFile($file);
        }
        return $this->render('index', ['page' => $page]);
    }
}
