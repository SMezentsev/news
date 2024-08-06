<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

  public $basePath = '@webroot';
  public $baseUrl = '@web';

  public $js = [
    'js/modernizr-3.6.0.min.js',
    'js/jquery-3.6.0.min.js',
    'js/popper.min.js',
    'js/bootstrap.min.js',
    'js/jquery.slicknav.js',
    'js/owl.carousel.min.js',
    'js/slick.min.js',
    'js/wow.min.js',
    'js/animated.headline.js',
    'js/jquery.magnific-popup.js',
    'js/jquery.ticker.js',
    'js/jquery.vticker-min.js',
    'js/jquery.scrollUp.min.js',
    'js/jquery.nice-select.min.js',
    'js/jquery.sticky.js',
    'js/perfect-scrollbar.js',
    'js/waypoints.min.js',
    'js/jquery.counterup.min.js',
    'js/jquery.theia.sticky.js',
//    'js/ionicons.js',
    'js/main.js',
  ];

  public $css = [

    /* Import third party CSS library */
    //'css/bootstrap.min.css',
    'css/owl.carousel.min.css',
    'css/ticker-style.css',
    'css/material-icons.min.css',
    'css/weather-icons.min.css',
    'css/ionicons.min.css',
    'css/flaticon.css',
    'css/slicknav.css',
    'css/animate.min.css',
    'css/magnific-popup.css',
    'css/fontawesome-all.min.css',
    'css/themify-icons.css',
    'css/slick.css',
    'css/nice-select.css',
    'css/perfect-scrollbar.css',

    'css/style.css',
    'css/widgets.css',
    'css/color.css',
    'css/responsive.css',

    'css/custom.css',
  ];

  public $depends = [
    'yii\web\YiiAsset',
///        'frontend\assets\AngularAsset',
        'yii\bootstrap4\BootstrapAsset',

  ];

  public $jsOptions = [
    'position' => \yii\web\View::POS_END
  ];

  public $cssOptions = [
    'position' => \yii\web\View::POS_HEAD
  ];

  public $publishOptions = [
    'forceCopy' => true
  ];
}
