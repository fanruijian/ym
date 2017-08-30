<?php

use yii\db\Migration;

class m170607_085140_update_good_link_manage_img_field extends Migration
{
    public function safeUp()
    {
        return $this->alterColumn("{{%goods_link_manage}}", 'img', "int(11)  NOT NULL  COMMENT '图片保存id,对应picture表id'");
    }

    public function safeDown()
    {
        echo "m170607_085140_update_good_link_manage_img_field cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170607_085140_update_good_link_manage_img_field cannot be reverted.\n";

        return false;
    }
    */
}
