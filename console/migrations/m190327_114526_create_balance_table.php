<?php

use yii\db\Migration;

/**
 * Handles the creation of table `balance`.
 */
class m190327_114526_create_balance_table extends Migration
{
    //create table balance
    public function safeUp()
    {
        $this->createTable('balance', [
            'id' => $this->primaryKey(),
            'member_id'=>$this->integer(),
            'balance'=>$this->string(),
            'year'=>$this->string(),
            
        ]);
        $this->createIndex(
            'idx-balance-member_id',
            'balance',
            'member_id'
        );
        $this->addForeignKey(
            'fk-balance-member_id',
            'balance',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }
 //drop table
    public function safeDown()
    {
        $this->dropTable('balance');
    }
}
