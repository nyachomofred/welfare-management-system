<?php

use yii\db\Migration;

/**
 * Handles the creation of table `paymenthistory`.
 */
class m190301_114230_create_paymenthistory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('paymenthistory', [
             'id' => $this->primaryKey(),
             'member_id'=>$this->integer(),
             'amount_paid'=>$this->string(),
             'invoice_no'=>$this->string(),
             'date_paid'=>$this->string(),
        ]);
        $this->createIndex(
            'idx-paymenthistory-member_id',
            'paymenthistory',
            'member_id'
        );
        $this->addForeignKey(
            'fk-paymenthistory-member_id',
            'paymenthistory',
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
        $this->dropTable('paymenthistory');
    }
}
