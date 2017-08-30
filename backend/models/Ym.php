<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "yii2_ym".
 *
 * @property string $id 文档ID
 * @property string $title 标题
 * @property string $cat_id 上级分类ID
 * @property string $discription 描述
 * @property string $shows 浏览量
 * @property string $down_url 下载链接地址
 * @property string $get_code 文件提取码
 * @property string $content 文章详情
 * @property string $created_at
 * @property string $modified_at
 */
class Ym extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii2_ym';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'shows'], 'integer'],
            [['down_url', 'get_code'], 'required'],
            [['content'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['title', 'down_url'], 'string', 'max' => 200],
            [['discription'], 'string', 'max' => 500],
            [['get_code'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cat_id' => 'Cat ID',
            'discription' => 'Discription',
            'shows' => 'Shows',
            'down_url' => 'Down Url',
            'get_code' => 'Get Code',
            'content' => 'Content',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }
}
