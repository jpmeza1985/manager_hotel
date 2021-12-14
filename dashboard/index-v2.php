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
                                                        <i class="fas fa-money-bill avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                      $ventadia =
                                                      "SELECT SUM(NETSALESTOTAL)
                                                      FROM LOCATION_ACTIVITY_DB.OPERATIONS_DAILY_TOTAL
                                                      WHERE LOCATIONID= $location AND BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') ";
                                                      $stid = oci_parse($conexion, $ventadia);
                                                      oci_execute ($stid);
                                                        while (oci_fetch($stid)) {
                                                          echo "$ ";
                                                          echo oci_result ($stid,('SUM(NETSALESTOTAL)'));
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Venta Neta</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-money-bill avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                      $descuentos =
                                                      "SELECT SUM(DDT.DISCOUNTTOTAL)
                                                      FROM LOCATION_ACTIVITY_DB.DISCOUNT_DAILY_TOTAL DDT
                                                      WHERE DDT.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND DDT.LOCATIONID= $location";
                                                      $stid = oci_parse($conexion, $descuentos);
                                                      oci_execute ($stid);
                                                        while (oci_fetch($stid)) {
                                                          echo "$ ";
                                                          echo oci_result ($stid,('SUM(DDT.DISCOUNTTOTAL)'));
                                                        }
                                                    ?>
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Descuentos</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i class="fas fa-money-bill avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">
                                                    <?php
                                                      $propinas =
                                                      "SELECT SUM(SCDT.SERVICECHARGETOTAL)
                                                      FROM LOCATION_ACTIVITY_DB.SERVICE_CHARGE_DAILY_TOTAL SCDT
                                                      WHERE SCDT.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND SCDT.LOCATIONID= $location";
                                                      $stid = oci_parse($conexion, $propinas);
                                                      oci_execute ($stid);
                                                        while (oci_fetch($stid)) {
                                                          echo "$ ";
                                                          echo oci_result ($stid,('SUM(SCDT.SERVICECHARGETOTAL)'));
                                                        }
                                                      ?>
                                                    </h4>
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
                                          <i class="fas fa-credit-card font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                    <?php
                                      $debito =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_debito";
                                      $stid = oci_parse($conexion, $debito);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
                                    <p class="card-text">Débito</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                          <i class="fas fa-money-bill font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                      <?php 
                                        $efectivo =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_cash";
                                      $stid = oci_parse($conexion, $efectivo);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
                                    <p class="card-text">Efectivo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                          <i class="fas fa-money-bill font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                    <?php
                                      $carghab =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_room ";
                                      $stid = oci_parse($conexion, $carghab);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
                                    <p class="card-text">Cargo Hab.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                          <i class="fab fa-cc-visa font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                    <?php
                                      $visa =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_visa";
                                      $stid = oci_parse($conexion, $visa);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
                                    <p class="card-text">Visa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                          <i class="fab fa-cc-mastercard font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                    <?php
                                      $visa =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_master";
                                      $stid = oci_parse($conexion, $visa);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
                                    <p class="card-text">MasterCard</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                          <i class="fab fa-cc-amex font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">
                                    <?php
                                      $amex =
                                        "SELECT SUM(TMD.TENDERMEDIATOTAL)
                                        FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD
                                        WHERE TMD.LOCATIONID= $location AND TMD.BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') AND TMD.TENDERMEDIAID= $loc_amex";
                                      $stid = oci_parse($conexion, $amex);
                                      oci_execute ($stid);
                                        while (oci_fetch($stid)) {
                                          echo "$ ";
                                          echo oci_result ($stid,('SUM(TMD.TENDERMEDIATOTAL)'));
                                        }
                                      ?>
                                    </h2>
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
                                                <h2 class="font-weight-bolder mb-0">
                                                  <?php 
                                                  $ventadia =
                                                  "SELECT SUM(NETSALESTOTAL)
                                                  FROM LOCATION_ACTIVITY_DB.OPERATIONS_DAILY_TOTAL
                                                  WHERE LOCATIONID= $location AND BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy') - 1";
                                                  $stid = oci_parse($conexion, $ventadia);
                                                  oci_execute ($stid);
                                                    while (oci_fetch($stid)) {
                                                      echo "$ ";
                                                      echo oci_result ($stid,('SUM(NETSALESTOTAL)'));
                                                    }
                                                  ?>
                                                </h2>
                                                <p class="card-text">Venta Ayer</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="fas fa-funnel-dollar font-medium-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="font-weight-bolder mb-0">
                                                  <?php 
                                                    $ventadia =
                                                    "SELECT SUM(NETSALESTOTAL)
                                                    FROM LOCATION_ACTIVITY_DB.OPERATIONS_DAILY_TOTAL
                                                    WHERE LOCATIONID= $location AND BUSINESSDATE BETWEEN TO_DATE('$dia', 'dd-mm-yy') - 7 AND TO_DATE('$dia', 'dd-mm-yy') -1 ";
                                                    $stid = oci_parse($conexion, $ventadia);
                                                    oci_execute ($stid);
                                                      while (oci_fetch($stid)) {
                                                        echo "$ ";
                                                        echo oci_result ($stid,('SUM(NETSALESTOTAL)'));
                                                      }
                                                    ?>
                                                </h2>
                                                <p class="card-text">Últimos 7 Días</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="fas fa-funnel-dollar font-medium-5"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xl-12 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="font-weight-bolder mb-0">
                                                <?php
                                                  $openchks =
                                                    "SELECT COUNT(*) FROM LOCATION_ACTIVITY_DB.GUEST_CHECK GC
                                                    WHERE GC.OPENBUSINESSDATE= TO_DATE('$dia', 'dd-mm-yy') AND GC.LOCATIONID= $location AND GC.CLOSEBUSINESSDATE IS NULL";
                                                  $stid = oci_parse($conexion, $openchks);
                                                  oci_execute ($stid);
                                                    while (oci_fetch($stid)) {
                                                      echo oci_result ($stid,('COUNT(*)'));
                                                    }
                                                  ?>
                                                </h2>
                                                <p class="card-text">Mesas Abiertas</p>
                                            </div>
                                            <div class="avatar bg-light-warning p-50 m-0">
                                                <div class="avatar-content">
                                                    <i class="fas fa-door-open font-medium-5"></i>
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
                                                      <th>Nombre</th>
                                                      <th>Apellido</th>
                                                      <th>Venta .</th>
                                                      <th>RVC</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                  <?php
                                                    $ventadia = "SELECT  EMP.FIRSTNAME , EMP.LASTNAME , SUM(DT.NETSALESTOTAL), RVC.NAMEMASTER FROM LOCATION_ACTIVITY_DB.EMPLOYEE_DAILY_TOTAL DT INNER JOIN LOCATION_ACTIVITY_DB.EMPLOYEE EMP ON DT.EMPLOYEEID = EMP.EMPLOYEEID JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = DT.REVENUECENTERID
                                                    WHERE DT.LOCATIONID= $location AND BUSINESSDATE = TO_DATE('$dia', 'dd-mm-yy')
                                                    GROUP BY  EMP.FIRSTNAME , EMP.LASTNAME, DT.NETSALESTOTAL, RVC.NAMEMASTER";
                                                    $stid = oci_parse($conexion, $ventadia);
                                                    oci_execute ($stid);
                                                    while (oci_fetch($stid)) {
                                                    echo '<tr>
                                                    <td>'.oci_result($stid, 'FIRSTNAME').'</td>
                                                    <td>'.oci_result($stid, 'LASTNAME').'</td>
                                                    <td>'.oci_result($stid, 'SUM(DT.NETSALESTOTAL)').'</td>
                                                    <td>'.oci_result($stid,'NAMEMASTER').'</td>
                                                      </tr>';
                                                    }
                                                    ?>
                                                  </tbody>
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
<?php require_once "vistas/parte_inferior-v2.php"?>
