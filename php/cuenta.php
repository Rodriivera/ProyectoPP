<?php
        include 'db.php';

        session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cuenta.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="info-cuenta">

    <h1>Mi cuenta</h1>

    <form action="cuenta.php" method="POST">

                <div class="linea"></div>

                <h2>Información personal</h2>

                
                <div class="informacion-personal">

                    <?php
                        // Obtener datos del usuario
                        $userId = $_SESSION['user_id'];
                        $query = "SELECT * FROM usuarios WHERE id = $userId";
                        $result = $conn->query($query);
                        $user = $result->fetch_assoc();
                    ?>

                    <div class="items">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Julio César" value="<?php echo $user['nombre']; ?>">
                    </div>

                    <div class="items">
                        <label for="apellidos">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Falcioni Capdevila" value="<?php echo $user['apellido']; ?>">
                    </div>


                    <div class="usuario items">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Juliocesar" value="<?php echo $user['usuario']; ?>">
                    </div>

                    <div class="DNI items">
                        <label for="dni">DNI</label>
                        <input type="number" name="dni" id="dni" placeholder="12345678" value="<?php echo $user['dni']; ?>">
                    </div>

                    <div class="contraseña items">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña" placeholder="**********">
                    </div>

                    <div class="telefono items">
                        <label for="telefono">Telefono</label>
                        <input type="number" name="telefono" id="telefono" min="0" step="1" inputmode="numeric" placeholder="123456789" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo $user['telefono']; ?>">
                    </div>

                    

                    <div class="email items">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="nombre@dominio.com" pattern="[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-]([\.]?[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-])+@[a-zA-Z0-9]([^@&%$\/\(\)=?¿!\.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" value="<?php echo $user['email']; ?>">
                    </div>

                </div>

                <div class="linea"></div>

                <h2>Ubicación</h2>

                <div class="informacion-ubicacion">

                    <div class="direccion items">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Calle 123" value="<?php echo $user['direccion']; ?>">
                    </div>

                    <div class="ciudad items">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" placeholder="Ramallo" value="<?php echo $user['ciudad']; ?>">
                    </div>

                    <div class="codigo-postal items">
                        <label for="codigo-postal">Codigo postal</label>
                        <input type="number" name="codigo-postal" id="codigo-postal" placeholder="12345" min="0" step="1" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?php echo $user['codigo_postal']; ?>">
                    </div>

                </div>

                <?php
                if (isset($_POST['actualizar'])) {
                    $user_id = $_SESSION['user_id'];
                    $campos = ['nombre', 'apellido', 'usuario', 'email', 'contraseña', 'telefono', 'dni', 'direccion', 'ciudad', 'codigo_postal'];
                    $error = false;

                    // Verificar si el usuario o email ya están en uso
                    if (!empty($_POST['usuario'])) {
                        $nuevo_usuario = $conn->real_escape_string($_POST['usuario']);
                        $check_usuario = $conn->query("SELECT id FROM usuarios WHERE usuario = '$nuevo_usuario' AND id != '$user_id'");
                        if ($check_usuario->num_rows > 0) {
                            echo "<div class='mensaje'>El nombre de usuario ya está en uso. </div>";
                            $error = true;
                        }
                    }

                    if (!empty($_POST['email'])) {
                        $nuevo_email = $conn->real_escape_string($_POST['email']);
                        $check_email = $conn->query("SELECT id FROM usuarios WHERE email = '$nuevo_email' AND id != '$user_id'");
                        if ($check_email->num_rows > 0) {
                            echo "<div class='mensaje'>El email ya está en uso. </div>";
                            $error = true;
                        }
                    }

                    // Si no hay errores, proceder con la actualización
                    if (!$error) {
                        foreach ($campos as $campo) {
                            if (!empty($_POST[$campo])) {
                                $valor = $conn->real_escape_string($_POST[$campo]);
                                if ($campo === 'contraseña') {
                                    $valor = password_hash($valor, PASSWORD_DEFAULT);
                                }
                                $sql = "UPDATE usuarios SET $campo = '$valor' WHERE id = '$user_id'";
                                $conn->query($sql);
                            }
                        }
                        echo "<div class='mensaje'>Perfil actualizado correctamente. </div>";
                    } 
                }

                $conn->close();
                ?>


                <div class="botones">
                    <button type="reset" class="cancelar">Cancelar</button>
                    <button type="submit" name="actualizar">Actualizar</button>
                </div>

    </form>

</section>








</main>

<?php include 'footer.php'; ?>



<script src="../js/cuenta.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>