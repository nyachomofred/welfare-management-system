<?php

use yii\db\Migration;

/**
 * Handles the creation of table `children`.
 */
class m190301_114110_create_children_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('children', [
            'id' => $this->primaryKey(),
            'member_id'=>$this->integer(),
            'name'=>$this->string(),
            'gender'=>$this->string(),
            'age'=>$this->string(),
            'birth_cert_no'=>$this->string(),
        ]);
        $this->createIndex(
            'idx-children-member_id',
            'children',
            'member_id'
        );
        $this->addForeignKey(
            'fk-children-member_id',
            'children',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('children');
    }
}
