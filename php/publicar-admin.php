<?php

include 'db.php';


    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $imagen = $_POST["imagen"];
    $stock = $_POST["stock"];
    $min_stock = $_POST["min_stock"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO productos(nombre, marca, precio, imagen_url, categoria, stock, min_stock, descripcion) VAlUES('$nombre','$marca','$precio','$imagen','$categoria','$stock','$min_stock','$decripcion')";           

    if (mysqli_query($conn, $query)) {
        // Redirigir a la misma página o a la página del carrito después de la eliminación
        header("Location: admin.php#publicar-section"); // Redirige a la página del carrito o la que elijas
        exit();
    }


?>