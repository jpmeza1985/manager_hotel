<?php require_once "vistas/parte_superior-v2.php"; ?>


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
                                    <li class="breadcrumb-item"><a href="index.html">Opera</a></li>
                                    <li class="breadcrumb-item active"><?php echo $dia ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Statistics card section -->
                <section id="statistics-card">
                    <div class="row match-height justify-content-md-center">
                        <div class="col-lg-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Manager Flash</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text mr-25 mb-0"><?php echo $dia ?></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="avatar-icon fas fa-door-open"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                        <?php
                                                            $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Rooms Occupied'");
                                                            while ($roomocc = mysqli_fetch_array($query)) {
                                                                echo $roomocc['dia'];
                                                            }
                                                        ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Habitaciones Disponibles</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i class="avatar-icon fas fa-door-closed"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Available Rooms'");
                                                        while ($availroom = mysqli_fetch_array($query)) {
                                                            echo $availroom['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Habitaciones Ocupadas</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-percent avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= '% Rooms Occupied'");
                                                        while ($roomperc = mysqli_fetch_array($query)) {
                                                            echo $roomperc['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">% Ocupación Hotel</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-percent avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= '% Rooms Occupied minus Comp and House'");
                                                        while ($roccmch = mysqli_fetch_array($query)) {
                                                            echo $roccmch['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">% Occ minus Comp & House</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-money-bill avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'ADR'");
                                                        while ($ADR = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $ADR['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Tarifa Promedio</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Room Revenue'");
                                                        while ($roomrev = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $roomrev['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Room Revenue</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Food And Beverage Revenue'");
                                                        while ($fbrev = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $fbrev['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Food And Bev Revenue</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Other Revenue'");
                                                        while ($orev = mysqli_fetch_array($query)) {
                                                          echo "$ ";
                                                            echo $orev['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Other Revenue</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="dollar-sign" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Revenue per Available Room'");
                                                        while ($revpar = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $revpar['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Revenue per Avail Room</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-user-tie avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'VIP Persons In-House'");
                                                        while ($vip = mysqli_fetch_array($query)) {
                                                            echo $vip['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">VIP Persons In-House</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Miscellaneous Charts -->

                    <div class="row match-height">
                        <div class="col-lg-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Llegadas y Salidas</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text mr-25 mb-0"><?php echo $dia ?></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row justify-content-xl-center justify-content-md-center">
                                        <div class="col-sm-6 col-xl-4 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-plane-arrival avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                        <?php
                                                            $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Arrival Rooms'");
                                                            while ($arrivals = mysqli_fetch_array($query)) {
                                                              echo $arrivals['dia'];
                                                            }
                                                        ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Llegadas (Habitaciones)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-warning mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-plane-departure avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT dia FROM manager_$location WHERE descrip= 'Departure Rooms'");
                                                        while ($departures = mysqli_fetch_array($query)) {
                                                          echo $departures['dia'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Salidas (Habitaciones)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row match-height justify-content-md-center">
                        <div class="col-lg-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Acumulado Mensual</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text mr-25 mb-0"></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-12 col-md-3 col-xl-3 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-hand-holding-usd avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                        <?php
                                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Room Revenue'");
                                                        while ($revmes = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $revmes['mes'];
                                                        }
                                                        ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Revenue acumulado</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-xl-3  mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-utensils avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Food And Beverage Revenue'");
                                                        while ($fbmes = mysqli_fetch_array($query)) {
                                                          echo "$ ";
                                                            echo $fbmes['mes'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">F&B acumulado</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-xl-3  mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-coins avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                        $query = $mysqli -> query ("SELECT mes FROM manager_$location WHERE descrip= 'Total Revenue'");
                                                        while ($totmes = mysqli_fetch_array($query)) {
                                                            echo "$ ";
                                                            echo $totmes['mes'];
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Total Revenue</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!--/ Statistics Card section-->

            </div>
        </div>
    </div>
    <!-- END: Content-->

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior-v2.php"?>
