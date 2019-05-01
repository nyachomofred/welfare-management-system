<?php

namespace backend\models;
use backend\models\Memberbalance;


use Yii;

/**
 * This is the model class for table "memberexpenditure".
 *
 * @property int $id
 * @property int $member_id
 * @property string $expediture
 * @property string $description
 * @property string $date_payed
 *
 * @property Member $member
 */
class Memberexpenditure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberexpenditure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
            //validation for description
            [['description'], 'string' ,'min'=>5,'max'=>10],
            [['description'], 'match' ,'pattern' => '/^[a-zA-Z\s]+$/','message'=>'only character string ia allowed'],
            [['description'], 'filter' ,'filter'=>'trim'],
            [['description'], 'filter' ,'filter'=>'strtolower'],
             //validation for expenditure
             [['expediture'],'integer'],
            [['expediture', 'date_payed'], 'string', 'max' => 255],
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
            'expediture' => 'Amount spent',
            'description' => 'Description',
            'date_payed' => 'Date Payed',
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
