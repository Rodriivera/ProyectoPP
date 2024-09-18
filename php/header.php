<head>
    <link rel="stylesheet" href="../css/header.css">
</head>


<header>
        <div class="logo-y-menu">
        <a href="../php/index.php" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
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
                                <a href="../php/pedidos.php" class="account-menu-link">Mis pedidos</a>
                                <a href="./logout.php" class="account-menu-link"><span>Cerrar sesión</span></a>
                            </div>
                            <a href="#" class="sub-menu-link">
                                <i class="ri-shopping-cart-line"></i>
                                <p>Carrito</p>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <i class="ri-heart-3-line"></i>
                                <p>Favoritos</p>
                            </a>
                        <?php else: ?>
                            <a href="login-register.php" class="sub-menu-link cuenta-mobile">
                                <i class="ri-login-box-line"></i>
                                <p>Iniciar Sesión</p>
                            </a>
                        <?php endif; ?>
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
                                <a href="../php/pedidos.php" class="sub-menu-link2">
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
                                    <i class="ri-login-box-line"></i>
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

    <script src="../js/header.js"></script>