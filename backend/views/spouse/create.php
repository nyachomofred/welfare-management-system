<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Spouse */

$this->title = Yii::t('app', 'Add Spouse');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Spouses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spouse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
