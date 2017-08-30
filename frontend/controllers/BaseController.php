<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\helpers\Url;

class BaseController extends Controller
{
    public function init(){
    	$session = \Yii::$app->session;
    	$userId = $session->get('userId');  
        if(!isset($userId)){
            $this->redirect(array('/user/login','id'=>1));
        }else{
        	echo 'hase session';
        }
    }
}
