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

    <header>
        <div class="logo-header">
            <a href="../index.php"><img src="../../media/Aromas-negro.png" alt="" width="175px"></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="admin.php">Estadisticas</a>
                </li>
                <li>
                    <a href="inventario_admin.php">Inventario</a>
                </li>
                <li>
                    <a href="publicar_admin.php">Publicar</a>
                </li>
            </ul>
        </nav>
        
    </header>

<aside>
    <div class="container-admin">
        <a href="../index.php" class="logo"><img src="../../media/Aromas_sf.png" alt="" width="175px"></a>
        <ul class="menu">
        
            <li><a href="admin.php"><span>Estadisticas</span></a></li>
            <li class="active"><a href="inventario_admin.php"><span>Inventario</span></a></li>
            <li><a href="publicar_admin.php"><span>Publicar</span></a></li>
          
        </ul>
    </div>
</aside>

<section class="secciones" id="inventario-section">

        <div class="container-tabla">


            <table>
                <thead>
                    <tr>
                        <th class="hidden">Id</th>
                        <th class="hidden">Imagen</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th class="hidden">Min-Stock</th>
                        <th>Precio</th>
                        <th>Botones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../db.php'; // Asegúrate de que 'db.php' esté configurado correctamente y $conn esté definido

                        $sql = "SELECT * FROM productos ORDER BY id ASC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['nombre'];
                                $marca = $row['marca'];
                                $price = $row['precio'];
                                $image = $row['imagen_url'];
                                $stock = $row['stock'];
                                $min_stock = $row['min_stock'];


                    ?>
                    <tr>
                        <td class="hidden"><?php echo $id; ?></td>
                        <td class="td_img hidden"><div  class="td_imagen" style='background-image: url("img_productos/<?php echo htmlspecialchars($image); ?>");'></div></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $marca; ?></td>
                        <td><?php echo $stock; ?></td> 
                        <td class="hidden"><?php echo $min_stock; ?></td> 
                        <td><?php echo number_format($price, 0); ?></td>
                        <td class="td_operaciones">
                            <div>

                            <form action="modificar_admin.php" method="POST">
                                
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit"><i class="ri-pencil-line"></i></button>
                            </form>

                            <form action="eliminar_producto.php" method="POST">

                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button class="td_operaciones_eliminar"><i class="ri-close-fill"></i></button>
                            
                            </form>
                    
                            </div>
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