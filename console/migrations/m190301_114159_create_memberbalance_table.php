<?php

use yii\db\Migration;

/**
 * Handles the creation of table `memberbalance`.
 */
class m190301_114159_create_memberbalance_table extends Migration
{
   
    public function safeUp()
    {
        $this->createTable('memberbalance', [
             'id' => $this->primaryKey(),
             'member_id'=>$this->integer(),
             'balance'=>$this->string(),
            
        ]);
        $this->createIndex(
            'idx-memberbalance-member_id',
            'memberbalance',
            'member_id'
        );
        $this->addForeignKey(
            'fk-memberbalance-member_id',
            'memberbalance',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }

    
    public function safeDown()
    {
        $this->dropTable('memberbalance');
    }
}
