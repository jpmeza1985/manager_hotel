<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" id="html-id">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="author" content="PIXINVENT">
    <title>MANAGER By ITH</title>
    <link href="assets/font/font-style.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
    <script>
        miStorage = window.localStorage;
        const current_mode = miStorage.getItem('light-layout-current-skin');
        if (!!current_mode) {
            let htmlTag = document.getElementById('html-id')
            htmlTag.classList.add(current_mode);
        }
    </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="brand-logo">
                                    <img src="./assets/images/logo.png" alt="ITH" width="110px">
                                    <h2 class="brand-text text-primary ml-1">ITH Sistemas</h2>
                                </a>

                                <h4 class="card-title mb-1">Bienvenido</h4>
                                <p class="card-text mb-2">Por favor ingrese sus credenciales</p>

                                <form class="auth-login-form mt-2" action="action/processlogin-action.php" method="POST">
                                    <div class="form-group">
                                        <label for="login-email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="login-email" name="email" placeholder="alguien@correo.com" aria-describedby="login-email" tabindex="1" autofocus autocomplete="off" />
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Contraseña</label>
                                            <a href="page-auth-forgot-password-v1.html">
                                                <small>Olvidó su contraseña?</small>
                                            </a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="pass" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Conectar</button>
                                </form>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/js/core/app-menu.js"></script>
    <script src="assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="assets/js/scripts/pages/page-auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>