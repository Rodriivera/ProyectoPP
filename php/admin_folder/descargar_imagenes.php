<?php
    include "../db.php";



    $sql= "SELECT imagen_url FROM productos";
    $result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un directorio para guardar las imágenes
    $dir = 'img_productos/';
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    // Recorrer los resultados y descargar las imágenes
    while ($row = $result->fetch_assoc()) {
        $url = $row['imagen_url'];
        $imageName = basename($url, pathinfo($url, PATHINFO_EXTENSION)); // Obtener el nombre base
        $imageName .= '.jpg'; // Forzar la extensión a .jpg
        $retryCount = 0;
        $success = false;

        // Intentar descargar la imagen hasta que tenga éxito o se alcance el límite de intentos
        while (!$success && $retryCount < 5) { // Cambia 5 por el número máximo de intentos que desees
            $retryCount++;
            try {
                // Descargar la imagen
                $imageData = file_get_contents($url);
                if ($imageData !== false) {
                    file_put_contents($dir . $imageName, $imageData);
                    echo "Descargada: $imageName\n";
                    $success = true; // Marca como exitoso
                } else {
                    echo "Error al descargar: $imageName. Intento $retryCount\n";
                }
            } catch (Exception $e) {
                echo "Error al descargar: $imageName. Intento $retryCount\n";
            }
        }

        if (!$success) {
            echo "Falló al descargar $imageName después de $retryCount intentos.\n";
        }
    }
} else {
    echo "No se encontraron imágenes.";
}

// Cerrar conexión
$conn->close();
?>
?>