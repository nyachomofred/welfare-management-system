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
        Member  Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Member profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/advanced/backend/web/dist/img/avatar04.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $model->name?></h3>

              <p class="text-muted text-center">Walfare member</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total credit</b> <a class="pull-right"><?= $total_credit?></a>
                </li>
                <li class="list-group-item">
                  <b>Total debit</b> <a class="pull-right"><?= $total_debit?></a>
                </li>
                <li class="list-group-item">
                  <b>Balance</b> <a class="pull-right"><?= $balance?></a>
                </li>
              </ul>
              <?= Html::a(' home',['site/index'],['class'=>'btn btn-primary btn-block'])?>
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
              <li><a href="#credit" data-toggle="tab">credit history</a></li>
              <li><a href="#timeline" data-toggle="tab">Debit history</a></li>
              <li><a href="#children" data-toggle="tab">No of children</a></li>
              <li><a href="#spouse" data-toggle="tab">No of spouse</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
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
              <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'idno',
                    'name',
                    'gender',
                    'phonenumber',
                    'email:email',
                ],
            ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="credit">
                  <table class="table table-bordered"> 
                        <tr>
                          <th>Id</th>
                          <th>member id</th>
                          <th>expenditure</th>
                          <th>Description</th>
                          <th>Date payed</th>
                        </tr>
                        <?php foreach($cred as $credit){?>
                        <tr>
                          <td><?php echo $credit['id']?></td>
                          <td><?php echo $credit['member_id']?></td>
                          <td><?php echo $credit['amount_paid']?></td>
                          <td><?php echo $credit['invoice_no']?></td>
                          <td><?php echo $credit['date_paid']?></td>
                        </tr>
                        <?php }?>
                    </table>
              </div>
              <div class="tab-pane" id="timeline">
                <div class="box-body">
                  <table class="table table-bordered"> 
                        <tr>
                          <th>Id</th>
                          <th>member id</th>
                          <th>expenditure</th>
                          <th>Description</th>
                          <th>Date payed</th>
                        </tr>
                        <?php foreach($display as $dis){?>
                        <tr>
                          <td><?php echo $dis['id']?></td>
                          <td><?php echo $dis['member_id']?></td>
                          <td><?php echo $dis['expediture']?></td>
                          <td><?php echo $dis['description']?></td>
                          <td><?php echo $dis['date_payed']?></td>
                        </tr>
                        <?php }?>
                    </table>
                  </div>
              </div>
              <div class="tab-pane" id="children">
                 <table class="table table-bordered"> 
                        <tr>
                          <th>Id</th>
                          <th>member id</th>
                          <th>name</th>
                          <th>gender</th>
                          <th>age</th>
                          <th>birth certificate no</th>
                        </tr>
                        <?php foreach($children as $child){?>
                        <tr>
                          <td><?php echo $child['id']?></td>
                          <td><?php echo $child['member_id']?></td>
                          <td><?php echo $child['name']?></td>
                          <td><?php echo $child['gender']?></td>
                          <td><?php echo $child['age']?></td>
                          <td><?php echo $child['birth_cert_no']?></td>
                        </tr>
                        <?php }?>
                     </table>
              </div>

              <div class="tab-pane" id="spouse">
                  <table class="table table-bordered"> 
                        <tr>
                          <th>Id</th>
                          <th>member id</th>
                          <th>name</th>
                          <th>phonenumber</th>
                          <th>email</th>
                          <th>address</th>
                          <th>national id</th>
                        </tr>
                        <?php foreach($spouse as $spouses){?>
                        <tr>
                          <td><?php echo $spouses['id']?></td>
                          <td><?php echo $spouses['member_id']?></td>
                          <td><?php echo $spouses['name']?></td>
                          <td><?php echo $spouses['phonenumber']?></td>
                          <td><?php echo $spouses['email']?></td>
                          <td><?php echo $spouses['address']?></td>
                          <td><?php echo $spouses['national_id']?></td>
                        </tr>
                        <?php }?>
                     </table>
              </div>
              <!-- /.tab-pane -->

              
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
