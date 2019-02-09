<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Irorunde CMES || Admin Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../dashboard/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../dashboard/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../dashboard/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../dashboard/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../dashboard/assets/css/typography.css">
    <link rel="stylesheet" href="../dashboard/assets/css/default-css.css">
    <link rel="stylesheet" href="../dashboard/assets/css/styles.css">
    <link rel="stylesheet" href="../dashboard/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../dashboard/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post" action="{{ route('admin_login') }}">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-warning"><center><h4>{{$errors->first()}}</h4></center></div>
                    @endif
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your members!!!</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <!--<div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>-->
                            <div class="col-6 text-left">
                                <a href="/forgot-password">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <!--<div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="regis">Sign up</a></p>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="../dashboard/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../dashboard/assets/js/popper.min.js"></script>
    <script src="../dashboard/assets/js/bootstrap.min.js"></script>
    <script src="../dashboard/assets/js/owl.carousel.min.js"></script>
    <script src="../dashboard/assets/js/metisMenu.min.js"></script>
    <script src="../dashboard/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../dashboard/assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="../dashboard/assets/js/plugins.js"></script>
    <script src="../dashboard/assets/js/scripts.js"></script>
</body>

</html>