<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use backend\traits\RequestTrait;
use backend\traits\DataTrait;
use backend\traits\ModelTrait;
use backend\traits\HierarchyTrait;

class BaseController extends Controller
{
	use RequestTrait, ModelTrait, DataTrait, HierarchyTrait;
    // public function init(){
    // 	$session = \Yii::$app->session;
    // 	$userId = $session->get('userId');  
    //     if(!isset($userId)){
    //         $this->redirect(array('/user/login','id'=>1));
    //     }else{
    //     	echo 'hase session';
    //     }
    // }
}
