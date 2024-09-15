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

<header>
        <div class="logo-y-menu">
        <a href="./index.php" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
        <i onclick="toggleMenu()" id="menu" class="ri-menu-line menu-icon"></i>

            <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">

                        <?php if (isset($_SESSION['user_usuario'])): ?>
                            <a class="sub-menu-link cuenta-mobile" onclick="toggleAccountMenu()">
                                <i class="ri-user-3-line"></i>
                                <p>Cuenta</p>
                            </a>
                            <div id="accountMenu" class="account-menu">
                                <a href="cuenta.php" class="account-menu-link">Perfil</a>
                                <a href="" class="account-menu-link">Mis pedidos</a>
                                <a href="./logout.php" class="account-menu-link"><span>Cerrar sesión</span></a>
                            </div>
                        <?php else: ?>
                            <a href="login-register.php" class="sub-menu-link cuenta-mobile">
                                <i class="ri-login-box-line"></i>
                                <p>Iniciar Sesión</p>
                            </a>
                        <?php endif; ?>

                        <a href="#" class="sub-menu-link">
                            <i class="ri-shopping-cart-line"></i>
                            <p>Carrito</p>
                            
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-heart-3-line"></i>
                            <p>Favoritos</p>
                            
                        </a>

                    </div>
            </div> 


        </div>

        <form class="search-bar" action="busqueda.php" method="GET" id="searchForm"> 

            <div class="dropdown">
                <div id="drop-text" class="dropdown-text">
                    <span id="span">Categorías</span>
                    <i id="icon" class="ri-arrow-down-s-line"></i>
                </div>
                <ul id="list" class="dropdown-list">
                    <li class="dropdown-list-item">Fragancias</li>
                    <li class="dropdown-list-item">Maquillajes</li>
                    <li class="dropdown-list-item">Faciales</li>
                    <li class="dropdown-list-item">Capilares</li>
                    <li class="dropdown-list-item">Personales</li>
                    <li class="dropdown-list-item">Regalería</li>
                    <li class="dropdown-list-item">Hogar</li>
                    <li class="dropdown-list-item">Accesorios</li>
                </ul>
                
            </div>

            <input type="hidden" id="selected-category" name="category" value="Todo">

            <div class="search-box">
                <input type="text" id="search-input" name="search" placeholder="Buscar" autocomplete="off" >
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>
        </form>


        <nav>
            <ul>
                <li><i class="ri-heart-3-line nav"></i></li>
                    

                <li><i class="ri-shopping-cart-line nav"></i></li>
                


                <?php
                


                // Verifica si la sesión está iniciada
                if (isset($_SESSION['user_usuario'])) {
                    // Si la sesión está iniciada, muestra el email del usuario
                    echo '
                    <li>
                        <i onclick="toggleMenu2()" id="menu2"  class="ri-user-3-line nav menu-icon2"></i>
                        
                        <div class="sub-menu-wrap2" id="subMenu2">
                            <div class="sub-menu2">
                                <a href="cuenta.php" class="sub-menu-link2 sesion">
                                    <i class="ri-pencil-line"></i>
                                    <p title="' . $_SESSION['user_usuario'] . '">' . $_SESSION['user_usuario'] . '</p>
                                </a>
                                <a href="#" class="sub-menu-link2">
                                    <i class="ri-shopping-bag-4-line"></i>
                                    <p>Mis pedidos</p>
                                </a>
                                <a href="logout.php" class="sub-menu-link2 cerrar">
                                    <i class="ri-logout-box-line"></i>
                                    <p>Cerrar sesión</p>
                                </a>
                            </div>
                        </div>
                    </li>';
                } else {
                    // Si la sesión no está iniciada, muestra el enlace para iniciar sesión
                    echo '
                    <li>
                        <i onclick="toggleMenu2()" id="menu2"  class="ri-user-3-line nav menu-icon2"></i>
                        <div class="sub-menu-wrap2" id="subMenu2">
                            <div class="sub-menu2">
                                <a href="login-register.php" class="sub-menu-link2 sesion">
                                    <i class="<i class="ri-login-box-line"></i>"></i>
                                    <p>Iniciar Sesion</p>
                                </a>
                            </div>
                        </div>
                    </li>';
                }
                ?>
            

                    

        
                
            </ul>
        </nav>
        
</header>

<main>

