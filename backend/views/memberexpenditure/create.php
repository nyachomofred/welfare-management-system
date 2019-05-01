<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Memberexpenditure */

$this->title = Yii::t('app', 'Add new expenditure');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Memberexpenditures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberexpenditure-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
