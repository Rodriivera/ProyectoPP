<?php

    include '../db.php' ;

    $id = $_POST['id'];
    $nombre = $_POST["nombre"];
    $marca = $_POST["marca"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];
    $min_stock = $_POST["min_stock"];
    $precio = $_POST["precio"];
    
    

    // Imprimir para depuración
    echo "ID del producto: $id<br>";
    $query = "UPDATE productos SET 
        nombre='$nombre', 
        marca='$marca', 
        precio='$precio', 
        categoria='$categoria', 
        stock='$stock', 
        min_stock='$min_stock', 
        descripcion='$descripcion' 
        WHERE id='$id'";
    
    echo "Consulta: $query<br>";
    
    if (mysqli_query($conn, $query)) {
        header("Location: inventario_admin.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
    
    // Cerrar conexión
    $conn->close();
?>
