<?php
require_once "vistas/parte_superior.php";
?>
<!--INICIO del cont principal-->
<div class="grey-bg container-fluid">
                      <section id="minimal-statistics">

                        <div class="row">

                          <div class="col-12 mt-3 mb-1">
                            <h5 class="text">Dashboard POS <?php echo $dia ?></h5>
                            <h6 class="text">Detalle de Ventas:</h6>
                            <p> </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-9">
                                      <div class="row">
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon purple">
                                                                  <i class="fas fa-hand-holding-usd fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Venta Neta</h6>
                                                              <h6 class="font-extrabold mb-0">
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
                          									</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon blue">
                                                                  <i class="fas fa-percentage fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Descuentos</h6>
                                                              <h6 class="font-extrabold mb-0">
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

                          </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon green">
                                                                  <i class="fas fa-donate fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Propinas</h6>
                                                              <h6 class="font-extrabold mb-0">
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
                          									</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>

                                  <div class="col-12 col-lg-9">
                                    <div class="row">

                                      <div class="col-12 mt-3 mb-1">
                                        <h6 class="text">Formas de Pago:</h6>
                                        <p> </p>
                                      </div>
                                    </div>
                                              <div class="row">

                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon purple">
                                                                            <i class="far fa-credit-card fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">Debito</h6>
                                                                      <h6 class="font-extrabold mb-0">
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
                                  									</h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon blue">
                                                                        <i class="fas fa-money-bill-wave fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">Efectivo</h6>
                                                                      <h6 class="font-extrabold mb-0">
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

                                  </h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon green">
                                  										<i class="fas fa-concierge-bell fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">Cargo Hab</h6>
                                                                      <h6 class="font-extrabold mb-0">
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
                                  									</h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon red">
                                  										<i class="fab fa-cc-visa fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">Visa</h6>
                                                                      <h6 class="font-extrabold mb-0">
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
                                  									</h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon red">
                                                                        <i class="fab fa-cc-mastercard fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">MasterCard</h6>
                                                                      <h6 class="font-extrabold mb-0">
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
                                                    </h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="col-6 col-lg-3 col-md-6">
                                                      <div class="card">
                                                          <div class="card-body px-3 py-4-5">
                                                              <div class="row">
                                                                  <div class="col-md-4">
                                                                      <div class="stats-icon red">
                                                                        <i class="fab fa-cc-amex fa-2x"></i>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-md-8">
                                                                      <h6 class="text-muted font-semibold">Amex</h6>
                                                                      <h6 class="font-extrabold mb-0">
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
                                                    </h6>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                          </div>










                      </section>

                      <section id="minimal-statistics">


                        <div class="row">

                          <div class="col-12 mt-3 mb-1">
                            <h6 class="text">Otros datos:</h6>
                            <p> </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 col-lg-9">
                                      <div class="row">
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon purple">
                                                                  <i class="fas fa-hand-holding-usd fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Venta Ayer</h6>
                                                              <h6 class="font-extrabold mb-0">
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
                          									</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon blue">
                                                                <i class="fas fa-hand-holding-usd fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Últimos 7 días</h6>
                                                              <h6 class="font-extrabold mb-0">
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
                          </h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                        
                                          <div class="col-6 col-lg-3 col-md-6">
                                              <div class="card">
                                                  <div class="card-body px-3 py-4-5">
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="stats-icon red">
                                                                  <i class="fas fa-receipt fa-2x"></i>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <h6 class="text-muted font-semibold">Mesas Abiertas</h6>
                                                              <h6 class="font-extrabold mb-0">
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
                          									</h6>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                        </section>

                      <section id="stats-subtitle">
                      <div class="row">
                        <div class="col-12 mt-3 mb-1">
                          <h6 class="text">Venta Empleados:</h6>
                          <p> </p>
                        </div>
                      </div>
                          <div class="row">
                            <div class="col-8 mt-3 mb-1">
                                      <div class="table-responsive">
                                          <table id="example" class="table table-striped" cellspacing="0" width="100%">
                                          <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Venta</th>
                                                <th>RVC</th>
                                              </tr>
                                          </thead>
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
                                         </table>

                                      </div>
</div>


                          </div>
                      </div>



<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
