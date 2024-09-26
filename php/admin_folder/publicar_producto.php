
<?php


    include '../db.php';    


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Directorio donde se guardarán las imágenes
        $directorio = 'img_productos/';
    
        // Verifica si el directorio existe, si no, lo crea
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
    
        // Información del archivo subido
        $archivo = $_FILES['imagen'];
        $nombreArchivo = basename($archivo['name']);
        $rutaDestino = $directorio . $nombreArchivo;
    
        // Verifica si el archivo es una imagen
        $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
    
        if (in_array($tipoArchivo, $tiposPermitidos)) {
            // Intenta mover el archivo al directorio de destino
            if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                echo "La imagen ha sido subida exitosamente: " . htmlspecialchars($nombreArchivo);
            } else {
                echo "Lo siento, hubo un error al subir tu imagen.";
            }
        } else {
            echo "Solo se permiten imágenes JPG, JPEG, PNG y GIF.";
        }
    } else {
        echo "Método de solicitud no válido.";
    }






    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $min_stock = $_POST["min_stock"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO productos(nombre, marca, precio, imagen_url, categoria, stock, min_stock, descripcion) 
    VAlUES('$nombre','$marca','$precio','$nombreArchivo','$categoria','$stock','$min_stock','$descripcion')";           

    if (mysqli_query($conn, $query)) {
        // Redirigir a la misma página o a la página del carrito después de la eliminación
        header("Location: publicar_admin.php"); // Redirige a la página del carrito o la que elijas
        exit();
    }

?>
