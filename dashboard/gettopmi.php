<?php require_once "vistas/parte_superior.php"?>
          <!-- End of Topbar -->
          <h3 class="text-center">Reporte de Menu Items</h3>
          <br>
          <div class="container">

            <div class="container">
            <div class="row">
            <div class="col-xs-6 .col-sm-4">
            Seleccione las fechas:
            </div>
            </div>
            </div>
            <div class="container">
              <form action="gettopmi.php" method = "post">
        <div class="row">

          <div class="col-xs-6 .col-sm-4">
            <input type="date" class="form-control" name="fd" id="fd" value= <?php echo $hoy; ?> required>
          </div>
          <div class="col-xs-6 .col-sm-4">
            <input type="date" class="form-control" name="fh" id="fh" value= <?php echo $hoy; ?> required>
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
                        <table id="Consulta" data-order='[[ 2, "desc" ]]' data-page-length='25' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Menu Item</th>
                              <th>Cantidad</th>
                              <th>Total Venta</th>
                              <th>Grupo Mayor</th>
                              <th>Familia</th>
                              <th>Centro de Venta</th>
                            </tr>
                        </thead>
                        <?php
                      if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
                      $fd= date("d-m-y",strtotime($_POST['fd']));
                      $fh= date("d-m-y",strtotime($_POST['fh']));
    $ventadia= "SELECT  DISTINCT  MI.MENUITEMNAME1, SUM(MDT.SALESCOUNT), SUM(MDT.SALESTOTAL) , MI.MAJORGROUPNAMEMASTER, MI.FAMILYGROUPNAMEMASTER, RVC.NAMEMASTER
    FROM LOCATION_ACTIVITY_DB.MENU_ITEM_DAILY_TOTAL MDT INNER JOIN LOCATION_ACTIVITY_DB.MENU_ITEM MI ON MDT.MENUITEMID = MI.MENUITEMID INNER JOIN LOCATION_ACTIVITY_DB.REVENUE_CENTER RVC ON MDT.REVENUECENTERID = RVC.REVENUECENTERID
    WHERE MDT.BUSINESSDATE BETWEEN TO_DATE('$fd', 'dd-mm-yy') AND TO_DATE('$fh', 'dd-mm-yy') AND MDT.LOCATIONID= $location
    GROUP BY MI.MAJORGROUPNAMEMASTER,MI.FAMILYGROUPNAMEMASTER, MI.MENUITEMNAME1, RVC.NAMEMASTER ORDER BY SUM(MDT.SALESCOUNT) DESC";
                      $stid = oci_parse($conexion, $ventadia);
                      oci_execute ($stid);
                      while (oci_fetch($stid)) {
                      echo '<tr>
                      <td>'.oci_result($stid, 'MENUITEMNAME1').'</td>
                      <td>'.oci_result($stid, 'SUM(MDT.SALESCOUNT)').'</td>
                      <td>'.oci_result($stid, 'SUM(MDT.SALESTOTAL)').'</td>
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

    <<?php require_once "vistas/parte_inferior.php"?>
