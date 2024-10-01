<?php

    include '../db.php' ;

    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $min_stock = $_POST['min_stock'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen_url'];



    $sql = "UPDATE productos SET nombre = '$nombre' AND marca = '$marca' AND categoria = '$categoria' AND precio = $precio AND stock = $stock AND min_stock = $min_stock AND descripcion = '$descripcion' AND imagen_url = $imagen WHERE nombre = '$nombre'";


    if (mysqli_query($conn, $query)) {
        // Redirigir a la página del carrito después de la adición
        header("Location: modificar_admin.php");
        exit();
    } else {
        echo "Error al modificar el producto: " . mysqli_error($conn);
    }





?>