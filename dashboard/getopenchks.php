<?php require_once "vistas/parte_superior.php"?>
          <!-- End of Topbar -->
          <h3 class="text-center">Reporte de Cheques Abiertos</h3>
          <br>
          <div class="container">

            <div class="container">
            <div class="row">
              <div class="col-xs-6 .col-sm-4">
              Seleccione la fecha:
              </div>
            </div>
            </div>
            <div class="container">
              <form action="getopenchks.php" method = "post">
          <div class="row">
          <div class="col-xs-6 .col-sm-4">
            <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
          </div>
          </div>
          <br>
          <div class="row">
            <div class="col-xs-6 .col-sm-4">
              <input type="submit" class="btn btn-primary btn-sm" value="Generar reporte">
            </div>
          </div>
          <br>
          </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="Consulta" data-order='[[ 2, "asc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Centro de Venta</th>
                              <th>Mesa</th>
                              <th>Cheque</th>
                              <th>Empleado</th>
                              <th>Subtotal</th>
                              <th>clientes</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $openchks=
                      "SELECT RVC.NAMEMASTER, GC.TABLEREF, GC.CHECKNUM, EMP.LASTNAME ,  GC.SUBTOTAL , GC.NUMGUESTS
                      FROM LOCATION_ACTIVITY_DB.GUEST_CHECK GC
                      JOIN LOCATION_ACTIVITY_DB.EMPLOYEE EMP ON EMP.EMPLOYEEID = GC.EMPLOYEEID
                      JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = GC.REVENUECENTERID
                      WHERE GC.OPENBUSINESSDATE= TO_DATE('$fd', 'dd-mm-yy') AND GC.LOCATIONID= $location AND GC.CLOSEBUSINESSDATE IS NULL";
                      $stid = oci_parse($conexion, $openchks);
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid, 'NAMEMASTER').'</td>
                      <td>'.oci_result($stid, 'TABLEREF').'</td>
                      <td>'.oci_result($stid, 'CHECKNUM').'</td>
                      <td>'.oci_result($stid,'LASTNAME').'</td>
                      <td>'.oci_result($stid,'SUBTOTAL').'</td>
                      <td>'.oci_result($stid, 'NUMGUESTS').'</td>
                        </tr>';
                      }
                    }
                      ?>



                       </table>

                    </div>

                </div>

        </div>
    </div>
<?php require_once "vistas/parte_inferior.php"?>
