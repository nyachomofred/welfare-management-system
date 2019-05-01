<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Children */

$this->title = Yii::t('app', 'Add new child');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Childrens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
