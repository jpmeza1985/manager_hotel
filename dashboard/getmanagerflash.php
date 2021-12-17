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
                      <h2 class="content-header-title float-left mb-0">Manager Flash</h2>
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
            <form action="getmanagerflash.php" method="POST" class="form-inline form-inline-space-around">
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
                    <th>Descripción</th>
                    <th>Día</th>
                    <th>Mes</th>
                    <th>Año</th>
                  </tr>
                </thead>
                <tbody>
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
