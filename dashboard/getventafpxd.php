<?php
  require_once "vistas/parte_superior-v2.php";
  require_once "middleware/router-check.php";
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
                      <h2 class="content-header-title float-left mb-0">Venta por Forma de Pago por día</h2>
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
            <form action="getventafpxd.php" method="POST" class="form-inline form-inline-space-around">
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
              <table id="Consulta" data-order='[[ 2, "asc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Centro de Venta</th>
                    <th>Día</th>
                    <th>Forma de Pago</th>
                    <th>Total</th>
                  </tr>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fh= date("d-m-y",strtotime($_POST['fh']));
                      $ventadia = "SELECT RVC.NAMEMASTER,TMD.BUSINESSDATE, TM.NAME, TMD.TENDERMEDIATOTAL, LC.NAME FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD JOIN LOCATION_ACTIVITY_DB.TENDER_MEDIA TM ON TMD.TENDERMEDIAID = TM.TENDERMEDIAID JOIN LOCATION_ACTIVITY_DB.LOCATION_HIERARCHY_ITEM LC ON TMD.LOCATIONID = LC.LOCATIONID JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = TMD.REVENUECENTERID
                      WHERE LC.LOCATIONID= $location AND TMD.BUSINESSDATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fh', 'dd-mm-yy') ORDER BY TMD.TENDERMEDIATOTAL DESC";
                      $stid = oci_parse($conexion, $ventadia);
                      //$stid = oci_parse($conexion, 'SELECT BUSINESSDATE, TENDERMEDIAID, TENDERMEDIATOTAL FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL WHERE BUSINESSDATE = TO_DATE(sysdate, "DD/MM/YY") -1');
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                              <td>'.oci_result($stid,'NAMEMASTER').'</td>
                              <td>'.oci_result($stid,'BUSINESSDATE').'</td>
                              <td>'.oci_result($stid, 'NAME').'</td>
                              <td>'.oci_result($stid, 'TENDERMEDIATOTAL').'</td>

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
