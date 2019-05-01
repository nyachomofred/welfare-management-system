<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css', 

        'css/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'css/bower_components/font-awesome/css/font-awesome.min.css',
        'css/bower_components/Ionicons/css/ionicons.min.css',
        'css/dist/css/AdminLTE.min.css',
        'css/dist/css/skins/_all-skins.min.css',
        'css/bower_components/jvectormap/jquery-jvectormap.css',
        'css/bower_components/morris.js/morris.css',
        'css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'css/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
     


    ];
    public $js = [
       
        'js/html5shiv.js',
        'js/respond.min.js',
        'js/jquery.js',
	    'js/bootstrap.min.js',
	    'js/jquery.scrollUp.min.js',
	    'js/price-range.js',
        'js/jquery.prettyPhoto.js',
        'js/main.js', 
        'js/contact.js',
        'js/gmaps.js',
        
        'js/bower_components/jquery/dist/jquery.min.js',
        'js/bower_components/jquery-ui/jquery-ui.min.js',
        'js/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'js/bower_components/raphael/raphael.min.js',
        'js/bower_components/morris.js/morris.min.js',
        'js/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'js/bower_components/jquery-knob/dist/jquery.knob.min.js',
        'js/bower_components/moment/min/moment.min.js',
        'js/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'js/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'js/bower_components/fastclick/lib/fastclick.js',
        'js/dist/js/adminlte.min.js',
        'js/dist/js/pages/dashboard.js',
        'js/dist/js/demo.js',
        'js/bower_components/Chart.js/Chart.js',
        'js/dist/js/pages/dashboard2.js',

        //ends here

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
