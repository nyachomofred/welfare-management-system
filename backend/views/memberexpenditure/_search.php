
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
        <?php echo $form->field($model, 'search')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'search']) ?>
        </div>
        <?php //echo $form->field($model, 'member_id') ?>

        <?php //echo $form->field($model, 'expenditure') ?>

        <?php //echo $form->field($model, 'description') ?>

        <?php //echo$form->field($model, 'date_paid') ?>
        <div class="col-sm-2">
          <div class="row" style="height:20px;"></div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

