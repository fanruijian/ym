<?php
namespace backend\services;

use backend\utils\Functions as F;
use backend\services\RedisCacheService;

class ArticleService extends BaseService {

    public function init()
    {
        parent::init();
        $this->redis = new RedisCacheService;
    }

     // 同步用户推荐到redis
    public function synRecommend($userId,$num=5,$maxCache=50){
        $userRec = $this->redis->getZrangeData('user_rec_list'.$userId);
        $lastKey = $this->redis->getData('user_last'.$userId);
        $index = $this->redis->getZrangIndex('user_rec_list'.$userId,$lastKey);
        $res = [];
        if(empty($userRec)){ //第一次访问
            $firstRecSql = "SELECT * from {{%article}} WHERE id in(SELECT MAX(id) as id from {{%article}} GROUP BY category_id) limit 10";
            $firstRecRes = $this->query($firstRecSql);
            $rec = shuffle($firstRecRes);
            foreach ($firstRecRes as $key => $value) {
                if($key<$num){
                  array_push($res,$value);
                }
                $data['uid'] = $userId;
                $data['tid'] = $value['category_id'];
                $data['nid'] = $value['id'];
                $data['create_time'] = date('Y-m-d H:i:s',time());
                $save = $this->saveData('UserRecommend', $data);
                $this->redis->zaddData('user_rec_list'.$userId,$save['id'],$data['nid']);
            }
            $lastKey = count($res)-1;
            $this->redis->setData('user_last'.$userId,$res[$lastKey]['id']);
        }else{
            $allIds = $this->redis->getRange('user_rec_list'.$userId,$index+1,$index+$num);
            if(!empty($allIds)){
              $count = count($allIds);
              $lastId = $allIds[$count-1];
              $this->redis->setData('user_last'.$userId,$lastId);
              foreach ($allIds as $key => $value) {
                $article = $this->redis->getHashData('article_'.$value);
                $article = $this->hashToArray($article);
                array_push($res,$article);
              }
            }
        }
        // 如果数据不够则缓存数据
        $totalNum = $this->redis->getZcard('user_rec_list'.$userId);
        $nowNum = $totalNum-$index-1;
        $host = \Yii::$app->urlManager->hostInfo;
        if($nowNum<$maxCache){
          $host = \Yii::$app->urlManager->hostInfo;
          $url = $host.'/admin/api/article/test';
          $data['userId'] = $userId;
          $this->curlPost($url,$data);
        }
        echo  json_encode($res);
    }


    // 如果固定时间没有返回直接跳过，类似非阻塞
    public function curlPost($url,$data) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER, 1);
      curl_setopt($ch,CURLOPT_URL,$url);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_NOSIGNAL,1); 
      curl_setopt($ch,CURLOPT_TIMEOUT_MS,300);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $result = curl_exec($ch);
      curl_close($ch);
      return $result;
    }

    public function UserRecommend($userId,$limit,$probability,$count){
      $sql = "select tid from {{%hobby_record}} where uid=".$userId." order by create_time desc limit 10";
      $hobbyRes = $this->query($sql);
      $hobbyIds = array_column($hobbyRes, 'tid');
      $hobbyIds = array_unique($hobbyIds);
      $tagSql = " select id from {{%article_cat}} where pid!=0 ";
      $allTags = $this->query($tagSql);
      $allTags = array_column($allTags, 'id');
      $rec = [];
      foreach ($allTags as $key => $value) {
        $sql = "select * from {{%article}} where category_id=".$value." and id not in 
                (select nid from {{%user_recommend}})order by id desc limit ".$limit;
        $tagRes = $this->query($sql);
        if(!empty($tagRes)){
          foreach ($tagRes as $key => $value) {
            array_push($rec,$value);
          }
        }
      }
      if(!empty($rec)){
        // 计算概率
        $like = round($count*$probability);
        $nomal = $count-$like;
        $likeFlag = 0;
        $nomalFlag = 0;
        shuffle($rec);
        foreach ($rec as $key => $value) {
          if(($likeFlag+$nomalFlag)==$count) break; 
          if(in_array($value['category_id'],$hobbyIds) && $likeFlag<$like){
            $data['uid'] = $userId;
            $data['tid'] = $value['category_id'];
            $data['nid'] = $value['id'];
            $data['create_time'] = date('Y-m-d H:i:s',time());
            $save = $this->saveData('UserRecommend', $data);
            $this->redis->zaddData('user_rec_list'.$userId,$save['id'],$data['nid']);
            $likeFlag++;
          }
          if(!in_array($value['category_id'],$hobbyIds) && $nomalFlag<$nomal){
            $data['uid'] = $userId;
            $data['tid'] = $value['category_id'];
            $data['nid'] = $value['id'];
            $data['create_time'] = date('Y-m-d H:i:s',time());
            $save = $this->saveData('UserRecommend', $data);
            $this->redis->zaddData('user_rec_list'.$userId,$save['id'],$data['nid']);
            $nomalFlag++;
          }
        }
      }
    }  

   

}//end
