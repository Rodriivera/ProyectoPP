<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/busqueda.css?v=<?php echo time(); ?>" />
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
                    <li class="dropdown-list-item">Todo</li>
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



    <main>   

    <?php
    // bd detalles
    $host = 'localhost';
    $dbname = 'aromas';
    $username = 'root';
    $password = '';

    // conectar a la base de datos
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Error connecting to the database: " . $e->getMessage());
    }

    // obtener parámetros de búsqueda, categoría, orden y precio
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $category = isset($_GET['category']) ? $_GET['category'] : 'Todo';
    $order = isset($_GET['order']) ? $_GET['order'] : '';
    $precio_min = isset($_GET['precio_min']) ? (int)$_GET['precio_min'] : 0;
    $precio_max = isset($_GET['precio_max']) ? (int)$_GET['precio_max'] : 0;

    // Base de la consulta SQL
    $sql = "SELECT * FROM productos WHERE (nombre LIKE :search OR autor LIKE :search)";

    // Filtra por categoría si se seleccionó alguna
    if ($category !== 'Todo') {
        $sql .= " AND categoria = :category";
    }

    // Aplica el filtro de precio si los valores están presentes
    if ($precio_min > 0) {
        $sql .= " AND precio >= :precio_min";
    }
    if ($precio_max > 0) {
        $sql .= " AND precio <= :precio_max";
    }

    // Ordena si se ha seleccionado un criterio de orden
    if (!empty($order)) {
        $sql .= " ORDER BY precio $order";
    }

    // Preparar la consulta
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    if ($category !== 'Todo') {
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    }
    if ($precio_min > 0) {
        $stmt->bindValue(':precio_min', $precio_min, PDO::PARAM_INT);
    }
    if ($precio_max > 0) {
        $stmt->bindValue(':precio_max', $precio_max, PDO::PARAM_INT);
    }

    // Ejecutar la consulta
    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Error executing query: " . $e->getMessage());
    }
    ?>

    <!-- HTML para la sección de filtros y productos -->

    <section class="filtros-de-busqueda">
        <div id="seleccionar-categoria" class="seleccionar-categoria">
            <div class="dropdown3">
                <div id="drop-text3" class="dropdown-text3">
                    <span id="span3">Categorías</span>
                    <i id="icon3" class="ri-arrow-down-s-line"></i>
                </div>
                <ul id="list3" class="dropdown-list3">
                    <!-- Aquí se encuentran las categorías -->
                    <a href="busqueda.php?search=<?php echo $search; ?>&category=Todo">
                        <li class="dropdown-list-item3">Todo</li>
                    </a>
                    <a href="busqueda.php?search=<?php echo $search; ?>&category=Fragancias">
                        <li class="dropdown-list-item3">Fragancias</li>
                    </a>
                    <!-- Añadir más categorías si es necesario -->
                </ul>
            </div>
        </div>

        <div id="ordenar-precio" class="ordenar-precio">
            <div class="dropdown2" id="dropdown2">
                <div id="drop-text2" class="dropdown-text2">
                    <span id="span2">Ordenar por</span>
                    <i id="icon2" class="ri-arrow-down-s-line"></i>
                </div>
                <ul id="list2" class="dropdown-list2">
                    <a href="busqueda.php?search=<?php echo $search; ?>&category=<?php echo $category; ?>&order=ASC&precio_min=<?php echo $precio_min; ?>&precio_max=<?php echo $precio_max; ?>">
                        <li class="dropdown-list-item2">Menor a mayor</li>
                    </a>
                    <a href="busqueda.php?search=<?php echo $search; ?>&category=<?php echo $category; ?>&order=DESC&precio_min=<?php echo $precio_min; ?>&precio_max=<?php echo $precio_max; ?>">
                        <li class="dropdown-list-item2">Mayor a menor</li>
                    </a>
                </ul>
            </div>
        </div>

        <div id="filtro-precio" class="filtro-precio">
            <form action="busqueda.php" method="GET">
                <input type="hidden" name="search" value="<?php echo $search; ?>">
                <input type="hidden" name="category" value="<?php echo $category; ?>">
                <label for="precio-minimo">Precio Mínimo:</label>
                <input type="number" id="precio-minimo" name="precio_min" min="0">
                <label for="precio-maximo">Precio Máximo:</label>
                <input type="number" id="precio-maximo" name="precio_max" min="0">
                <button type="submit">Filtrar</button>
            </form>
        </div>
    </section>

            








            <section id="productos" class="productos">
                
            <?php
            
            // mostrar resultados de busqueda
            if (count($results) > 0) {
                foreach ($results as $row) {
                    $name = $row['nombre'];
                    $brand = $row['autor'];
                    $price = $row['precio'];
                    $image = $row['imagen'];

                    ?>
                    
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
                
                        





                    <?php
                }
            } else {
                echo "<h5>No hay resultados para la búsqueda</h5>";
            }
            echo '</section>';
            

            ?>

    </main>






    <script src="../js/busqueda.js?v=<?php echo time(); ?>"></script>
</body>
</html>