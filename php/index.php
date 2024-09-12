<?php
        include 'db.php';

        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT 15";
        $result = $conn->query($sql);

        session_start();

        // // Obtener información del usuario logeado, si lo hay
        // $user_id = $_SESSION['user_id'];
        // $user_email = $_SESSION['user_email'];
        // $user_is_admin = false;

        
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
    <link rel="stylesheet" href="../css/lightslider.css?v=<?php echo time(); ?>">
    <!-- <script src="../js/jquery.js?v=<?php echo time(); ?>"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../js/lightslider.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    


    <header>
        <div class="logo-y-menu">
        <a href="#" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
        <i onclick="toggleMenu()" id="menu" class="ri-menu-line menu-icon"></i>

            <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">

                        <?php if (isset($_SESSION['user_usuario'])): ?>
                            <a class="sub-menu-link cuenta-mobile" onclick="toggleAccountMenu()">
                                <i class="ri-user-3-line"></i>
                                <p>Cuenta</p>
                            </a>
                            <div id="accountMenu" class="account-menu">
                                <a href="profile.php" class="account-menu-link">Perfil</a>
                                <a href="orders.php" class="account-menu-link">Mis pedidos</a>
                                <a href="logout.php" class="account-menu-link"><span>Cerrar sesión</span></a>
                            </div>
                        <?php else: ?>
                            <a href="login-register.php" class="sub-menu-link cuenta-mobile">
                                <i class="ri-user-3-line"></i>
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
                                <a href="#" class="sub-menu-link2 sesion">
                                    <i class="ri-pencil-line"></i>
                                    <p title="' . $_SESSION['user_usuario'] . '">' . $_SESSION['user_usuario'] . '</p>
                                </a>
                                <a href="#" class="sub-menu-link2">
                                    <i class="ri-shopping-bag-4-line"></i>
                                    <p>Mis pedidos</p>
                                </a>
                                <a href="logout.php" class="sub-menu-link2 cerrar">
                                    <i class="ri-close-line"></i>
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
                                    <i class="ri-pencil-line"></i>
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

        
    <section class="ads">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item"><img src="../media/chanel_3_1920x480_1.jpg" alt="Image 1"></div>
                <div class="carousel-item"><img src="../media/notas.jpg" alt="Image 2"></div>
                <div class="carousel-item"><img src="../media/vita_hero-parfum-cps-solo_1200x300.webp" alt="Image 3"></div>
            </div>
        </div>
    </section>
        
    
    
    <section class="categorias">

        <h2>Nuestras categorias</h2>

        <div class="categorias-container">
            <div class="categoria-separada">
                <a href="busqueda.php?category=fragancias">
                    <div class="categoria-foto">
                        <img src="../media/perfume.png" 
                        alt="logo Fragancias">
                    </div>
                </a>
                <p>Fragancias</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=maquillajes">
                    <div class="categoria-foto">
                        <img src="../media/maquillaje.png"
                        alt="logo maquillajes">
                    </div>
                 </a>
                <p>Maquillajes</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=faciales">
                    <div class="categoria-foto">
                        <img src="../media/tratamiento-facial.png"
                        alt="logo faciales">
                    </div>
                 </a>
                <p>Faciales</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=capilares">
                    <div class="categoria-foto">
                        <img src="../media/tratamiento-capilar.png"
                        alt="logo capilares">
                    </div>
                 </a>
                <p>Capilares</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=personales">
                    <div class="categoria-foto">
                        <img src="../media/articulos-de-aseo.png"
                        alt="logo personales">
                    </div>
                 </a>
                <p>Personales</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=regaleria">
                    <div class="categoria-foto">
                        <img src="../media/regalos.png"
                        alt="logo regaleria">
                    </div>
                 </a>
                <p>Regalería</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=hogar">
                    <div class="categoria-foto">
                        <img src="../media/bateria-de-cocina.png"
                        alt="logo hogar">
                    </div>
                 </a>
                <p>Hogar</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=accesorios">
                    <div class="categoria-foto">
                        <img src="../media/accesorios.png"
                        alt="logo accesorios">
                    </div>
                 </a>
                <p>Accesorios</p>
            </div>


        </div>


    </section>



    <section class="productos">
        <h2>Algunos productos</h2>
        <ul id="autoWidth" class="cs-hidden">
            <?php
                while($row = $result->fetch_assoc()) {
                    $name = $row['nombre'];
                    $brand = $row['autor'];
                    $price = $row['precio'];
                    $image = $row['imagen'];
            ?>
            <li class="item">
                <a href="item.php?id=<?php echo $row['id']; ?>">
                <div class="box">

                    <div class="slide-img">
                        <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                    </div>

                    <div class="detail-box">
                        <h3 title="<?php echo $name; ?>"><?php echo $name; ?></h3>
                        <h4><?php echo $brand; ?></h4>
                        <p>$<?php echo number_format($price, 0); ?></p>
                        
                    </div>
                </div>
                </a>
            </li>
            <?php } ?>
        </ul>
    </section>

    
    <section class="prestaciones">

        <div class="prestaciones-container">

            <div class="prestacion-separada" id="envio">
                <div class="prestacion-foto">
                    <img src="../media/enviado.png"
                    alt="logo envio">
                </div>
                <div class="prestacion-texto">
                <h3>Envio gratis</h3>
                <p>En compras superiores a $10.000</p>
                </div>
            </div>

            <div class="prestacion-separada" id="reembolso">
                <div class="prestacion-foto">
                    <img src="../media/reembolso2.png"
                    alt="logo reembolso">
                </div>
                <div class="prestacion-texto">
                <h3>14 dias de garantia</h3>
                <p>Por fallo de fabricacion</p>
                </div>
            </div>

            <div class="prestacion-separada" id="seguro">
                <div class="prestacion-foto">
                    <img src="../media/pago-seguro2+.png"
                    alt="logo seguro">
                </div>
                <div class="prestacion-texto">
                <h3>Pago seguro</h3>
                <p>Pagos 100% seguros</p>
                </div>
            </div>

            <div class="prestacion-separada" id="soporte">
                <div class="prestacion-foto">
                    <img src="../media/centro-de-llamadas.png"
                    alt="logo soporte">
                </div>
                <div class="prestacion-texto">
                <h3>Soporte 24/7</h3>
                <p>Soporte personalizado</p>
                </div>
            </div>

        </div>


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



    <script src="../js/index.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>