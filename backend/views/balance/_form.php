<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Member;


/* @var $this yii\web\View */
/* @var $model backend\models\Balance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="balance-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'member_id')->dropDownList(
        ArrayHelper::map(Member::find()->all(),'id','name'),['prompt'=>'select....']
    ) ?>
    <?= $form->field($model, 'balance')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
