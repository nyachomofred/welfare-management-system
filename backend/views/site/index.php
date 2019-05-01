<?php
use backend\models\Member;
use backend\models\Spouse;
use backend\models\Children;
use backend\models\Paymenthistory;
use backend\models\Memberexpenditure;
use backend\models\Memberbalance;



//get total of the registered people
$total_member=Member::find()->count();
//get total registered childer
$total_children=Children::find()->count();
$total_spouses=Spouse::find()->count();
$total_participant=$total_member+$total_children+$total_spouses;
//get total paymenthistory or credit
$credit=Paymenthistory::find()->sum('amount_paid');
//get total debit
$debit=Memberexpenditure::find()->sum('expediture');
//get balances
$balance=Memberbalance::find()->sum('balance');

?>
    <section class="content-header">
      <h1>
        Admin 
        <small>Control panel</small>
     </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_member?></h3>

              <p>registered members</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/advanced/backend/web/index.php?r=member" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
         </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>ksh<?php echo $credit?></h3>

              <p>Total credit</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/advanced/backend/web/index.php?r=paymenthistory" class="small-box-footer">More info <i class="fa fa-arrow-s-right"></i></a>
          </div>
         </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>ksh<?php echo $debit;?></h3>

              <p>Total debit</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/advanced/backend/web/index.php?r=memberexpenditure" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>ksh<?php echo $balance;?></h3>

              <p>Total Balances</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/advanced/backend/web/index.php?r=memberbalance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
     
      <div class="row">
       
         
       <div class="box box-solid bg-green-gradient">
         <div class="box-header">
           <i class="fa fa-calendar"></i>

           <h3 class="box-title">Calendar</h3>
           <!-- tools box -->
           <div class="pull-right box-tools">
             <!-- button with a dropdown -->
             <div class="btn-group">
               <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                 <i class="fa fa-bars"></i></button>
               <ul class="dropdown-menu pull-right" role="menu">
                 <li><a href="#">Add new event</a></li>
                 <li><a href="#">Clear events</a></li>
                 <li class="divider"></li>
                 <li><a href="#">View calendar</a></li>
               </ul>
             </div>
             <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
             </button>
             <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
             </button>
           </div>
           <!-- /. tools -->
         </div>
         <!-- /.box-header -->
         <div class="box-body no-padding">
           <!--The calendar -->
           <div id="calendar" style="width: 100%"></div>
         </div>
         <!-- /.box-body -->
         <div class="box-footer text-black">
           <div class="row">
             <div class="col-sm-6">
               <!-- Progress bars -->
               <div class="clearfix">
                 <span class="pull-left">Members registration</span>
                 <small class="pull-right"><?php echo $total_member;?></small>
               </div>
               <div class="progress xs">
                 <div class="progress-bar progress-bar-green" style="width: <?php echo$total_member;?>%;"></div>
               </div>

               <div class="clearfix">
                 <span class="pull-left">Spouses registration</span>
                 <small class="pull-right"><?php echo$total_spouses;?></small>
               </div>
               <div class="progress xs">
                 <div class="progress-bar progress-bar-green" style="width: <?php echo$total_spouses;?>%;"></div>
               </div>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
               <div class="clearfix">
                 <span class="pull-left">Children registration</span>
                 <small class="pull-right"><?php echo$total_children;?></small>
               </div>
               <div class="progress xs">
                 <div class="progress-bar progress-bar-green" style="width: <?php echo$total_spouses;?>%;"></div>
               </div>

               <div class="clearfix">
                 <span class="pull-left">Total participant</span>
                 <small class="pull-right"><?php echo$total_participant;?></small>
               </div>
               <div class="progress xs">
                 <div class="progress-bar progress-bar-green" style="width: <?php echo$total_participant;?>%;"></div>
               </div>
             </div>
             <!-- /.col -->
           </div>
           <!-- /.row -->
         </div>
       </div>
   </div>
  </section>
  


      
    
   
  
