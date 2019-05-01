<?php
use yii\db\Migration;
class m190301_114326_create_memberexpenditure_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('memberexpenditure', [
             'id' => $this->primaryKey(),
             'member_id'=>$this->integer(),
             'expediture'=>$this->string(),
             'description'=>$this->text(),
             'date_payed'=>$this->string(),
        ]);
        $this->createIndex(
            'idx-memberexpenditure-member_id',
            'memberexpenditure',
            'member_id'
        );
        $this->addForeignKey(
            'fk-memberexpenditure-member_id',
            'memberexpenditure',
            'member_id',
            'member',
            'id',
            'CASCADE'
        );
    }
    public function safeDown()
    {
        $this->dropTable('memberexpenditure');
    }
}
