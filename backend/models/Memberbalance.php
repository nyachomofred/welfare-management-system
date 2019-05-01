<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "memberbalance".
 *
 * @property int $id
 * @property int $member_id
 * @property string $balance
 *
 * @property Member $member
 */
class Memberbalance extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'memberbalance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id','balance'], 'integer'],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'member_id' => 'Member ID',
            'balance' => 'Balance(ksh)',
            'search'=>'',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
