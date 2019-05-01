<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "paymenthistory".
 *
 * @property int $id
 * @property int $member_id
 * @property string $amount_paid
 * @property string $invoice_no
 * @property string $date_paid
 *
 * @property Member $member
 */
class Paymenthistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paymenthistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
            //validation for amount paid
            [['amount_paid'],'integer'],
            [[ 'invoice_no', 'date_paid'], 'string', 'max' => 255],
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
            'member_id' => 'Member name',
            'amount_paid' => 'Amount Paid',
            'invoice_no' => 'Invoice No',
            'date_paid' => 'Date Paid',
        ];
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
