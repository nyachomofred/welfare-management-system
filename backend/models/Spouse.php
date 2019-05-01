<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "spouse".
 *
 * @property int $id
 * @property int $member_id
 * @property string $name
 * @property string $phonenumber
 * @property string $email
 * @property string $address
 * @property string $national_id
 *
 * @property Member $member
 */
class Spouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id'], 'integer'],
           
            [['name'],'required'],
            [['name'], 'string' ,'min'=>10,'max'=>40],
            [['name'], 'match' ,'pattern' => '/^[a-zA-Z\s]+$/','message'=>'only character string ia allowed'],
            [['name'], 'filter' ,'filter'=>'trim'],
            [['name'], 'filter' ,'filter'=>'strtolower'],
            //validation for phonenumber
            [[ 'phonenumber'], 'integer'],
            [[ 'phonenumber'], 'unique'],
            [[ 'phonenumber'], 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Field must contain exactly 10 digits'],
            //validation for eemail
            [['email'], 'email'],
            [['email'], 'unique'],
            //validation for address
            [['address'], 'string' ,'min'=>5,'max'=>40],
            [['address'], 'match' ,'pattern' => '/^[a-zA-Z\s]+$/','message'=>'only character string ia allowed'],
            [['address'], 'filter' ,'filter'=>'trim'],
            [['address'], 'filter' ,'filter'=>'strtolower'],

            //validation for national_id
            [[ 'national_id'], 'integer'],
            [[ 'national_id'], 'unique'],
            [[ 'national_id'], 'match', 'pattern' => '/^\d{8}$/', 'message' => 'Field must contain exactly 8 digits'],
        
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
            'name' => 'Name of spouse',
            'phonenumber' => 'Phonenumber',
            'email' => 'Email',
            'address' => 'Address',
            'national_id' => 'National id of spouse',
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
