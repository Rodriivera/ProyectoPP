<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>
<body>


<header>
        <div class="logo-y-menu">
        <a href="../php/index.php" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
        <i onclick="toggleMenu()" id="menu" class="ri-menu-line menu-icon"></i>
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
                <input type="text" id="search-input" name="search" placeholder="Buscar">
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>
        </form>


        <nav>
            <ul>

                <li><i onclick="toggleMenu1()" class="ri-heart-3-line"></i></li>
                    

                <li><i onclick="toggleMenu2()" class="ri-shopping-bag-4-line"></i></li>
                

                <li><i onclick="toggleMenu3()" class="ri-user-3-line"></i></li>

                
            </ul>
        </nav>
        
    </header>



    <section>
        <div class="container">

            <div class="menu">
                <ul class="lista-menu">
                    <li> 
                        <div id="drop-text" class="dropdown-text">
                            <span id="span">Stock</span>
                        </div>
                    </li>
                    <li>
                        <div id="drop-text" class="dropdown-text">
                            <span id="span">Estadisticas</span>
                        </div>
                    </li>
                    <li>
                        <div id="drop-text" class="dropdown-text">
                            <span id="span">Publicar</span>
                        </div>
                    </li>
                    <li>
                        <div id="drop-text" class="dropdown-text">
                            <span id="span">Reponer</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="actividad">
                <div class="stock" id="stock">
                    <div class="container-tabla">
                        <table border="1" class="table-stock">
                            <thead>
                                <div class="botones-tabla-container">
                                    <button value="Eliminar" >Eliminar</button>
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
                                        <input type="text" id="search-input" name="search" placeholder="Buscar">
                                        <button type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                    <button value="Guardar">Guardar</button>
                                
                                </div>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Operaciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="stock" id=""estadisticas"">

                </div>
                <div class="faltantes">

                </div>
                <div class="agregar">
                    
                </div>
            </div>
        </div>
    </section>

    

</body>
</html>