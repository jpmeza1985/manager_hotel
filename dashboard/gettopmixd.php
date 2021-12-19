<?php
  require_once "vistas/parte_superior-v2.php";
  require_once "middleware/router-check.php";
?>
          <!-- End of Topbar -->
          <h3 class="text-center">Reporte de Menu Item Por día</h3>
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
              <form action="gettopmixd.php" method = "post">
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
                        <table id="Consulta" data-order='[[ 3, "desc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Día</th>
                              <th>Menu Item</th>
                              <th>Cantidad Vendidos</th>
                              <th>Venta Total</th>
                              <th>Grupo Mayor</th>
                              <th>Familia</th>
                              <th>Centro de Ventas</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $ventadia= "SELECT  DISTINCT   MDT.BUSINESSDATE , MI.MENUITEMNAME1, SUM(MDT.SALESCOUNT) , SUM(MDT.SALESTOTAL) , MI.MAJORGROUPNAMEMASTER,MI.FAMILYGROUPNAMEMASTER, RVC.NAMEMASTER
                      FROM LOCATION_ACTIVITY_DB.MENU_ITEM_DAILY_TOTAL MDT INNER JOIN LOCATION_ACTIVITY_DB.MENU_ITEM MI ON MDT.MENUITEMID = MI.MENUITEMID INNER JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON MDT.REVENUECENTERID = RVC.REVENUECENTERID
                      WHERE MDT.BUSINESSDATE = TO_DATE('$fd', 'dd-mm-yy') AND MDT.LOCATIONID= $location GROUP BY RVC.NAMEMASTER, MI.MAJORGROUPNAMEMASTER,MI.FAMILYGROUPNAMEMASTER, MDT.BUSINESSDATE,  MI.MENUITEMNAME1 ORDER BY SUM(MDT.SALESCOUNT) DESC";
                      $stid = oci_parse($conexion, $ventadia);
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid, 'BUSINESSDATE').'</td>
                      <td>'.oci_result($stid, 'MENUITEMNAME1').'</td>
                      <td>'.oci_result($stid, 'SUM(MDT.SALESCOUNT)').'</td>
                      <td>'.oci_result($stid,'SUM(MDT.SALESTOTAL)').'</td>
                      <td>'.oci_result($stid,'MAJORGROUPNAMEMASTER').'</td>
                      <td>'.oci_result($stid, 'FAMILYGROUPNAMEMASTER').'</td>
                      <td>'.oci_result($stid, 'NAMEMASTER').'</td>

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
