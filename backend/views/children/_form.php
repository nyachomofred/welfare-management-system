<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Member;
use yii\helpers\ArrayHelper;
?>

<div class="children-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'member_id')->dropDownList(
        ArrayHelper::map(Member::find()->all(),'id','name'),['prompt'=>'select....']
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_cert_no')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
