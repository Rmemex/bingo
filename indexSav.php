<?php
    ob_start();
    if (session_status() === PHP_SESSION_NONE) session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BINGO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition layout-fixed" style="background-color: #212121;">
    <div class="container" style="width: 80%; margin-top: 2%;">
        <div class="card">
            <div class="card-body">
                <nav class="navbar navbar-expand col-12">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav col-8">
                        <a class="btn" id="play-page">
                            <h5 class="nav-item d-none d-sm-inline-block">HOME</h5>
                        </a>
                    </ul>
                    <ul class="navbar-nav ml-auto col-4">
                        <li class="nav-item mr-3 mt-2">
                            <h5 class="nav-item d-none d-sm-inline-block">
                                FAQ
                            </h5>
                        </li>
                        <li class="nav-item mr-4">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal-play-home" style="width: 200%;">PLAY</button>
                        </li>
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li class="nav-item ml-5 mr-2">
                                <button class="btn btn-success" id="asso-page">ASSOCIATION</button>
                            </li>
                        <?php else: ?>
                            <li class="nav-item ml-5 mr-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-login">ASSOCIATION</button>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php
                    require_once 'Database.php';
                    $database = Database::getInstance();
                    include_once 'view/bingo/modal-result.php';
                  
                    include_once 'view/bingo/modal-direct.php';
                    include_once 'view/login/modal-login.php';
                    include_once 'view/play/modal-play.php';
                    include_once 'view/play/modal-play-home.php';
                    include_once 'view/play/page-play.php';
                ?>
            </div> 

            <footer class="text-center mb-2">
                <strong>Copyright &copy; 2024</strong>
            </footer>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.js"></script>
    <script src="assets/custom/custom.js"></script>
    <script src="assets/custom/count.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>

</body>

</html>