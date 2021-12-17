<?php require_once "vistas/parte_superior-v2.php"?>

<!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                  <div class="col-12">
                      <h2 class="content-header-title float-left mb-0">Reporte de Cheques Cerrados</h2>
                      <div class="breadcrumb-wrapper">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Reporte</a></li>
                              <!-- <li class="breadcrumb-item active"><?php echo $dia ?></li> -->
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">

        <div class="row justify-content-center">
          <div class="col-6 text-center">
            <h4>Seleccione las fechas</h4>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="getclosedchks.php" method="POST" class="form-inline form-inline-space-around">
              <div class="form-group">
                <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="fh" id="fh" value= <?php echo $hoy; ?> required>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="Generar Reporte">
              </div>
            </form>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-12">
            <div class="table-responsive">
              <table id="Consulta" data-order='[[ 1, "asc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Centro de Venta</th>
                    <th>Cheque</th>
                    <th>Mesa</th>
                    <th>Clientes</th>
                    <th>Empleado</th>
                    <th>Subtotal</th>
                    <th>Propina</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Voids</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $closedchks=
                      "SELECT RVC.NAMEMASTER, GC.CHECKNUM, GC.TABLEREF, GC.NUMGUESTS, EMP.LASTNAME ,  GC.SUBTOTAL , GC.SERVICECHARGETOTAL, GC.DISCOUNTTOTAL, GC.CHECKTOTAL, GC.VOIDTOTAL
                      FROM LOCATION_ACTIVITY_DB.GUEST_CHECK GC
                      JOIN LOCATION_ACTIVITY_DB.EMPLOYEE EMP ON EMP.EMPLOYEEID = GC.EMPLOYEEID
                      JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = GC.REVENUECENTERID
                      WHERE GC.OPENBUSINESSDATE= TO_DATE('$fd', 'dd-mm-yy') AND GC.LOCATIONID= $location";
                      $stid = oci_parse($conexion, $closedchks);
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid, 'NAMEMASTER').'</td>
                      <td>'.oci_result($stid, 'CHECKNUM').'</td>
                      <td>'.oci_result($stid, 'TABLEREF').'</td>
                      <td>'.oci_result($stid,'NUMGUESTS').'</td>
                      <td>'.oci_result($stid,'LASTNAME').'</td>
                      <td>'.oci_result($stid, 'SUBTOTAL').'</td>
                      <td>'.oci_result($stid, 'SERVICECHARGETOTAL').'</td>
                      <td>'.oci_result($stid, 'DISCOUNTTOTAL').'</td>
                      <td>'.oci_result($stid, 'CHECKTOTAL').'</td>
                      <td>'.oci_result($stid, 'VOIDTOTAL').'</td>
                        </tr>';
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior-v2.php"?>
