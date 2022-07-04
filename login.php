<?php
require 'assets/db/config.php';
if (isset($_POST['login'])) {
  $errMsg = '';

  // Get data from FORM
  $usuario = $_POST['usuario'];

  $clave = MD5($_POST['clave']);

  if ($usuario == '')
    $errMsg = 'Digite su usuario';
  if ($clave == '')
    $errMsg = 'Digite su contraseña';

  if ($errMsg == '') {
    try {
      $stmt = $connect->prepare('SELECT Id, Nombre, Apellido, Usuario, Correo, Clave, Cargo_Id FROM usuarios WHERE Usuario = :Usuario');
      //$stmt = $connect->prepare('SELECT Id, Nombre, Apellido, Correo, Usuario, Clave, Tipo_Usuario_Id FROM User WHERE Usuario = :Usuario');


      $stmt->execute(array(
        ':Usuario' => $usuario


      ));
      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($data == false) {
        $errMsg = "Usuario $usuario no encontrado.";
      } else {
        if ($clave == $data['Clave']) {

          $_SESSION['Id'] = $data['Id'];
          $_SESSION['Nombre'] = $data['Nombre'];
          $_SESSION['Apellido'] = $data['Apellido'];
          $_SESSION['Usuario'] = $data['Usuario'];
          $_SESSION['Correo'] = $data['Correo'];
          $_SESSION['Clave'] = $data['Clave'];
          $_SESSION['Cargo_Id'] = $data['Cargo_Id'];

          // $_SESSION['Id'] = $data['Id'];
          // $_SESSION['Nombre'] = $data['Nombre'];
          // $_SESSION['Apellido'] = $data['Apellido'];
          // $_SESSION['Correo'] = $data['Correo'];
          // $_SESSION['Usuario'] = $data['Usuario'];
          // $_SESSION['Clave'] = $data['Clave'];
          // $_SESSION['Tipo_Usuario_Id'] = $data['Tipo_Usuario_Id'];


           if ($_SESSION['Cargo_Id'] == 1) {
             header('Location: view/admin/admin.php');
           } else if ($_SESSION['Cargo_Id'] == 2) {
             header('Location: view/user/user.php');
           }

          // if ($_SESSION['Tipo_Usuario_Id'] == 1) {
          //   header('Location: view/admin/admin.php');
          // } else if ($_SESSION['Tipo_Usuario_Id'] == 2) {
          //   header('Location: view/user/user.php');
          // }


          exit;
        } else
          $errMsg = 'Contraseña incorrecta.';
      }
    } catch (PDOException $e) {
      $errMsg = $e->getMessage();
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie-edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css " href="assets/css/style.css">
  <link rel="stylesheet" type="text/css " href="assets/css/css/all.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <link rel="icon" href="wp-content/themes/utndigital/assets/img/UTN.png" type="image/x-icon" />
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>
  <!--  <img class="wave"src="../assets/img/wave.png" alt="">  -->
  <div class="contenedor">
    <div class="img">
      <img src="https://pngimage.net/wp-content/uploads/2018/05/calendrier-icone-png-4.png" alt="">
    </div>
    <div class="contenido-login">

      <form autocomplete="off" method="POST" role="form">

        <img src="wp-content/themes/utndigital/assets/img/UTN.png" alt="">
        <h2>Login</h2>
        <?php
        if (isset($errMsg)) {
          echo '<div style="color:#FF0000;text-align:center;font-size:20px;">' . $errMsg . '</div>';
        }
        ?>
        <div class="input-div nit">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">

            <input type="text" name="usuario" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" placeholder="USUARIO">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">

            <input type="password" required="true" name="clave" value="<?php if (isset($_POST['clave'])) echo MD5($_POST['clave']) ?>" placeholder="CONTRASEÑA">
          </div>
        </div>
        <div class="row" id="load" hidden="hidden">
          <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
            <img src="assets/img/load.gif" width="100%" alt="">
          </div>
          <div class="col-xs-12 center text-accent">
            <span>Validando información...</span>
          </div>
        </div>


        <button class="btn" name='login' type="submit"> Iniciar sesion
        </button>

      </form>
      <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

    </div>
  </div>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/sweetalert.min.js"></script>
  <!-- Js personalizado -->


</body>

</html>