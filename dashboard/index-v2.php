<?php
require_once "vistas/parte_superior-v2.php";
?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Simphony</a></li>
                                    <li class="breadcrumb-item active">10-12-2021</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Statistics card section -->
                <section id="statistics-card">
                    <!-- Miscellaneous Charts -->
                    <div class="row match-height justify-content-md-center">
                        <!-- Bar Chart -Orders -->
                        <!-- <div class="col-lg-2 col-6">
                            <div class="card">
                                <div class="card-body pb-50">
                                    <h6>Orders</h6>
                                    <h2 class="font-weight-bolder mb-1">2,76k</h2>
                                    <div id="statistics-bar-chart"></div>
                                </div>
                            </div>
                        </div> -->
                        <!--/ Bar Chart -->

                        <!-- Line Chart - Profit -->
                        <!-- <div class="col-lg-2 col-6">
                            <div class="card card-tiny-line-stats">
                                <div class="card-body pb-50">
                                    <h6>Profit</h6>
                                    <h2 class="font-weight-bolder mb-1">6,24k</h2>
                                    <div id="statistics-line-chart"></div>
                                </div>
                            </div>
                        </div> -->
                        <!--/ Line Chart -->
                        <div class="col-lg-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Ventas</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text mr-25 mb-0">Última actualización 18:05</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">$ 1.673.750</h4>
                                                    <p class="card-text font-small-3 mb-0">Venta Neta</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">$ -40.450</h4>
                                                    <p class="card-text font-small-3 mb-0">Descuentos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">$ 120.640</h4>
                                                    <p class="card-text font-small-3 mb-0">Propinas</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Miscellaneous Charts -->

                    <!-- Stats Vertical Card -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Formas de Pago</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 467.170</h2>
                                    <p class="card-text">Débito</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 250.990</h2>
                                    <p class="card-text">Efectivo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="user-check" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 283.000</h2>
                                    <p class="card-text">Cargo Hab.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 320.232</h2>
                                    <p class="card-text">Visa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 152.320</h2>
                                    <p class="card-text">MasterCard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">$ 0</h2>
                                    <p class="card-text">Amex</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Stats Vertical Card -->

                    <!-- Stats Horizontal Card -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Resumen</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="font-weight-bolder mb-0">$ 4.564.321</h2>
                                                <p class="card-text">Venta Ayer</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50 m-0">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="font-weight-bolder mb-0">$ 31.449.476</h2>
                                                <p class="card-text">Últimos 7 Días</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50 m-0">
                                                <div class="avatar-content">
                                                    <i data-feather="dollar-sign" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="font-weight-bolder mb-0">2</h2>
                                                <p class="card-text">Mesas Abiertas</p>
                                            </div>
                                            <div class="avatar bg-light-warning p-50 m-0">
                                                <div class="avatar-content">
                                                    <i data-feather="alert-octagon" class="font-medium-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-sm-12">
                            <section id="basic-datatable">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div>
                                                    <h4 class="font-weight-bolder mb-0">Venta Empleados</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="datatables-basic table">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th>id</th>
                                                            <th>Nombre</th>
                                                            <th>Correo</th>
                                                            <th>Fecha</th>
                                                            <th>Salario</th>
                                                            <th>Estado</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!--/ Line Chart Card -->
                </section>
                <!--/ Statistics Card section-->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
