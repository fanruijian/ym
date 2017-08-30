<?php

namespace console\controllers;

use Yii;
use yii\helpers\Console;
use yii\console\Controller;
use backend\services\SynService;

/**
 * Class InstallController
 * @package console\controllers
 */
class SynController extends Controller
{   
    // public function init(){
    //     parent::init();
    //     $this->service = new SynService();
    // }
    // 同步用户喜好标签
    public function actionAddLikeTag(){
         $synService = new SynService();
        $synService->synHobbyTag();
    }

    // 同步推荐内容
    public function actionAddRecommend(){
        $synService = new SynService();
        $synService->SynRecommend();
    }

}


