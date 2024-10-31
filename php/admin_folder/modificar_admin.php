<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/admin_style/modificar_admin.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Aromas</title>
</head>
<body>

<header>
        <div class="logo-header">
            <a href="../index.php"><img src="../../media/Aromas_sf.png" alt="" width="175px"></a>
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
            
                <li><a href="admin.php"><span>Estadisticas</span></li>
                <li  class="active"><a href="inventario_admin.php"><span>Inventario</span></a></li>
                <li><a href="publicar_admin.php"><span>Publicar</span></a></li>
              
            </ul>
    </div>
</aside>


    <section class="secciones" id="modificar-section">

    <div class="publicar_todo">
        <div class="publicar_texto">
            <h2>Modificar Producto</h2>
        </div>
            

        <form  class="container_input" id="upload-form" action="modificar_producto.php" method="POST" enctype="multipart/form-data">
           
            <?php
            include '../db.php';

            $id = $_REQUEST['id']; // ID del registro a editar
            
            $sql = "SELECT * FROM productos WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nombre = $row['nombre'];
                $marca = $row['marca'];
                $precio = $row['precio'];
                $stock = $row['stock'];
                $min_stock = $row['min_stock'];
                $descripcion = $row['descripcion'];
                $categoria = $row['categoria'];
                // $imagen = $row['imagen_url'];
            }
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div  class="input_label">   
                <label>Nombre</label>
                <input type="text" name="nombre"  value="<?php echo $nombre; ?>">
            </div>
            
            <div class="input_label">   
                <label>Marca</label>
                <input type="text" name="marca"  value="<?php echo $marca; ?>">
            </div>           

            <div class="input_label">   
                <label>Categoria</label>
                <select name="categoria" id=""  autofocus="<?php echo $categoria; ?>">
                    <option value="Fragancias" <?php if ($categoria === "Fragancias") echo 'selected'; ?>>Fragancias</option>
                    <option value="Maquillaje" <?php if ($categoria === "Maquillaje") echo 'selected'; ?>>Maquillaje</option>
                    <option value="Faciales" <?php if ($categoria === "Faciales") echo 'selected'; ?>>Faciales</option>
                    <option value="Capilares" <?php if ($categoria === "Capilares") echo 'selected'; ?>>Capilares</option>
                    <option value="Personales" <?php if ($categoria === "Personales") echo 'selected'; ?>>Personales</option>
                    <option value="Regaleria" <?php if ($categoria === "Regaleria") echo 'selected'; ?>>Regaleria</option>
                    <option value="Hogar" <?php if ($categoria === "Hogar") echo 'selected'; ?>>Hogar</option>
                    <option value="Accesorios" <?php if ($categoria === "Accesorios") echo 'selected'; ?>>Accesorios</option>
                </select>
            </div>


            <div class="container_input_number">
                
                <div class="input_label">  
                    <label>Precio</label>
                    <input class="input_number" type="number" min="0" name="precio" value="<?php echo htmlspecialchars($precio,0); ?>">
                    
                </div>
                
                <div class="input_label">   
                    <label>Stock</label>
                    <input class="input_number" type="number" min="0" name="stock"  value="<?php echo $stock; ?>">
                </div>

                <div class="input_label">   
                    <label>Min-Stock</label>
                    <input class="input_number" type="number" min="0" name="min_stock" value="<?php echo $min_stock; ?>">
                </div>
            </div>

            

            



            <div class="input_label">   
                <label>Descripcion</label>
                <textarea name="descripcion"><?php echo htmlspecialchars($descripcion) ?></textarea>
            </div>


            <!-- <div>    
                <label class="file-label">Imagen</label>
                <div id="preview" class="styleimage">
                    <img src="img_productos/<?php echo $imagen; ?>" style="max-width: 100%;" alt="">
                </div>
                <input type="file" id="file" name="imagen" accept="image/*">
                
                
                <script>    
                    const fileInput = document.getElementById('file');
                    const previewDiv = document.getElementById('preview');

                    fileInput.addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            
                            reader.onload = function(e) {
                                // Limpiar el div previo
                                previewDiv.innerHTML = '';
                                
                                // Crear una nueva imagen
                                const img = document.createElement('img');
                                img.src = e.target.result;
                                img.alt = 'Previsualización';
                                img.style.maxWidth = '100%'; // Ajusta el tamaño según sea necesario
                                
                                // Añadir la imagen al div de previsualización
                                previewDiv.appendChild(img);
                            }
                            
                            // Leer el archivo como URL
                            reader.readAsDataURL(file);
                        }
                    });
                </script> 
                        
            </div> -->

            <button id="submit-btn" type="submit">Enviar</button>

        </form>

    </div>
    </section>







</body>
</html>