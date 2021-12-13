<?php require_once "vistas/parte_superior.php"?>
    <!--Ejemplo tabla con DataTables-->
    <h3 class="text-center">Manager Flash</h3>
<br>
    <div class="container">


      <div class="container">
        <form action="getmanagerflash.php" method = "post">


</div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="Consulta"  data-page-length='150' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Descripción</th>
                              <th>Día</th>
                              <th>Mes</th>
                              <th>Año</th>
                            </tr>
                        </thead>
                        <?php
                        $query = $mysqli -> query ("SELECT descrip, dia, mes, ano FROM manager_$location ");


                        foreach ($query as $key => $manager_flash) {
                          ?>
                          <tr>
                            <th><?php echo $manager_flash['descrip']?> </th>
                            <th><?php echo $manager_flash['dia']?> </th>
                            <th><?php echo $manager_flash['mes']?> </th>
                            <th><?php echo $manager_flash['ano']?> </th>

                          </tr>
                        <?php  } ?>


                           </table>

                    </div>

                </div>

        </div>
    </div>
<?php require_once "vistas/parte_inferior.php"?>
