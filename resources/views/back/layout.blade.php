<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="../back/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Manage it!</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/back/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="/back/css/style.css" rel="stylesheet" />
    <link href="/back/css/dark-style.css" rel="stylesheet" />
   <!-- <link href="/back/css/transparent-style.css" rel="stylesheet"> -->
    <link href="/back/css/skin-modes.css" rel="stylesheet" />

    <!-- JQUERY JS -->
    <script src="/back/js/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>


    <!--- FONT-ICONS CSS -->
    <link href="/back/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/back/colors/color1.css" />

    <!-- INTERNAL Switcher css -->
    <link href="/back/switcher/css/switcher.css" rel="stylesheet" />
    <link href="/back/switcher/demo.css" rel="stylesheet" />

  
</head>

<body class="app sidebar-mini ltr light-mode">


    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                        <!-- sidebar-toggle-->
                        <a class="logo-horizontal " href="">
                            <img src="/back/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="/back/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                        <div class="d-flex order-lg-2 ms-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                            </button>
                            <div class="navbar navbar-collapse responsive-navbar p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex order-lg-2">
                                        <div class="dropdown d-lg-none d-flex">
                                            <a href="javascript:void(0)" class="nav-link icon"
                                                data-bs-toggle="dropdown">
                                                <i class="fe fe-search"></i>
                                            </a>
                                            <div class="dropdown-menu header-search dropdown-menu-start">
                                                <div class="input-group w-100 p-2">
                                                    <input type="text" class="form-control" placeholder="Search....">
                                                    <div class="input-group-text btn btn-primary">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex country">
                                            <a class="nav-link icon text-center" data-bs-target="#country-selector"
                                                data-bs-toggle="modal">
                                                <i class="fe fe-globe"></i><span
                                                    class="fs-16 ms-2 d-none d-xl-block">English</span>
                                            </a>
                                        </div>
                                        <!-- COUNTRY -->
                                        <div class="d-flex country">
                                            <a class="nav-link icon theme-layout nav-link-bg layout-setting">
                                                @if(Auth::user()->mode==0)
                                                <span class="light-layout"><i class="fe fe-sun"></i></span>
                                                @endif
                                                <span class="dark-layout"><i class="fe fe-moon"></i></span>
                                               
                                            </a>
                                        </div>
                                        <!-- Theme-Layout -->
                                        
                                        <div class="dropdown d-flex">
                                            <a class="nav-link icon full-screen-link nav-link-bg">
                                                <i class="fe fe-minimize fullscreen-button"></i>
                                            </a>
                                        </div>
                                        <!-- FULL-SCREEN -->
                                        <div class="dropdown  d-flex notifications">
                                            <a class="nav-link icon" data-bs-toggle="dropdown"><i
                                                    class="fe fe-bell"></i><span class=" pulse"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading border-bottom">
                                                    <div class="d-flex">
                                                        <h6 class="mt-1 mb-0 fs-16 fw-semibold text-dark">Notifications
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="notifications-menu">
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div
                                                            class="me-3 notifyimg  bg-primary brround box-shadow-primary">
                                                            <i class="fe fe-mail"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">New Application
                                                                received
                                                            </h5>
                                                            <span class="notification-subtext">3 days ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div
                                                            class="me-3 notifyimg  bg-secondary brround box-shadow-secondary">
                                                            <i class="fe fe-check-circle"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Project has been
                                                                approved</h5>
                                                            <span class="notification-subtext">2 hours ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div
                                                            class="me-3 notifyimg  bg-success brround box-shadow-success">
                                                            <i class="fe fe-shopping-cart"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Your Product Delivered
                                                            </h5>
                                                            <span class="notification-subtext">30 min ago</span>
                                                        </div>
                                                    </a>
                                                    <a class="dropdown-item d-flex" href="notify-list.html">
                                                        <div class="me-3 notifyimg bg-pink brround box-shadow-pink">
                                                            <i class="fe fe-user-plus"></i>
                                                        </div>
                                                        <div class="mt-1 wd-80p">
                                                            <h5 class="notification-label mb-1">Friend Requests</h5>
                                                            <span class="notification-subtext">1 day ago</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a href="notify-list.html"
                                                    class="dropdown-item text-center p-3 text-muted">View all
                                                    Notification</a>
                                            </div>
                                        </div>
                                        <!-- NOTIFICATIONS -->
                                       
                                        
                                        <!-- SIDE-MENU -->
                                        <div class="dropdown d-flex profile-1">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                                class="nav-link leading-none d-flex">
                                                <img src="../back/images/users/21.jpg" alt="profile-user"
                                                    class="avatar  profile-user brround cover-image">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <div class="drop-heading">
                                                    <div class="text-center">
                                                        <h5 class="text-dark mb-0 fs-14 fw-semibold">{{Auth::user()->name}}</h5>
                                                        <small class="text-muted">{{Auth::user()->role}}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown-divider m-0"></div>
                                                <a class="dropdown-item" href="{{route('user.edit',Auth::user()->id)}}">
                                                    <i class="dropdown-icon fe fe-user"></i> Profile
                                                </a>
                                                
                                                <a class="dropdown-item" href="lockscreen.html">
                                                    <i class="dropdown-icon fe fe-lock"></i> Lockscreen
                                                </a>
                                                <a class="dropdown-item" href="{{route('manage.logout')}}">
                                                    <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            <img src="../back/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="../back/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                            <img src="../back/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                            <img src="../back/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg>
                        </div>
                        <ul class="side-menu">

                            @include('back.default.menu')
                            
                        </ul>
                        <div class="slide-right" id="slide-right">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <br>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                @yield('content')

            </div>
            <!-- CONTAINER END -->
        </div>
    </div>
    <!--app-content close-->

    </div>


    <!-- Country-selector modal-->
    <div class="modal fade" id="country-selector">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content country-select-modal">
                <div class="modal-header">
                    <h6 class="modal-title">Choose Country</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <ul class="row p-3">
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block active">
                                <span class="country-selector"><img alt="" src="../back/images/flags/us_flag.jpg"
                                        class="me-3 language"></span>USA
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/italy_flag.jpg"
                                        class="me-3 language"></span>Italy
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/spain_flag.jpg"
                                        class="me-3 language"></span>Spain
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/india_flag.jpg"
                                        class="me-3 language"></span>India
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/french_flag.jpg"
                                        class="me-3 language"></span>French
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/russia_flag.jpg"
                                        class="me-3 language"></span>Russia
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/germany_flag.jpg"
                                        class="me-3 language"></span>Germany
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/argentina.jpg"
                                        class="me-3 language"></span>Argentina
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/malaysia.jpg"
                                        class="me-3 language"></span>Malaysia
                            </a>
                        </li>
                        <li class="col-lg-6 mb-2">
                            <a href="javascript:void(0)" class="btn btn-country btn-lg btn-block">
                                <span class="country-selector"><img alt="" src="../back/images/flags/turkey.jpg"
                                        class="me-3 language"></span>Turkey
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Country-selector modal-->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © <span id="year"></span> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->

    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>   


    <!-- BOOTSTRAP JS -->
    <script src="/back/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/back/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="/back/js/jquery.sparkline.min.js"></script>

    <!-- SWEET-ALERT JS -->
    <script src="../back/plugins/sweet-alert/sweetalert.min.js"></script>
    <script src="../back/js/sweet-alert.js"></script>

    <!-- Sticky js -->
    <script src="/back/js/sticky.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="/back/js/circle-progress.min.js"></script>

    <!-- PIETY CHART JS-->
    <script src="/back/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="/back/plugins/peitychart/peitychart.init.js"></script>

    <!-- SIDEBAR JS -->
    <script src="/back/plugins/sidebar/sidebar.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/back/plugins/p-scroll/perfect-scrollbar.js"></script>
    <script src="/back/plugins/p-scroll/pscroll.js"></script>
    <script src="/back/plugins/p-scroll/pscroll-1.js"></script>

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="/back/plugins/chart/Chart.bundle.js"></script>
    <script src="/back/plugins/chart/rounded-barchart.js"></script>
    <script src="/back/plugins/chart/utils.js"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="/back/plugins/select2/select2.full.min.js"></script>

    <!-- INTERNAL Data tables js-->
    <script src="/back/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/back/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="/back/plugins/datatable/dataTables.responsive.min.js"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="/back/js/apexcharts.js"></script>
    <script src="/back/plugins/apexchart/irregular-data-series.js"></script>

    <!-- C3 CHART JS -->
    <script src="/back/plugins/charts-c3/d3.v5.min.js"></script>
    <script src="/back/plugins/charts-c3/c3-chart.js"></script>

    <!-- CHART-DONUT JS -->
    <script src="/back/js/charts.js"></script>

    <!-- INTERNAL Flot JS -->
    <script src="/back/plugins/flot/jquery.flot.js"></script>
    <script src="/back/plugins/flot/jquery.flot.fillbetween.js"></script>
    <script src="/back/plugins/flot/chart.flot.sampledata.js"></script>
    <script src="/back/plugins/flot/dashboard.sampledata.js"></script>

    <!-- INTERNAL Vector js -->
    <script src="/back/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/back/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
 
    <!-- SIDEBAR JS -->
    <script src="/back/plugins/sidebar/sidebar.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="/back/plugins/sidemenu/sidemenu.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="/back/js/index1.js"></script>

    <!-- Color Theme js -->
    <script src="/back/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/back/js/custom.js"></script>

    
    <!-- DATA TABLE JS-->
    <script src="/back/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="/back/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="/back/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="/back/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="/back/plugins/datatable/js/jszip.min.js"></script>
    <script src="/back/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="/back/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="/back/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="/back/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="/back/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="/back/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="/back/plugins/datatable/responsive.bootstrap5.min.js"></script>
    <script src="/back/js/table-data.js"></script>
    
    <!-- Switcher js -->
    <script src="/back/switcher/js/switcher.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/tr.json'
                }
            });
        });
    </script>

</body>

</html>
