<?php

use yii\db\Migration;

class m230802_144748_create_pop_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('pop', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'is_used' => $this->string(255),
            'type' => $this->string(255)->notNull(),
        ]);
    }

public function safeDown()
{
        $this->dropTable('pop');
}
}