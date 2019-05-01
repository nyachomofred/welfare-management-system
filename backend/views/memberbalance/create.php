<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Memberbalance */

$this->title = Yii::t('app', 'Create Memberbalance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberbalances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberbalance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
