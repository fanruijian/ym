<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\utils\Page;
use Yii;

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
        $yms = $this->getAll('Ym',['status'=>1]);
        $pics = $this->getAll('Picture');
        $pics = $this->IndexBy($pics,'id');
        $host = \Yii::$app->request->getHostInfo();
        foreach ($yms as $key => $value) {
            $yms[$key]['pic_url'] = $host.\Yii::$app->params['pic_prefix'].$pics[$value['img_url']]['path'];
        }
        //phpinfo();
        $p = new Page(100,15);
        $p->setConfig('first', '首页');
        $p->setConfig('prev', '上一页');
        $p->setConfig('next', '下一页');
        $p->setConfig('last', '尾页');
        $page = $p->show();
        return $this->render('index',['page'=>$page,'category'=>$category,'yms'=>$yms]);
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
