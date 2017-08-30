<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\User;

class UserController extends Controller
{
    /**
     * @var string
     */
    public $layout = 'login';
    public $title = null;

    public function actionIndex()
    {
        //phpinfo();
        return $this->render('index');
    }

    public function actionLogin(){
        // $this->layout= false;
        // $session = \Yii::$app->session;
        // $session->set('userId',1);
        $this->title = '登录';
        return $this->render('login');
    }

    public function actionRegister(){
        $this->title = '注册';
        return $this->render('register');
    }

    public function actionAjaxLogin(){
        $username = 'user@qq.com';
        $password = '123456';
        if(!isset($username) || !isset($username)){
            echo '用户名密码不存在';
        }
        $user = User::findByUsername($username);
        if($user) $check = $user->validatePassword($password);
        if ($user && $check) {
            echo '成功';
        } else {
            echo '失败';
        }
    }

    public function actionAjaxRegister(){
        $model = new User();
        // if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post();
            $data['mobile'] = '15966369988';
            $data['score'] = 0;
            $data['score_all'] = 0;
            $data['password'] = 'jian8569216';
            $data['reg_time'] = time();
            $data['reg_ip']   = ip2long(Yii::$app->request->getUserIP());
            $data['last_login_time'] = 0;
            $data['last_login_ip']   = ip2long(Yii::$app->request->getUserIP());
            $data['update_time']     = 0;
            /* 表单数据加载和验证，具体验证规则在模型rule中配置 */
            /* 密码单独验证，否则setPassword后密码肯定符合rule */
            if (empty($data['password']) || strlen($data['password']) < 6) {
                $this->error('密码为空或小于6字符');
            }
            $model->setAttributes($data);
            $model->generateAuthKey();
            $model->setPassword($data['password']);
            /* 保存用户数据到数据库 */
            if ($model->save()) {
                echo '成功';
            }else{
                echo '失败';
            }
        // }
    }    
}
