<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Member;
use yii\helpers\ArrayHelper;

?>

<div class="spouse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_id')->dropDownList(
        ArrayHelper::map(Member::find()->all(),'id','name'),['prompt'=>'select....']
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phonenumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'national_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
