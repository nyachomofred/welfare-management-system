<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Paymenthistory */

$this->title = Yii::t('app', 'add new payment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paymenthistories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymenthistory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
