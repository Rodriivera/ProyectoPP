


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/admin_style/publicar_admin.css?v=<?php echo time(); ?>" />
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
            
                <li><a href="admin.php"><span>Estadisticas</span></li>
                <li><a href="inventario_admin.php"><span>Inventario</span></a></li>
                <li class="active"><a href="publicar_admin.php"><span>Publicar</span></a></li>
                <li><a href="mensaje_admin.php"><span>Mensajes</span></a></li>
            </ul>
    </div>
</aside>


    <section class="secciones" id="publicar-section">

    <div class="publicar_todo">
        <div class="publicar_texto">
            <h2>Publicar Producto</h2>
        </div>


            <form  class="container_input" id="upload-form" action="publicar_producto.php" method="POST" enctype="multipart/form-data">

                <div  class="input_label">   
                    <label>Nombre</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="input_label">   
                    <label>Marca</label>
                    <input type="text" name="marca" required>
                </div>

                <div class="input_label">   

                    <label>Categoria</label>
                    <select name="categoria" id="" required>
                        <option value="">-Seleccionar categoria-</option>
                        <option value="fragancias">Fragancias</option>
                        <option value="maquillaje">Maquillaje</option>
                        <option value="faciales">Faciales</option>
                        <option value="capilares">Capilares</option>
                        <option value="personales">Personales</option>
                        <option value="regaleria">Regaleria</option>
                        <option value="hogar">Hogar</option>
                        <option value="accesorios">Accesorios</option>
                    </select>
                    
                </div>



                <div class="input_label">   
                    <label>Precio</label>
                    <input type="number" min="0" name="precio" required>
                </div>

                

                <div class="input_label">   
                    <label>Stock</label>
                    <input type="number" min="0" name="stock" required>
                </div>

                <div class="input_label">   
                    <label>Stock Minimo</label>
                    <input type="number" min="0" name="min_stock">
            
                </div>

                <div class="input_label">   
                    <label>Descripcion</label>
                    <textarea name="descripcion" required></textarea>
                </div>

            
                <div>    
                    <label class="file-label">Imagen</label>
                    <div id="preview" class="styleimage"><i class="ri-file-image-line"></i></div>
                    <input type="file" id="file" name="imagen" accept="image/*" required>
                    
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

                </div>
                <button type="submit">Enviar</button>

            </form>

    </div>
    </section>





    <script src="../../js/admin.js?v=<?php echo time(); ?>"></script>
</body>
</html>