<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property int $idno
 * @property string $name
 * @property string $gender
 * @property string $phonenumber
 * @property string $email
 *
 * @property Children[] $childrens
 * @property Memberbalance[] $memberbalances
 * @property Memberexpenditure[] $memberexpenditures
 * @property Paymenthistory[] $paymenthistories
 * @property Spouse[] $spouses
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    public function rules()
    {
        return [
            [['idno','name','gender','phonenumber','email'], 'required'],

            [['idno'], 'match', 'pattern' => '/^\d{8}$/', 'message' => 'Field must contain exactly 8 digits'],
            [['idno'], 'unique' ,'message'=>'this id is already taken'],
            [['idno'], 'integer'],

            [['email'], 'email'],
            [['email'], 'unique'],

            [['name'], 'string' ,'min'=>10,'max'=>40],
            [['name'], 'match' ,'pattern' => '/^[a-zA-Z\s]+$/','message'=>'only character string ia allowed'],
            [['name'], 'filter' ,'filter'=>'trim'],
            [['name'], 'filter' ,'filter'=>'strtolower'],

            //validation for phonenumber
            [[ 'phonenumber'], 'integer'],
            [[ 'phonenumber'], 'unique'],
            [[ 'phonenumber'], 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Field must contain exactly 10 digits'],

            [['name', 'gender', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'idno' => 'Idno',
            'name' => 'Member name',
            'gender' => 'Gender',
            'phonenumber' => 'Phonenumber',
            'email' => 'Email',
            'search'=>'',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildrens()
    {
        return $this->hasMany(Children::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberbalances()
    {
        return $this->hasMany(Memberbalance::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberexpenditures()
    {
        return $this->hasMany(Memberexpenditure::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymenthistories()
    {
        return $this->hasMany(Paymenthistory::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpouses()
    {
        return $this->hasMany(Spouse::className(), ['member_id' => 'id']);
    }
}
