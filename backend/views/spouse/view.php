
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Paymenthistory;
use backend\models\Memberbalance;
use backend\models\Memberexpenditure;
use backend\models\Children;
use backend\models\Spouse;


$total_credit=Paymenthistory::find()->where(['member_id'=>$model->id])->sum('amount_paid');
$total_debit=MemberExpenditure::find()->where(['member_id'=>$model->id])->sum('expediture');
$balance=Memberbalance::find()->where(['member_id'=>$model->id])->sum('balance');

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$display=Memberexpenditure::find()->where(['member_id'=>$model->id])->all();
$cred=Paymenthistory::find()->where(['member_id'=>$model->id])->all();
$children=Children::find()->where(['member_id'=>$model->id])->all();
$spouse=Spouse::find()->where(['member_id'=>$model->id])->all();
?>


<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapperr">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapperr">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Spouse  Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Spouse profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/advanced/backend/web/dist/img/avatar3.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $model->name?></h3>

              <p>
                    <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                 </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">profile</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              <?= DetailView::widget([
                  'model' => $model,
                  'attributes' => [
                    // 'id',
                    // 'member_id',
                      'member.name',
                      'name',
                      'phonenumber',
                      'email:email',
                      'address',
                      'national_id',
                  ],
              ]) ?>
              
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
</div>

</body>
</html>
