<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Member;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
?>

<div class="paymenthistory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_id')->dropDownList(
        ArrayHelper::map(Member::find()->all(),'id','name'),['prompt'=>'select....']
    ) ?>
    <?= $form->field($model, 'amount_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invoice_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_paid')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
