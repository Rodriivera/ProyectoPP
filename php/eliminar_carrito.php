<?php
// Conexión a la base de datos
include 'db.php'; // Asegúrate de tener tu archivo de conexión

if (isset($_POST['id'])) {
    // Escapar el ID para evitar inyecciones SQL
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);

    // Consulta directa para eliminar el producto del carrito
    $query = "DELETE FROM carritos WHERE producto_id = $product_id";
    
    if (mysqli_query($conn, $query)) {
        // Redirigir a la misma página o a la página del carrito después de la eliminación
        header("Location: carrito.php"); // Redirige a la página del carrito o la que elijas
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
