<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/admin_style/inventario_admin.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Aromas</title>
</head>
<body>


<aside>
    <div class="container-admin">
    <a href="../index.php" class="logo"><img src="../../media/Aromas_sf.png" alt="" width="175px"></a>
        <div class="container-lista-admin">
            <ul class="menu">
            
                <li><a href="admin.php"></a><span>Estadisticas</span></a></li>
                <li class="active"><a href="inventario_admin.php"><span>Inventario</span></a></li>
                <li><a href="publicar_admin.php"><span>Publicar</span></a></li>
                <li><a href="mensaje_admin.php"><span>Mensajes</span></a></li>
            </ul>
    </div>
</aside>

<section class="secciones" id="inventario-section">

        <div class="container-tabla">

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

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db.php'; // Asegúrate de que 'db.php' esté configurado correctamente y $conn esté definido

                        $sql = "SELECT * FROM productos ORDER BY id ASC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['nombre'];
                                $price = $row['precio'];
                                $image = $row['imagen_url'];
                                $stock = $row['stock'];

                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td class="td_img"><div  class="td_imagen" style='background-image: url(<?php echo $image?>);'></div></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $stock; ?></td> 
                        <td><?php echo number_format($price, 0); ?></td>
                        <td class="td_operaciones">
                            <form action="eliminar_producto.php" method="POST">

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                <button><i class="ri-pencil-line"></i></button>
                                <button class="td_operaciones_eliminar"><i class="ri-close-fill"></i></button>
                            
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    } else {
                        echo "<tr><td colspan='6'>No se encontraron productos</td></tr>";
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </section>






</body>
</html>