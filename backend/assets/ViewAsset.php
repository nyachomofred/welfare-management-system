<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ViewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //css for light template
        'css/assets/css/bootstrap.min.css',
        'css/assets/css/animate.min.css',
        'css/assets/css/demo.css',
        'css/assets/css/light-bootstrap-dashboard.css?v=1.4.0',
        'css/assets/css/pe-icon-7-stroke.css',
         /////

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
        //javascript for light weight template
         'js/assets/js/jquery.3.2.1.min.js',
	     'js/assets/js/bootstrap.min.js',
	     'js/assets/js/chartist.min.js',
         'js/assets/js/bootstrap-notify.js',
	     'js/assets/js/light-bootstrap-dashboard.js?v=1.4.0',
	     'js/assets/js/demo.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
