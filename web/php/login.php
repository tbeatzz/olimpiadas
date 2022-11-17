<?php 
header("Content-Type: text/html;charset=utf-8");

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema Hospitalario | Inicio</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/app.css" />
    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.6.1.js"
      integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
      crossorigin="anonymous"
    ></script>
    <script defer src="../js/app.js"></script>
    <!-- Alertas -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
  </head>
  <body>
    <section class="login">
      <div class="login__wrapper">
        <div class="login__welcome"></div>

        <div class="login__form">
          <div class="login__container">
            <h2 class="login__h2">Iniciar sesión</h2>

            <form action="./login_logic.php" method="POST">
              <label for="user_name">Nombre de usuario</label>
              <div class="login__bloque">
                <input type="text" name="user_name" class="login-input" />
              </div>
              <label for="user_pass">Contraseña</label>
              <div class="login__bloque">
                <input type="password" name="user_pass" class="login-input" />
              </div>

              <div class="login__btn">
                <button type="submit" class="login-button">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php
        
        if(isset($_GET['msg']) && $_GET['msg']=="error"){
            echo '
                    <script>Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "!Algo salio mal!",
                        footer: "Intente escribiendo el usuario o contraseña de nuevo</a>"
                      })</script>
                ';
        }
    ?>
  </body>
</html>
