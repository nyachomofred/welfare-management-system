<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //echo $form->field($model, 'id') ?>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" placeholder="Search Mail">
            <?= $form->field($model,'name')->textField(['class'=>'form-control input-sm'])?>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>

    <?php //echo $form->field($model, 'idno') ?>
    <?php //echo $form->field($model, 'name') ?>
    <?php //echo $form->field($model, 'gender') ?>
    <?php //echo $form->field($model, 'phonenumber') ?>
    <?php // echo $form->field($model, 'email') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
