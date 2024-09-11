<?php
session_start();
include './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['contraseña'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contraseña = mysqli_real_escape_string($conn, $_POST['contraseña']);

        if (isset($_POST['sign-up'])) {
            // Registration
            $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuarios (email, contraseña) VALUES ('$email', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registro exitoso. Por favor, inicia sesión.');</script>";
            } else {
                echo "<script>alert('Error en el registro: " . mysqli_error($conn) . "');</script>";
            }
        } elseif (isset($_POST['sign-in'])) {
            // Login
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($contraseña, $row['contraseña'])) {
                    // Start session and store user information
                    
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_email'] = $row['email'];
                    
                    // Redirect to index.php
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<script>alert('Contraseña incorrecta.');</script>";
                }
            } else {
                echo "<script>alert('Usuario no encontrado.');</script>";
            }
        }
    }
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
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="login-register.php" method="post" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <!-- <a href="#"><i class="ri-arrow-left-line"></i></a> -->
                <img src="../media/Aromas_sf.png" alt="aromas logo" />
              </div>


              <div class="heading">
                <h2>Iniciar sesion</h2>
                <h6>No estás registrado?</h6>
                <a href="#" class="cambiar">Creá una cuenta</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    class="input-field"
                    autocomplete="off"
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

                <input type="hidden" name="sign-in" value="1">
                <input type="submit" value="Iniciar sesión" class="sign-btn" />

                
              </div>
              <a href="#" class="volver"  >Volver a la pagina principal</a>
            </form>



            <form action="login-register.php" method="post" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <!-- <a href="#"><i class="ri-arrow-left-line"></i></a> -->
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
                    type="email"
                    class="input-field"
                    autocomplete="off"
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
              <a href="#" class="volver" >Volver a la pagina principal</a>
            </form>
          </div>

          <div class="imagen">

              

          </div>

      </div>
    </main>

    <script src="../js/login-register.js"></script>
  </body>
</html>
