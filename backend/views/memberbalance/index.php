
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use backend\models\Member;
use backend\models\Memberbalance;

$credit=Memberbalance::find()->sum('balance');
?>
<div class="member-index">
</div>

<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
<?= Yii::$app->session->getFlash('msg') ?>
  <div class="content-wrapperrr">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Total balance ksh
      <?php echo $credit;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Registered Members</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-0">
          <div class="box box-solid">
            <div class="box-body no-padding">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
              <div class="box-tools pull-right">
                <div class="has-feedback">
                  
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php Pjax::begin(); ?>
                  <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                    'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                       // 'member_id',
                       'member.name',
                       'member.idno',
                       'member.gender',
                       'member.phonenumber',
                       'member.email',
                        'balance',

                     ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                   <?php Pjax::end();?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="control-sidebar-bg"></div>
</body>
</html>
