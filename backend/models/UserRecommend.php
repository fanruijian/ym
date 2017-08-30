<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "yii2_user_recommend".
 *
 * @property string $id
 * @property int $uid 用户id
 * @property string $tid 分类 tag id
 * @property int $nid 具体分类下面文章,新闻等的id
 * @property string $create_time
 */
class UserRecommend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_user_recommend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'tid', 'nid'], 'integer'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'tid' => 'Tid',
            'nid' => 'Nid',
            'create_time' => 'Create Time',
        ];
    }
}
