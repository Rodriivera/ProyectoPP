<?php
        include 'db.php';

        // Primera consulta
        $sql = "SELECT * FROM productos LIMIT 5";
        $result = $conn->query($sql);

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
    
</head>
<body>
    
    <header>
        <div class="logo-y-menu">
        <a href="#" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
        <i onclick="toggleMenu()"  id="menu" class="ri-menu-line"></i>
        <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">

                        <a href="#" class="sub-menu-link">
                            <i class="ri-user-3-line"></i>
                            <p>Cuenta</p>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-shopping-bag-4-line"></i>
                            <p>Carrito</p>
                            
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-heart-3-line"></i>
                            <p>Favoritos</p>
                            
                        </a>

                    </div>
                </div> 

        </div>

        <form class="search-bar" action="busqueda.php" method="GET"> 
            <div class="dropdown">
                <div id="drop-text" class="dropdown-text">
                    <span id="span">Categorias</span>
                    <i id="icon" class="ri-arrow-down-s-line"></i>
                </div>
                <ul id="list" class="dropdown-list">
                <li class="dropdown-list-item">Todo</li>
                <li class="dropdown-list-item">Perfumes</li>
                <li class="dropdown-list-item">Maquillaje</li>
                <li class="dropdown-list-item">Faciales</li>
                <li class="dropdown-list-item">Capilares</li>
                <li class="dropdown-list-item">Personales</li>
            </ul>
            </div>
        

            

            <div class="search-box">
                <input type="text" id="search-input" placeholder="Buscar">
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>

        </form>


        <nav>
            <ul>
                <li><i onclick="toggleMenu1()" class="ri-heart-3-line"></i></li>
                    

                <li><i onclick="toggleMenu2()" class="ri-shopping-bag-4-line"></i></li>
                

                <li><i onclick="toggleMenu3()" class="ri-user-3-line"></i></li>
                <!-- <div class="sub-menu-wrap" id="subMenu3">
                    <div class="sub-menu">
                        <div class="user-info">
                            <h3>Rodrigo Vera</h3>
                        </div>
                        <hr>

                        <a href="#" class="sub-menu-link">
                            <i class="ri-edit-line"></i>
                            <p>Editar perfil</p>
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-settings-5-line"></i>
                            <p>Ajustes</p>
                            
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-question-line"></i>
                            <p>Ayuda</p>
                            
                        </a>
                        <a href="#" class="sub-menu-link">
                            <i class="ri-logout-box-line"></i>
                            <p>Salir</p>
                            
                        </a>

                    </div>
                </div> -->

                
                
            </ul>
        </nav>
        
    </header>



    <main>
        
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item"><img src="../media/chanel_3_1920x480_1.jpg" alt="Image 1"></div>
            <div class="carousel-item"><img src="../media/notas.jpg" alt="Image 2"></div>
            <div class="carousel-item"><img src="../media/vita_hero-parfum-cps-solo_1200x300.webp" alt="Image 3"></div>
        </div>
    </div>
        
    
    

   


    </main>



    <footer>

    </footer>



    <script src="../js/index.js?v=<?php echo time(); ?>"></script>
</body>
</html>