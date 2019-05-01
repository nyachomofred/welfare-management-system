<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "children".
 *
 * @property int $id
 * @property int $member_id
 * @property string $name
 * @property string $gender
 * @property string $age
 * @property string $birth_cert_no
 *
 * @property Member $member
 */
class Children extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'children';
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
            //validation for age
            [['age'],'integer'],
            //validation for birth_cert no
            [['birth_cert_no'], 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Field must contain exactly 10 digits'],
            [['birth_cert_no'], 'unique' ,'message'=>'this id is already taken'],
            ///validation for 
            [[ 'gender', ], 'string'],
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
            'name' => 'Name of child',
            'gender' => 'Gender',
            'age' => 'Age',
            'birth_cert_no' => 'Birth Cert No',
            'search'=>'',
        ];
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }
}
