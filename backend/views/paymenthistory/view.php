<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Paymenthistory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paymenthistories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymenthistory-view">

    <p>
        <?= Html::a(Yii::t('app', 'back'), ['index'], ['class' => 'btn btn-success']) ?>  
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'member_id',
            'member.name',
            'amount_paid',
            'invoice_no',
            'date_paid',
        ],
    ]) ?>

</div>
