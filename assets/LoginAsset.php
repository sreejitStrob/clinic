<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'login/vendor/bootstrap/css/bootstrap.min.css',
        'login/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
        'login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css',
        'login/vendor/animate/animate.css',
        'login/vendor/css-hamburgers/hamburgers.min.css',
        'login/vendor/animsition/css/animsition.min.css',
        'login/vendor/select2/select2.min.css',
        'login/vendor/daterangepicker/daterangepicker.css',
        'login/css/util.css',
        'login/css/main.css',

    ];
    public $js = [
        'login/vendor/jquery/jquery-3.2.1.min.js',
        'login/vendor/animsition/js/animsition.min.js',
        'login/vendor/bootstrap/js/popper.js',
        'login/vendor/bootstrap/js/bootstrap.min.js',
        'login/vendor/select2/select2.min.js',
        'login/vendor/daterangepicker/moment.min.js',
        'login/vendor/daterangepicker/daterangepicker.js',
        'login/vendor/countdowntime/countdowntime.js',
        'login/js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
