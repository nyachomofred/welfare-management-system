<?php

use yii\db\Migration;
class m190301_114012_create_member_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('member', [
            'id' => $this->primaryKey(),
            'idno'=>$this->integer()->notNull(),
            'name'=>$this->string(),
            'gender'=>$this->string(),
            'phonenumber'=>$this->string(),
            'email'=>$this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('member');
    }
}
