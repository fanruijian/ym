<?php

namespace frontend\controllers;

use yii\web\Controller;

class AboutController extends BaseController
{
    /**
     * @var string
     */
    public $layout = 'main';

    public function actionIndex()
    {
        //phpinfo();
        return $this->render('contact');
    }

    public function actionEee(){
        $session = \Yii::$app->session;
        $userId = $session->get('userId');
        var_dump($userId);
    }

    public function actionLogin(){
        return $this->render('login');
    }
    
}
