<?php
// Inicia una sesión para poder usar variables de sesión
session_start();

// Incluye el archivo de conexión a la base de datos
include './db.php';

// Obtiene el mensaje de error almacenado en la sesión (si existe)
$error_message = $_SESSION['error_message'] ?? ''; 

// Elimina el mensaje de error de la sesión para que no se muestre repetidamente
unset($_SESSION['error_message']);

// Verifica si el método de la solicitud es POST (indica que se envió un formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario y los sanitiza para evitar inyecciones SQL
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario'] ?? '');
    $contraseña = mysqli_real_escape_string($conn, $_POST['contraseña'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');

    // Si se presionó el botón de "registrarse" (sign-up)
    if (isset($_POST['sign-up'])) {
        // Verifica si ya existe un usuario o correo con los mismos datos en la base de datos
        $exists = mysqli_query($conn, "SELECT 1 FROM usuarios WHERE usuario='$usuario' OR email='$email'");
        if (mysqli_num_rows($exists)) {
            // Si el usuario o correo ya existe, guarda un mensaje de error en la sesión
            $_SESSION['error_message'] = 'Usuario o correo ya registrado.';
        } else {
            // Si no existe, encripta la contraseña para almacenarla de forma segura
            $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

            // Inserta el nuevo usuario en la base de datos
            $success = mysqli_query($conn, "INSERT INTO usuarios (usuario, email, contraseña) VALUES ('$usuario', '$email', '$hashed_password')");

            // Guarda un mensaje de éxito o error dependiendo del resultado
            $_SESSION['error_message'] = $success ? 'Registro exitoso. Inicia sesión.' : 'Error en el registro.';
        }
    }

    // Si se presionó el botón de "iniciar sesión" (sign-in)
    if (isset($_POST['sign-in'])) {
        // Busca al usuario en la base de datos por su nombre de usuario
        $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario='$usuario'");
        $row = mysqli_fetch_assoc($result);

        // Si el usuario existe y la contraseña coincide
        if ($row && password_verify($contraseña, $row['contraseña'])) {
            // Guarda información del usuario en la sesión y redirige al inicio
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_usuario'] = $row['usuario'];
            header("Location: index.php");
            exit();
        }

        // Si no coincide la contraseña o el usuario no existe, guarda un mensaje de error
        $_SESSION['error_message'] = $row ? 'Contraseña incorrecta.' : 'Usuario no encontrado.';
    }

    // Redirige al mismo archivo para limpiar los datos del formulario
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Cierra la conexión con la base de datos
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
