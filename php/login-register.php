<?php
session_start();
include './db.php';

$error_message = $_SESSION['error_message'] ?? '';
unset($_SESSION['error_message']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario'] ?? '');
    $contraseña = mysqli_real_escape_string($conn, $_POST['contraseña'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');

    if (isset($_POST['sign-up'])) {
        $exists = mysqli_query($conn, "SELECT 1 FROM usuarios WHERE usuario='$usuario' OR email='$email'");
        if (mysqli_num_rows($exists)) {
            $_SESSION['error_message'] = 'Usuario o correo ya registrado.';
        } else {
            $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
            $success = mysqli_query($conn, "INSERT INTO usuarios (usuario, email, contraseña) VALUES ('$usuario', '$email', '$hashed_password')");
            $_SESSION['error_message'] = $success ? 'Registro exitoso. Inicia sesión.' : 'Error en el registro.';
        }
    }

    if (isset($_POST['sign-in'])) {
        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario'");
        $row = mysqli_fetch_assoc($result);
        if ($row && password_verify($contraseña, $row['contraseña'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_usuario'] = $row['usuario'];
            header("Location: index.php");
            exit();
        }
        $_SESSION['error_message'] = $row ? 'Contraseña incorrecta.' : 'Usuario no encontrado.';
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aromas</title>
    <link rel="stylesheet" href="../css/login-register.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="error-message-container">
        <?php if (!empty($error_message)): ?>
            <div id="error-message" class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">

            <form action="login-register.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <img src="../media/Aromas_sf.png" alt="aromas logo" />
              </div>

              <div class="heading">
                <h2>Iniciar sesión</h2>
                <h6>No estás registrado?</h6>
                <a href="#" class="cambiar">Creá una cuenta</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="usuario"
                  />
                  <label>Usuario</label>
                </div>
                
                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="contraseña"
                  />
                  <label>Contraseña</label>
                </div>

                <input type="hidden" name="sign-in" value="1">
                <input type="submit" value="Iniciar sesión" class="sign-btn" />
              </div>
              <a href="./index.php" class="volver">Volver a la pagina principal</a>
            </form>

            <form action="login-register.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <img src="../media/Aromas_sf.png" alt="aromas logo" />
              </div>

              <div class="heading">
                <h2>¡Bienvenido!</h2>
                <h6>Ya tenés una cuenta?</h6>
                <a href="#" class="cambiar">Iniciar sesión</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="usuario"
                  />
                  <label>Usuario</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
                    pattern="[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-]([\.]?[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-])+@[a-zA-Z0-9]([^@&%$\/\(\)=?¿!\.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                    required
                    name="email"
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                    name="contraseña"
                  />
                  <label>Contraseña</label>
                </div>

                <input type="hidden" name="sign-up" value="1">
                <input type="submit" value="Crear cuenta" class="sign-btn" />
              </div>
              <a href="./index.php" class="volver">Volver a la pagina principal</a>
            </form>
          </div>

          <div class="imagen">
          </div>
        </div>
      </div>
    </main>

    <script src="../js/login-register.js"></script>
  </body>
</html>