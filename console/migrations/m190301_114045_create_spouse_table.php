<?php

use yii\db\Migration;

/**
 * Handles the creation of table `spouse`.
 */
class m190301_114045_create_spouse_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('spouse', [
             'id' => $this->primaryKey(),
             'member_id'=>$this->integer(),
             'name'=>$this->string(),
             'phonenumber'=>$this->string(),
             'email'=>$this->string(),
             'address'=>$this->string(),
             'national_id'=>$this->string(),
        ]);
        $this->createIndex(
            'idx-spouse-member_id',
            'spouse',
            'member_id'
        );
        $this->addForeignKey(
            'fk-spouse-member_id',
            'spouse',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }
    public function safeDown()
    {
        $this->dropTable('spouse');
    }
}
