<?php

use yii\db\Migration;

class m230730_093654_create_servicetype_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('servicetype', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->string(255)->notNull(),
            'name_pop_point' => $this->string(255)->notNull()
        ]);
    }
    public function safeDown()
    {
        $this->dropTable('servicetype');
        $this->renameTable('pop_point', 'pop');
    }
}