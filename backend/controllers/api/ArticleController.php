<?php

namespace backend\controllers\api;


use yii\web\Controller;
use Yii;
use yii\web\Request as WebRequest;
use backend\services\ArticleService;

/**
 * Trait to handle JWT-authorization process. Should be attached to User model.
 * If there are many applications using user model in different ways - best way
 * is to use this trait only in the JWT related part.
 */
class ArticleController extends BaseController
{
    public $enableCsrfValidation = false;

    public $service = null;
    public function init(){
        parent::init();
        $this->service = new ArticleService();
    }

    public function actionList(){
    	$this->service->synRecommend(3);
    }

    public function actionTest(){
        $userId = $_POST['userId'];
        $this->service->UserRecommend($userId,10,0.8,5);
    }
}
