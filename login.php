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

          if ($_SESSION['Cargo_Id'] == 1) {
            header('Location: view/admin/admin.php');
          } else if ($_SESSION['Cargo_Id'] == 2) {
            header('Location: view/user/user.php');
          }
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
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="wp-content/themes/utndigital/assets/img/UTN.png" type="image/png" sizes="16x16">
  <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css " href="assets/css/style.css">
  <link rel="stylesheet" type="text/css " href="assets/css/css/all.min.css">
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <link rel="icon" href="wp-content/themes/utndigital/assets/img/UTN.png" type="image/x-icon" />
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link rel='stylesheet' id='style-css-css' href='wp-content/themes/utndigital/assets/css/style.min0a4b.css' media='all' />
</head>
<div class="preloader">
  <div class="text-wrapper">
    <div class="text-animation">
      <div class="loader-font text page-name page-Contact"><span class="dot"></span> <span class="title-wrap"> <span class="title-span">Login</span> </span>
      </div>
    </div>
  </div>
</div>

<body  id="js-scroll " class="page-template-default page page-id-59 o-scroll" data-scroll-container>
  <style>
    div.a {
      text-align: center;
      margin: 0 auto;
      display: flex;
      justify-content: center;
    }
  </style>
  <div class="main-menu">
    <div class="main-menu-icon">
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="main-menu-wrapper">
    <div class="main-menu-content">
      <div class="menu-menu-1-container">
        <ul id="primary-menu" class="menu">
          <li id="menu-item-146" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-7 current_page_item menu-item-146">
            <a href="index.html" aria-current="page">Inicio<img class="image" src=wp-content/uploads/2022/04/inicio.png>
            </a>
          </li>
          <li id="menu-item-193" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-193"><a href="calendario.php">Calendario<img class="image" src=wp-content/uploads/2022/04/calendario.png></a></li>
          <li id="menu-item-671" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-671"><a href="index.html">Información<img class="image" src=wp-content/uploads/2022/03/contacto.png></a></li>
          <li id="menu-item-147" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147"><a href="login.php">Login<img class="image" src=wp-content/uploads/2022/03/consultas.png></a></li>
        </ul>
      </div>
      <div class="social-menu-wrapper">
        <div class="menu-social-menu-container">
          <ul id="social-menu" class="menu">
            <li id="menu-item-152" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-152"><a href="https://www.linkedin.com/school/universidad-t%C3%A9cnica-del-norte/">Linkedin</a>
            </li>
            <li id="menu-item-151" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-151"><a href="https://www.instagram.com/utn_ec/">Instagram</a></li>
            <li id="menu-item-149" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-149"><a href="https://www.facebook.com/utnibarra.ec">Facebook</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="contenedor">
    <div class="img">
      <img src="assets/img/logo_Fica.jpg" alt="">
    </div>
    <div class="contenido-login">

      <form autocomplete="off" method="POST" role="form">
        <div class="a">
          <a class="a" href="index.html"><img src="wp-content/themes/utndigital/assets/img/UTN.png" alt=""></a>
        </div>
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


        <button class="btn btn-primary" name='login' type="primary"> Iniciar sesion
        </button>

      </form>
      <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>

    </div>
  </div>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/sweetalert.min.js"></script>
  <!-- Js personalizado -->



  <script src='wp-content/themes/utndigital/assets/js/owl.carousel.min8a54.js' id='pulladigital-owl-carousel-js'></script>

  <script src='wp-content/themes/utndigital/assets/js/locomotive-scroll.min8a54.js?ver=1.0.0' id='locomotive-scroll-js'></script>
  <script src='wp-content/themes/utndigital/assets/js/swiper-bundle.min8a54.js?ver=1.0.0' id='swiper-js-js'></script>

  <script src='wp-content/themes/utndigital/assets/js/main8a54.js?ver=1.0.0' id='pulladigital-main-js'></script>

</body>

</html>