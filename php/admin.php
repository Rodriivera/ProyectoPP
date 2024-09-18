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


    <section id="aside">
        
        <div class="container-admin">
        <a href="../php/index.php" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>
            <div class="container-lista-admin">
                <ul class="menu">
               
                    <li class="active"><span id="active" onclick="showSection('estadisticas-section')">Estadisticas</span></li>
                    <li><span onclick="showSection('inventario-section')">Inventario</span></li>
                    <li><span onclick="showSection('publicar-section')">Publicar</span></li>
                    <li><span onclick="showSection('mensaje-section')">Mensajes</span></li>
                </ul>
            </div>
    </section>

    <section class="secciones" id="estadisticas-section">


    </section>


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
                                <td class="td_operaciones"><button><i class="ri-pencil-line"></i></button><button class="td_operaciones_eliminar"><i class="ri-close-fill"></i></button></td>
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


    <section class="secciones" id="publicar-section">

        <div class="publicar_todo">
        <div class="publicar_texto">
        <h2>Publicar Producto</h2>
        </div>
        <div class="container_input"> 

            <div class="nombre-m-c">

                <div  class="input_label">   
                    <label>Nombre</label>
                    <input type="text">
                </div>

                <div class="input_label">   
                    <label>Marca</label>
                    <input type="text">
                </div>

                <div class="input_label">   
                    <label>Categoria</label>
                    <input type="text">
                </div>

            </div>

            <div class="input_label">   
                
                <label>Imagen</label>
                <div id="preview" class="styleimage"><i class="ri-file-image-line"></i></div>
                <input type="file" name="file" id="file">
                
                
            </div>

            <div class="input_label">   
                <label>Descripcion</label>
                <textarea></textarea>
            </div>

            <div class="input_label">   
                <label>Precio</label>
                <input type="number" min="0">
            </div>

            

            <div class="input_label">   
                <label>Stock</label>
                <input type="number" min="0">
            </div>

            <div class="input_label">   
                <label>Stock Minimo</label>
                <input type="number" min="0">
        
            </div>
        </div>
        </div>
    </section>


    <section class="secciones" id="mensaje-section">


    </section>

    
    <script src="../js/adminmenu.js?v=<?php echo time(); ?>"></script>
</body>
</html>