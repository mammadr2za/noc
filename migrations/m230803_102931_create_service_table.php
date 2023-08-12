<?php

use yii\db\Migration;

class m230803_102931_create_service_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(255)->notNull(),
            'service_type' => $this->string(255)->notNull(),
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }

}
