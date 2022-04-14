<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/back/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="/back/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="/back/css/style.css" rel="stylesheet" />
    <link href="/back/css/dark-style.css" rel="stylesheet" />
    <link href="/back/css/transparent-style.css" rel="stylesheet">
    <link href="/back/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="/back/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/back/colors/color1.css" />

</head>

<body class="app sidebar-mini ltr">

    <!-- /backGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="/back/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="/back/images/brand/logo-white.png" class="header-brand-img" alt="">
                    </div>
                </div>

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        @if(Session::has('error'))
                        <div class="alert alert-danger text-white">{{session('error')}}</div>
                        @elseif (Session::has('success'))
                        <div class="alert alert-success text-white">{{session('success')}}</div>
                        @endif

                        <form action="{{route('manage.authenticate')}}" class="login100-form validate-form" method="POST">
                            @CSRF
                            <span class="login100-form-title pb-5">
                                Giriş Yap
                            </span>
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="mx-0"><a href="#tab5" class="active" data-bs-toggle="tab">Email</a></li>                                           
                                        </ul>
                                    </div>
                                   
                                </div>
                                <div class="panel-body tabs-menu-body p-0 pt-5">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab5">
                                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" required name="email" type="email" placeholder="Email" value="{{old('email')}}">
                                            </div>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" required type="password" name="password" placeholder="Parola">
                                            </div>
                                            <div class="text-end pt-4">
                                                <p class="mb-0"><a href="forgot-password.html" class="text-primary ms-1">Parolamı Unuttum</a></p>
                                            </div>
                                            <div class="container-login100-form-btn">
                                                <button type="submit" class="btn btn-primary">
                                                        Giriş
                                                </a>
                                            </div>
                                           
                                           
                                        </div>
                                        
                                        <div class="tab-pane" id="tab6">
                                            <div id="mobile-num" class="wrap-input100 validate-input input-group mb-4">
                                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                                    <span>+91</span>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0">
                                            </div>
                                            <div id="login-otp" class="justify-content-around mb-5">
                                                <input class="form-control text-center w-15" id="txt1" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt2" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt3" maxlength="1">
                                                <input class="form-control text-center w-15" id="txt4" maxlength="1">
                                            </div>
                                            <span>Note : Login with registered mobile number to generate OTP.</span>
                                            <div class="container-login100-form-btn ">
                                                <a href="javascript:void(0)" class="login100-form-btn btn-primary" id="generate-otp">
                                                    Proceed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- /backGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="/back/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="/back/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/back/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="/back/js/show-password.min.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="/back/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="/back/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- Color Theme js -->
    <script src="/back/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="/back/js/custom.js"></script>

</body>

</html>