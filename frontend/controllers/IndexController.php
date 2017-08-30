<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\utils\Page;

class IndexController extends Controller
{
    /**
     * @var string
     */
    public $layout = 'main';

    public function actionIndex()
    {
        //phpinfo();
        $p = new Page(100,15);
         $p->setConfig('first', '首页');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '尾页');
        $page = $p->show();
        return $this->render('index',['page'=>$page]);
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