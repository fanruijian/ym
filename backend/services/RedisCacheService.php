<?php
namespace backend\services;
use Yii;
class RedisCacheService extends BaseService {
    private $redis = null;
    
    public function init() {
        $this->redis = \Yii::$app->redis;
        if (!$this->redis->ping()) {
            return [];
        }
    }

    public function setData($key, $val)
    {
        return $this->redis->set($key, $val);
    }

    public function hsetData($key, $dim, $val)
    {
        return $this->redis->hset($key, $dim, $val);
    }

     public function hgetData($key, $dim)
    {
        return $this->redis->hget($key, $dim);
    }

    public function delData($key)
    {
        return $this->redis->del($key);
    }

    public function getData($key){
        return $this->redis->get($key);
    }

    public function getHashData($key){
        return $this->redis->hgetall($key);
    }

    public function hmsetData($key,$val){
        return $this->redis->hmset($key,$val);
    }
    
    // 添加有序集合
    public function zaddData($key,$index,$val){
        return $this->redis->zadd($key,$index,$val);
    }
    
    // 获取有序集合
    public function getZrangeData($key,$with=false){
        if($with){
            return $this->redis->zrange($key,0,-1,'WITHSCORES');
        }else{
            return $this->redis->zrange($key,0,-1);
        }
    }

    // 获取固定长度的有序集合
    public function getRange($key,$start,$end){
        return $this->redis->zrange($key,$start,$end);
    }

    public function getZrangIndex($key,$val){
        return $this->redis->zrank($key,$val);
    }

    public function getZcard($key){
        return $this->redis->zcard($key);
    }

}//end
