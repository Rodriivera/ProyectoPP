<?php

session_start();


?>



<!DOCTYPE html>
<html lang="es">
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



    <?php include 'header.php'; ?>



    <main>   
    <?php
    // bd detalles
    $host = 'localhost';
    $dbname = 'aromas2';
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
    $sql = "SELECT * FROM productos WHERE (nombre LIKE :search OR marca LIKE :search)";

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
        <form action="busqueda.php" method="GET">

                <div class="dropdown3">
                        <div id="drop-text3" class="dropdown-text3">
                                <span id="span3">Categorías</span>
                                <i id="icon3" class="ri-arrow-down-s-line"></i>
                        </div>
                            <ul id="list3" class="dropdown-list3">
                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Todo">
                                    <li class="dropdown-list-item3">Todo</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Fragancias">
                                    <li class="dropdown-list-item3">Fragancias</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Maquillajes">
                                    <li class="dropdown-list-item3">Maquillajes</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Faciales">
                                    <li class="dropdown-list-item3">Faciales</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Capilares">
                                    <li class="dropdown-list-item3">Capilares</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Personales">
                                    <li class="dropdown-list-item3">Personales</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Regalería">
                                    <li class="dropdown-list-item3">Regalería</li>
                                </a>

                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Hogar">
                                    <li class="dropdown-list-item3">Hogar</li>
                                </a>
                                
                                <a href="busqueda.php?search=<?php echo $search; ?>&category=Accesorios">
                                    <li class="dropdown-list-item3">Accesorios</li>
                                </a>


                            </ul>
                            
                        </div>
                        
                    </div>



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


            <input type="hidden" name="search" value="<?php echo $search; ?>">
            <input type="hidden" name="category" value="<?php echo $category; ?>">


                <input type="number" id="precio-minimo" name="precio_min" min="0" placeholder="Precio Mínimo" class="rangos-precio"> 


                <input type="number" id="precio-maximo" name="precio_max" min="0" placeholder="Precio Máximo" class="rangos-precio">


            <button type="submit">Filtrar</button>
        </form>
    </section>

            








            <section id="productos" class="productos">
                
            <?php
            
            // mostrar resultados de busqueda
            if (count($results) > 0) {
                foreach ($results as $row) {
                    $name = $row['nombre'];
                    $brand = $row['marca'];
                    $price = $row['precio'];
                    $image = $row['imagen_url'];

                    ?>
                    
                            <a href="producto.php?id=<?php echo $row['id']; ?>">
                            <div class="box">

                                <div class="slide-img">
                                    <img src="./admin_folder/img_productos/<?php echo $image; ?>" alt="<?php echo $name; ?>">
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

    <?php include 'footer.php'; ?>




    <script src="../js/busqueda.js?v=<?php echo time(); ?>"></script>
</body>
</html>