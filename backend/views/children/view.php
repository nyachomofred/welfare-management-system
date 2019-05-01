<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Childrens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
        Child  Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Child profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/advanced/backend/web/dist/img/avatar.png" alt="User profile picture">

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
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
              
              <?= DetailView::widget([
              'model' => $model,
              'attributes' => [
                // 'id',
                  //'member_id',
                  'name',
                  'gender',
                  'age',
                  'birth_cert_no',
                  'member.name',
              ],
          ]) ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
              <div class="box-body">
              

               
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Name</th>
                  <th>Gender</th>
                  <th style="width: 40px">Idno</th>
                  <th style="width: 40px">Phonenumber</th>
                  <th style="width: 40px">Email</th>
                </tr>
                <tr>
                
                  
                  <td><span class="badge bg-red">55%</span></td>
                <tr>
                
              </table>
            </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    //'member_id',
                    'name',
                    'gender',
                    'age',
                    'birth_cert_no',
                    'member.name',
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
