<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= Html::encode($this->title) ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!--    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!--    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">-->

    <!--    <link rel="stylesheet" href="dist/css/adminlte.min.css">-->
    <link rel="shortcut icon" href=<?= Yii::$app->urlManager->createAbsoluteUrl('images/logo.png'); ?>>
    <?php // $this->registerCsrfMetaTags() ?>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <script type="application/javascript">
        var baseUrl = '<?php echo BaseUrl::home(); ?>';
        var _csrf = '<?php echo Yii::$app->request->getCsrfToken() ?>';
    </script>
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php $this->beginBody() ?>

<div class="wrapper">

    <!-- Preloader -->
    <!--    <div class="preloader flex-column justify-content-center align-items-center">-->
    <!--        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">-->
    <!--    </div>-->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link"  href=<?=Yii::$app->urlManager->createAbsoluteUrl('site/logout') ?>>
                    <i class="fas fa-power-off"></i>
                </a>

            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?php echo BaseUrl::home() ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Clinic Management</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo BaseUrl::home() ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Snehal Sawant</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                  <?php
                  $controller = $this->context->action->controller->id;
                  $method = $this->context->action->id;
                  $current_action = $controller . '/' . $method;
            echo \hail812\adminlte\widgets\Menu::widget([
                'options' => [
                    "class" => 'nav-child-indent'
                ],
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        'url' => ['dashboard/index'],
                        'iconStyle' => 'fas',
                        'options' =>
                            [
                                "class" => 'nav-item'
                            ]
                    ],
                    ['label' => 'Clinic Management', 'header' => true],

                    [
                        'label' => 'Appointments',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'appointment') ? true : "",
                        'items' => [
                            [
                                'label' => 'Create Appointment',
                                'icon' => 'chart-bar',
                                'url' => ['appointment/create'],
                                'iconStyle' => 'fas',
                                'active' => ($controller == 'appointment' && $method == 'create' || $method == 'update' || $method == 'view') ? true : "",
                            ],

                            [
                                'label' => 'Manage Appointment',
                                'icon' => 'chart-bar',
                                'url' => ['appointment/index'],
                                'active' => ($controller == 'appointment' && $method == 'index') ? true : "",
                                'iconStyle' => 'fas',
                            ],
                        ]
                    ],
                    [
                        'label' => 'Patients',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'patient') ? true : "",
                        'items' => [
                            [
                                'label' => 'Create Patient',
                                'icon' => 'chart-bar',
                                'url' => ['patient/create'],
                                'iconStyle' => 'fas',
                                'active' => ($controller == 'patient' && $method == 'create' || $method == 'update' || $method == 'view') ? true : "",
                            ],
                            [
                                'label' => 'Manage patient',
                                'icon' => 'chart-bar',
                                'url' => ['patient/index'],
                                'active' => ($controller == 'patient' && $method == 'index') ? true : "",
                                'iconStyle' => 'fas',
                            ],
                        ]
                    ],
                    [
                        'label' => 'Inventory',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'inventory') ? true : "",
                        'items' => [
                            [
                                'label' => 'Create Item',
                                'icon' => 'chart-bar',
                                'url' => ['inventory/create'],
                                'iconStyle' => 'fas',
                            ],
                            [
                                'label' => 'Manage Inventory',
                                'icon' => 'chart-bar',
                                'url' => ['inventory/create'],
                                'iconStyle' => 'fas',
                            ],
                        ]
                    ],
                    [
                        'label' => 'Medical Representative',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'medical-representative') ? true : "",
                        'items' => [
                            [
                                'label' => 'Create MR',
                                'icon' => 'chart-bar',
                                'url' => ['patient/create'],
                                'iconStyle' => 'fas',
                                'active' => ($controller == 'medical-representative' && $method == 'create' || $method == 'update' || $method == 'view') ? true : "",
                            ],
                            [
                                'label' => 'Manage MR',
                                'icon' => 'chart-bar',
                                'url' => ['patient/index'],
                                'active' => ($controller == 'medical-representative' && $method == 'index') ? true : "",
                                'iconStyle' => 'fas',
                            ],
                        ]
                    ],
                    [
                        'label' => 'Reports',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'inventory') ? true : "",
                        'items' => [
                            [
                                'label' => 'Create Item',
                                'icon' => 'chart-bar',
                                'url' => ['inventory/create'],
                                'iconStyle' => 'fas',
                            ],
                            [
                                'label' => 'Manage Inventory',
                                'icon' => 'chart-bar',
                                'url' => ['inventory/create'],
                                'iconStyle' => 'fas',
                            ],
                        ]
                    ],
                    [
                        'label' => 'Settings',
                        'icon' => 'person-booth',
                        'iconStyle' => 'fas',
                        'active' => ($controller == 'consultation-type' || $controller == 'ailment') ? true : "",
                        'items' => [
                            [
                                'label' => 'Manage Consultation',
                                'icon' => 'chart-bar',
                                'url' => ['consultation-type/index'],
                                'iconStyle' => 'fas',
                                'active' => ($controller == 'consultation-type' ) ? true : "",
                            ],
                            [
                                'label' => 'Manage Ailment',
                                'icon' => 'chart-bar',
                                'url' => ['ailment/index'],
                                'iconStyle' => 'fas',
                                'active' => ($controller == 'ailment') ? true : "",
                            ],
                        ]
                    ],

                ],
                "options" => [
                    'class' => " nav-collapse-hide-child nav nav-pills nav-sidebar flex-column nav-child-indent",
                    'data-widget' => 'treeview',
                    'role' => 'menu',
                    'data-accordion' => 'true'
                ]
                ]);
            ?>

            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><?= $this->title ?></h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <?= $content ?>

                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->

                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>


<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<!--<script src="plugins/jquery/jquery.min.js"></script>-->

<!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->

<!--<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->

<!--<script src="dist/js/adminlte.js"></script>-->
<!---->

<!--<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>-->
<!--<script src="plugins/raphael/raphael.min.js"></script>-->
<!--<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>-->
<!--<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>-->

<!--<script src="plugins/chart.js/Chart.min.js"></script>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
