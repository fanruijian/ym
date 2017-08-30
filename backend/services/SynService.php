<?php
namespace backend\services;
use Yii;
use backend\utils\Functions as F;
use backend\services\RedisCacheService;

class SynService extends BaseService {

    public function init(){
        $this->redis = new RedisCacheService();
    }

    //调用定时任务,更新用户的喜好标签
    public function synHobbyTag(){
        // 筛选出用户最近浏览的标签
        $sql = "select a.* from yii2_hobby_record a where 2 > (select count(1) from yii2_hobby_record where uid = a.uid and create_time > a.create_time ) order by a.uid,a.create_time";
        $res = $this->query($sql);
        foreach ($res as $key => $value) {
            $this->redis->zaddData('user'.$value['uid'],$value['tid'],$value['tid']);
        }
        echo '同步用户标签成功!';
    }

    // 获取用户喜好
    public function getUserHobby($userId){
        $res = $this->redis->getZrangeData('user'.$userId);
        return $res;
    }
    
    // 同步用户推荐到redis
    public function synRecommend(){

        $this->curlPost('http://192.168.1.157/admin/api/user/abc');
        // $user = $this->getAll('User',['status'=>1],'uid');
        // $allTag = $this->getColumn('ArticleCat',['status'=>1],['id']);
        // $firstRecSql = "select a.* from {{%article}} a where 3 > (select count(1) from {{%article}} where category_id = a.category_id and status=1 and create_time > a.create_time ) order by a.id,a.create_time ";
        // $firstRecRes = $this->query($firstRecSql);
        // foreach ($user as $key => $value) {
        //     $uid = $value['uid'];
        //     $hobby = $this->getUserHobby($uid);
        //     $userRecList = $this->getUserRecList($uid);
        //     if(empty($userRecList)){
        //         $rec = shuffle($firstRecRes);
        //         foreach ($rec as $key => $value) {
        //             $data['']
        //         }
        //     }
            
        //     $this->userRecommend($uid,$allTag);
        // }
    }

    public function userRecommend($userId,$allTag){
        $hobby = $this->getUserHobby($value['uid']);
        if(empty($hobby)){
            // 随机推荐
            $sql = "select a.* from yii2_hobby_record a where 2 > (select count(1) from yii2_hobby_record where uid = a.uid and create_time > a.create_time ) order by a.uid,a.create_time ";
        }else{
            // 按概率推荐
        }
    }
    
    // 如果一秒没返回直接跳过
    public function curlPost($url) {
      $ch = curl_init();
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch,CURLOPT_TIMEOUT,1);
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }  


}//end
