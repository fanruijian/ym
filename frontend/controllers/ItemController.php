<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\utils\Page;
use Yii;

class ItemController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main';

    public function actionCode()
    {
        // $sql  = "select * from yii2_article_cat where pid=14";
        // $category = $this->query($sql);
        // $yms = $this->getAll('Ym',['status'=>1]);
        // $pics = $this->getAll('Picture');
        // $pics = $this->IndexBy($pics,'id');
        // $host = \Yii::$app->request->getHostInfo();
        // foreach ($yms as $key => $value) {
        //     $yms[$key]['pic_url'] = $host.\Yii::$app->params['pic_prefix'].$pics[$value['img_url']]['path'];
        // }
        // //phpinfo();
        // $p = new Page(100,15);
        // $p->setConfig('first', '首页');
        // $p->setConfig('prev', '上一页');
        // $p->setConfig('next', '下一页');
        // $p->setConfig('last', '尾页');
        // $page = $p->show();
        $con = $this->One('Article',['id'=>1]);
        return $this->render('code',['con'=>$con]);
    }

    
}
