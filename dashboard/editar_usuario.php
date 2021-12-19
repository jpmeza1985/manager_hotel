<?php
  require_once "vistas/parte_superior-v2.php";
  require_once "middleware/router-check.php";
?>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// Verify email registered
$error = '';
$usuarios = $mysqli->query("SELECT * FROM usuarios WHERE id_usuarios = '". $_GET['uid'] ."'");
$usuario = mysqli_fetch_assoc($usuarios);

// Hoteles
$hoteles = $mysqli->query("SELECT * FROM hotel");
$hoteles->fetch_all(MYSQLI_ASSOC);

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
                      <h2 class="content-header-title float-left mb-0">Usuarios</h2>
                      <div class="breadcrumb-wrapper">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Editar</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">

        <div class="row justify-content-center">
          <div class="col-6 text-center">
            <h4>Editar Usuario</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="post_editar_usuario.php" method="POST">
              <div class="form-group">
                <label for="" class="label-control">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $usuario['nombre']; ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $usuario['email']; ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Contraseña</label>
                <input type="text" class="form-control" name="password" id="password" value="<?php echo $usuario['password']; ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Hotel</label>
                <select name="hotel" id="hotel" class="form-control" required onChange="changeFunction(this);">
                <?php
                    foreach($hoteles as $hotel) {
                      $selected = ($hotel['nom_hotel'] == $usuario['nom_hotel']) ? 'selected' : '';
                      echo '<option value="'. $hotel["id_hotel"] .'" '.$selected.'>'. $hotel["nom_hotel"] .'</option>';
                    }
                  ?>
                </select>
                <input type="hidden" name="nombre_hotel" id="nombre_hotel" value="<?php echo $usuario['nom_hotel']; ?>">
                <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_GET['uid']; ?>">
              </div>
              <?php if (isset($_GET['e']) && $_GET['e'] == '1') { ?>
                <div class="form-group text-center alert alert-danger mt-1 alert-validation-msg">
                  <div class="alert-body">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                      <span>El email ingresado ya se encuentra registrado</span>
                  </div>
                </div>
              <?php } ?>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Actualizar">
                <a href="./usuarios.php" class="btn btn-primary">Regresar</a>
              </div>
            </form>
          </div>
        </div>

      </div>
      </div>
    </div>
  </div>

  <script>
    function changeFunction(sel) {
      const hotel = sel.options[sel.selectedIndex].text;
      document.getElementById('nombre_hotel').value = hotel;
    }

  </script>

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior-v2.php"?>