<section class="info-cuenta">

    <h1>Mi cuenta</h1>

    <form action="cuenta.php" method="POST">

                <div class="linea"></div>

                <h2>Información personal</h2>

                
                <div class="informacion-personal">

                    <div class="usuario items">
                        <label for="usuario">Usuario</label>
                        <?php

                            $user_id = $_SESSION['user_id'];
                            $sql = "SELECT usuario FROM usuarios WHERE id = '$user_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                $row = $result->fetch_assoc();
                                $usuario = $row['usuario'];
                            } else {
                                $usuario = '';
                            }


                        ?>

                        <input type="text" name="usuario" id="usuario" placeholder="<?php echo $usuario; ?>">
                    </div>

                    <div class="email items">
                        <label for="email">Email</label>

                        <?php

                            $sql = "SELECT email FROM usuarios WHERE id = '$user_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {

                                $row = $result->fetch_assoc();
                                $email = $row['email'];
                            } else {
                                $email = '';
                            }

                        ?>
                        <input type="email" name="email" id="email" pattern="[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-]([\.]?[a-zA-Z0-9!#$%&'*\/=?^_`\{\|\}~\+\-])+@[a-zA-Z0-9]([^@&%$\/\(\)=?¿!\.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" placeholder="<?php echo $email; ?>">

                    </div>

                    <div class="contraseña items">
                        <label for="contraseña">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña">
                    </div>

                    <div class="telefono items">
                        <label for="telefono">Telefono</label>

                        <?php

                            $sql = "SELECT telefono FROM usuarios WHERE id = '$user_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                
                                $row = $result->fetch_assoc();
                                $telefono = $row['telefono'];
                            } else {
                                $telefono = '';
                            }

                        ?>

                        <input type="number" name="telefono" id="telefono" min="0" step="1" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="<?php echo $telefono; ?>">
                    </div>

                </div>

                <div class="linea"></div>

                <h2>Ubicación</h2>

                <div class="informacion-ubicacion">

                    <div class="direccion items">
                        <label for="direccion">Dirección</label>

                        <?php

                            $sql = "SELECT direccion FROM usuarios WHERE id = '$user_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                
                                $row = $result->fetch_assoc();
                                $direccion = $row['direccion'];
                            } else {
                                $direccion = '';
                            }

                        ?>

                        <input type="text" name="direccion" id="direccion" placeholder="<?php echo $direccion; ?>">
                    </div>

                    <div class="ciudad items">
                        <label for="ciudad">Ciudad</label>

                        <?php

                            $sql = "SELECT ciudad FROM usuarios WHERE id = '$user_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                
                                $row = $result->fetch_assoc();
                                $ciudad = $row['ciudad'];
                            } else {
                                $ciudad = '';
                            }

                        ?>

                        <input type="text" name="ciudad" id="ciudad" placeholder="<?php echo $ciudad; ?>">
                    </div>

                    <div class="codigo-postal items">
                        <label for="codigo-postal">Codigo postal</label>

                        <?php
                        $sql = "SELECT codigo_postal FROM usuarios WHERE id = '$user_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $cp = $row['codigo_postal'];
                        } else {
                            $cp = '';
                        }

                        ?>
                        <input type="number" name="codigo-postal" id="codigo-postal" min="0" step="1" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="<?php echo $cp; ?>">
                    </div>

                </div>

                <?php
                if (isset($_POST['actualizar'])) {
                    $user_id = $_SESSION['user_id'];
                    $campos = ['usuario', 'email', 'contraseña', 'telefono', 'direccion', 'ciudad', 'codigo_postal'];
                    $error = false;

                    // Verificar si el usuario o email ya están en uso
                    if (!empty($_POST['usuario'])) {
                        $nuevo_usuario = $conn->real_escape_string($_POST['usuario']);
                        $check_usuario = $conn->query("SELECT id FROM usuarios WHERE usuario = '$nuevo_usuario' AND id != '$user_id'");
                        if ($check_usuario->num_rows > 0) {
                            echo "El nombre de usuario ya está en uso. ";
                            $error = true;
                        }
                    }

                    if (!empty($_POST['email'])) {
                        $nuevo_email = $conn->real_escape_string($_POST['email']);
                        $check_email = $conn->query("SELECT id FROM usuarios WHERE email = '$nuevo_email' AND id != '$user_id'");
                        if ($check_email->num_rows > 0) {
                            echo "El email ya está en uso. ";
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
                        echo "Perfil actualizado correctamente.";
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

<footer>

            <div class="logoyinfo">

                <div class="logoyredes">
                    <img src="../media/Aromas_sf.png" alt="logo aromas" width="175px">
                    <div class="redes">
                        <a href="#"><i class="ri-facebook-line"></i></a>
                        <a href="#"><i class="ri-instagram-line"></i></a>
                        <a href="#"><i class="ri-twitter-x-line"></i></a>
                        <a href="#"><i class="ri-mail-line"></i></a>
                    </div>
                </div>

                <div class="categorias-footer">
                    <h3>Categorias</h3>
                    <ul>
                        <li><a href="busqueda.php?category=Fragancias">Fragancias</a></li>
                        <li><a href="busqueda.php?category=Maquillajes">Maquillajes</a></li>
                        <li><a href="busqueda.php?category=Faciales">Faciales</a></li>
                        <li><a href="busqueda.php?category=Capilares">Capilares</a></li>
                        <li><a href="busqueda.php?category=Personales">Personales</a></li>
                        <li><a href="busqueda.php?category=Regalería">Regalería</a></li>
                        <li><a href="busqueda.php?category=Hogar">Hogar</a></li>
                        <li><a href="busqueda.php?category=Accesorios">Accesorios</a></li>


                    </ul>
                </div>

                <div class="politicas">
                    <h3>Politicas</h3>
                    <ul>
                        <li><a href="#">Envios</a></li>
                        <li><a href="#">Devoluciones</a></li>
                        <li><a href="#">Privacidad</a></li>
                        <li><a href="#">Terminos y condiciones</a></li>
                        <li><a href="#">Preguntas frecuentes</a></li>

                    </ul>
                </div>


                <div class="contacto">
                    <h3>Contacto</h3>
                    <ul>
                        <li><p>Telefono: 44228085</p></li>
                        <li><p>Correo: aromas@aromas.com</p></li>
                        <li><p>Direccion: Bartolomé Mitre 384</p></li>
                        <li><p>Horario: Lunes a Viernes de 9:00 a 18:00</p></li>
                    </ul>
                </div>

            </div>

            <div class="copy">
                <p>&copy; 2024 Aromas. Todos los derechos reservados.</p>
            </div>
            


</footer>



    <script src="../js/cuenta.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>