<?php require_once "vistas/parte_superior.php"?>
    <h3 class="text-center"Reporte por Formas de Pago</h3>
<br>
    <div class="container">

      <div class="container">
      <div class="row">
      <div class="col-sm-3">
      Fecha desde
      </div>
      <div class="col-sm-3">
      Fecha hasta
      </div>
      </div>
      </div>
      <div class="container">
        <form action="getventafp.php" method = "post">
  <div class="row">
    <div class="col-sm-3">
      <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
    </div>
    <div class="col-sm-3">
      <input type="date" class="form-control" name="fh" id="fh" value= <?php echo $hoy; ?> required>
    </div>
    <div class="col-sm-3">
      <input type="submit" class="btn btn-primary btn-sm" value="Generar reporte">
    </div>
  </div>
  <br>
  <br>
</div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="Consulta" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>CENTRO DE VENTA</th>
                              <th>FORMA DE PAGO</th>
                              <th>TOTAL</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fh= date("d-m-y",strtotime($_POST['fh']));
                      $ventadia = "SELECT RVC.NAMEMASTER, TM.NAME, SUM(TMD.TENDERMEDIATOTAL) FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL TMD JOIN LOCATION_ACTIVITY_DB.TENDER_MEDIA TM ON TMD.TENDERMEDIAID = TM.TENDERMEDIAID JOIN LOCATION_ACTIVITY_DB.LOCATION_HIERARCHY_ITEM LC ON TMD.LOCATIONID = LC.LOCATIONID JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON RVC.REVENUECENTERID = TMD.REVENUECENTERID WHERE LC.LOCATIONID= $location AND TMD.BUSINESSDATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fh', 'dd-mm-yy') GROUP BY RVC.NAMEMASTER,TM.NAME ORDER BY RVC.NAMEMASTER,TM.NAME DESC";
                      $stid = oci_parse($conexion, $ventadia);
                      //$stid = oci_parse($conexion, 'SELECT BUSINESSDATE, TENDERMEDIAID, TENDERMEDIATOTAL FROM LOCATION_ACTIVITY_DB.TENDER_MEDIA_DAILY_TOTAL WHERE BUSINESSDATE = TO_DATE(sysdate, "DD/MM/YY") -1');
                      oci_execute ($stid);

                      while (oci_fetch($stid)) {
                      echo '<tr>
                              <td>'.oci_result($stid, 'NAMEMASTER').'</td>
                              <td>'.oci_result($stid, 'NAME').'</td>
                              <td>'.oci_result($stid, 'SUM(TMD.TENDERMEDIATOTAL)').'</td>
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
