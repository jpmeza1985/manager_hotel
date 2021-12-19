<?php
  require_once "vistas/parte_superior-v2.php";
  require_once "middleware/router-check.php";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$error = '';

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  // Verify email registered
  $emails = $mysqli->query("SELECT * FROM usuarios WHERE email = '". $email ."'");
  $emails->fetch_all(MYSQLI_ASSOC);
  $cantidad = mysqli_num_rows($emails);
  if ($cantidad > 0) {
    $error = "Ya existe un registro con el email ingresado";
  } else {
    if (!$mysqli->query(
      sprintf("INSERT INTO usuarios (id_hotel, nom_hotel, nombre, email, password, admin) VALUES (%s, '%s', '%s', '%s', '%s', %s)",
      $_POST['hotel'], $_POST['nombre_hotel'], $_POST['name'], $_POST['email'], $_POST['password'], 0))) {
        echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error. '   YUJUUU';
        $_POST = "";
      } else {
        print "<script>window.location='./usuarios.php';</script>";
        $_POST = "";
        die();
      }
  }

}

// Hoteles
$hoteles = $mysqli->query("SELECT * FROM hotel");
$hoteles->fetch_all(MYSQLI_ASSOC);

$usuarios = $mysqli->query("SELECT * FROM usuarios WHERE id_usuarios != ".$_SESSION['userid']);
$usuarios->fetch_all(MYSQLI_ASSOC);

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
                              <li class="breadcrumb-item"><a href="index.html">Gestor</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">

        <div class="row justify-content-center">
          <div class="col-6 text-center">
            <h4>Crear Usuario</h4>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="usuarios.php" method="POST">
              <div class="form-group">
                <label for="" class="label-control">Nombre</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Contraseña</label>
                <input type="text" class="form-control" name="password" id="password" required>
              </div>
              <div class="form-group">
                <label for="" class="label-control">Hotel</label>
                <select name="hotel" id="hotel" class="form-control" required onChange="myNewFunction(this);">
                  <option value="" selected>Seleccione...</option>
                  <?php
                    foreach($hoteles as $hotel) {
                      echo '<option value="'. $hotel["id_hotel"] .'">'. $hotel["nom_hotel"] .'</option>';
                    }
                  ?>
                </select>
                <input type="hidden" name="nombre_hotel" id="nombre_hotel">
              </div>
              <?php if ($error != '') { ?>
                <div class="form-group text-center alert alert-danger mt-1 alert-validation-msg">
                <div class="alert-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    <span><?php echo $error; ?></span>
                </div>
                </div>
              <?php } ?>
              <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Crear">
              </div>
            </form>
          </div>
        </div>

        <div class="row justify-content-center pt-3">
          <div class="col-12">
            <div class="table-responsive">
              <table id="Consulta" data-order='[[ 1, "asc" ]]' data-page-length='25' class="table table-bordered table-striped">
                <thead>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Hotel</th>
                  <th>Perfil</th>
                  <th>Editar</th>
                  <th>Estado</th>
                  <th>Eliminar</th>
                </thead>
                <tbody>
                  <?php foreach($usuarios as $usuario) { ?>
                    <tr>
                      <td><?php echo $usuario["nombre"]; ?></td>
                      <td><?php echo $usuario["email"]; ?></td>
                      <td class="text-center"><?php echo $usuario["nom_hotel"]; ?></td>
                      <td class="text-center"><?php echo ($usuario["admin"] == 1) ? 'Administrador' : 'Cliente'; ?></td>
                      <td class="text-center">
                        <a href="editar_usuario.php?uid=<?php echo $usuario['id_usuarios']; ?>" class="btn btn-primary btn-sm change-status">
                          Editar
                        </a>
                      </td>
                      <td class="text-center">
                        <button
                          class="btn btn-primary btn-sm change-status"
                          data-id="<?php echo $usuario['id_usuarios']; ?>"
                          data-status="<?php echo ($usuario['activo'] == 1) ? '0' : '1'; ?>"
                        >
                          <?php echo ($usuario['activo'] == 1) ? 'Bloquear' : 'Habilitar'; ?>
                        </button>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-danger btn-sm delete" data-id="<?php echo $usuario['id_usuarios']; ?>">Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script>
    function myNewFunction(sel) {
      const hotel = sel.options[sel.selectedIndex].text;
      document.getElementById('nombre_hotel').value = hotel;
    }

    $(document).ready(function () {

      $(document).on('click', '.delete', function () {
        const user_id = $(this).data('id');
        if (confirm('¿Está seguro de eliminar el registro?')) {
          $.ajax({
            type: "POST",
            url: 'delete_user.php',
            data: {'user_id': user_id},
            success: (response) => {
              console.log(response)
              if (response.response == true) {
                location.reload()
              }
            },
            dataType: 'json'
          });
        }
      })

      $(document).on('click', '.change-status', function () {
        const user_id = $(this).data('id');
        const status = $(this).data('status')
        $.ajax({
          type: "POST",
          url: 'update_user_status.php',
          data: {'user_id': user_id, 'status': status},
          success: (response) => {
            console.log(response)
            if (response.response == true) {
              location.reload()
            }
          },
          dataType: 'json'
        });
      })
    })

  </script>

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior-v2.php"?>
