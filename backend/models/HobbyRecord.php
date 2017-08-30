<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii2_hobby_record".
 *
 * @property string $id
 * @property int $uid 用户id
 * @property string $tid 分类 tag id
 * @property int $nid 具体分类下面文章,新闻等的id
 * @property string $create_time
 */
class HobbyRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_hobby_record';
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
