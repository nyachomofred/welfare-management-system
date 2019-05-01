<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php $this->beginBody() ?>

<div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="/advanced/backend/web/index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>Welfare </b>Mis</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Welfare </b>Mis</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <ul class="dropdown-menu">
                    <li class="header">You have 4 messages</li>

                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                  <div class="pull-right">
                   
                       <?php
                           echo
                          Html::beginForm(['/site/logout'], 'post'),
                           Html::submitButton(
                          'Logout (' . Yii::$app->user->identity->username . ')',
                           ['class' => 'btn btn-success Sign out']
                          ),
                         Html::endForm() 
                          ?>
                    
                  </div>
                </li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                </ul>
            </div>
            </nav>
        </header>
        <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                <img src="/welfare/backend/web/dist/img/avatar.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
               <!-- /.sidebar -->
               <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Users</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/advanced/backend/web/index.php?r=user/"><i class="fa fa-circle-o"></i> view</a></li>
                    </ul>
                </li>

                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-user"></i> <span>Members</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="/advanced/backend/web/index.php?r=member/"><i class="fa fa-circle-o"></i> View</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/advanced/backend/web/index.php?r=spouse">
                        <i class="fa fa-th"></i> <span>Spouses</span>
                        <span class="pull-right-container">
                        <small class="label pull-right bg-green">view</small>
                        </span>
                    </a>
                </li>
                <li>
                <a href="/advanced/backend/web/index.php?r=children">
                        <i class="fa fa-calendar"></i> <span>childrens</span>
                        <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        </span>
                    </a>
                </li>

                <li>
                <a href="/advanced/backend/web/index.php?r=balance">
                        <i class="fa fa-calendar"></i> <span>balances</span>
                        <span class="pull-right-container">
                        <small class="label pull-right bg-red"></small>
                        </span>
                    </a>
                </li>

                <li><a href="/advanced/backend/web/index.php?r=paymenthistory"><i class="fa fa-book"></i> <span>Payment history</span></a></li>
                <li><a href="/advanced/backend/web/index.php?r=memberexpenditure"><i class="fa fa-pie-chart"></i> <span>Expenditure</span></a></li>
                <li><a href="/advanced/backend/web/index.php?r=memberbalance"><i class="fa fa-table"></i> <span>Balances</span></a></li>
            </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
           
    <!-- Main content -->
    <section class="content" style="background-color:white">
      <!-- Small boxes (Stat box) -->
        <?= $content ?>
    </section>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
