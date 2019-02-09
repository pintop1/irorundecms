<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Irorunde CMES - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="@yield('dot')dashboard/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/themify-icons.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/metisMenu.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/typography.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/default-css.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/styles.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/responsive.css">
    <link rel="stylesheet" href="@yield('dot')dashboard/assets/css/signature-pad.css">
    <!-- modernizr css -->
    <script src="@yield('dot')dashboard/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body @yield('body')>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="/"><img src="@yield('dot')dashboard/assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="@yield('dash')"><a href="/member" aria-expanded="true"><i class="fa fa-desktop"></i><span>dashboard</span></a></li>
                            <li class="@yield('loans')">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cubes"></i><span>Loans</span></a>
                                <ul class="collapse">
                                    <li><a href="/member/loan/apply">Apply</a></li>
                                    <li><a href="/member/loan/active">Active</a></li>
                                    <li><a href="/member/loan/logs">Logs</a></li>
                                    <li><a href="/member/loan/status">Status</a></li>
                                </ul>
                            </li>
                            <li class="@yield('savings')">
                                <a href="/member/savings"><i class="ti-bar-chart"></i><span>Savings</span></a>
                            </li>
                            <li class="@yield('deposits')">
                                <a href="/member/deposits/"><i class="ti-credit-card"></i><span>Deposits</span></a>
                            </li>
                            <li class="@yield('thrifts')">
                                <a href="/member/thrifts"><i class="ti-control-forward"></i><span>Thrifts</span></a>
                            </li>
                            <li class="@yield('qla')">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-harddrives"></i><span>QLA</span></a>
                                <ul class="collapse">
                                    <li><a href="/member/qla/apply">Apply</a></li>
                                    <li><a href="/member/qla/active">Active</a></li>
                                    <li><a href="/member/qla/log">Log</a></li>
                                    <li><a href="/member/qla/status">Status</a></li>
                                </ul>
                            </li>
                            <li class="@yield('profile')">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user-o"></i><span>Profile</span></a>
                                <ul class="collapse">
                                    <li><a href="/member/profile/personal-details">Personal Details</a></li>
                                    <li><a href="/member/profile/work-details">Work Details</a></li>
                                    <li><a href="/member/profile/guarantor">Guarantor</a></li>
                                    <li><a href="/member/profile/financial-details">Financial Details</a></li>
                                    <li><a href="/member/profile/attestation">My Signature</a></li>
                                    <li><a href="/member/profile/next-of-kin">Next of Kin</a></li>
                                </ul>
                            </li>
                            <!--<li class="@yield('maps')">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-map-o"></i><span>Maps</span></a>
                                <ul class="collapse">
                                    <li><a href="/member/map/office">Our Office</a></li>
                                    <li><a href="/member/map/work">Your work address</a></li>
                                    <li><a href="/member/map/address">Your home address</a></li>
                                    <li><a href="/member/map/guarantor">Your guarantor's home address</a></li>
                                </ul>
                            </li>-->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
@yield('breadcrumbs')
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="@yield('dotPassport'){{ $user->passport }}">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($user->title." ".$user->last_name);?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/member/logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <br><br>
                @if($user->personal_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill the personal data form.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->work_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill the work data form.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->guarantor_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill the guarantor data form.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->financial_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill the financial data form.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->signature_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill enter your signature <a href="/member/profile/attestation">Click Here</a>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->guarantor_approval_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Pending guarantor's approval. Please contact your guarantor.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->attestation_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Pending administrative action.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($user->next_kin_status == '')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-dismiss">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Notice: </strong> Please fill the next of kin data form.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
@yield('main_content')
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Irorunde © Copyright 2018. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    @foreach($activity as $act)
                    <div class="timeline-task">
                        <div class="icon {{ $act->color }}">
                            <i class="{{ $act->icon }}"></i>
                        </div>
                        <div class="tm-title">
                            <h4>{{ $act->activity }}</h4>
                            <span class="time"><i class="ti-time"></i><?php echo  date("h:i a",strtotime($act->created_at));?></span>
                        </div>
                        <p>{{ $act->description }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="@yield('dot')dashboard/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="@yield('dot')dashboard/assets/js/popper.min.js"></script>
    <script src="@yield('dot')dashboard/assets/js/bootstrap.min.js"></script>
    <script src="@yield('dot')dashboard/assets/js/owl.carousel.min.js"></script>
    <script src="@yield('dot')dashboard/assets/js/metisMenu.min.js"></script>
    <script src="@yield('dot')dashboard/assets/js/jquery.slimscroll.min.js"></script>
    <script src="@yield('dot')dashboard/assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    @yield('myscript')
    <!-- all bar chart -->
    <script src="@yield('dot')dashboard/assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="@yield('dot')dashboard/assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="@yield('dot')dashboard/assets/js/plugins.js"></script>
    <script src="@yield('dot')dashboard/assets/js/scripts.js"></script>
</body>

</html>
