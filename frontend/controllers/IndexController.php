<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\utils\Page;

class IndexController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main';

    public function actionIndex()
    {
        $sql  = "select * from yii2_article_cat where pid=14";
        $category = $this->query($sql);
        //phpinfo();
        $p = new Page(100,15);
         $p->setConfig('first', '首页');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '尾页');
        $page = $p->show();
        return $this->render('index',['page'=>$page,'category'=>$category]);
    }

    public function actionTest(){
    	$p = new Page(100,15);
    	$p->setConfig('first', '首页');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '尾页');
        // $this->page = $p->show();
    	// var_dump($d);
    	// exit();
    }

    public function actionBbb(){
        $userModel = new User();
        $p = $userModel->findIdentity(6);
        var_dump($p);
        exit();
        var_dump($userModel);
        exit();
    }
}
