<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
include 'db.php'; // Asegúrate de tener tu archivo de conexión

if (isset($_POST['id']) && isset($_SESSION['user_id']) && isset($_POST['hidden_quantity'])) {
    // Escapar el ID del producto y la cantidad para evitar inyecciones SQL
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['hidden_quantity']); // Capturar la cantidad oculta enviada

    // Consulta para agregar el producto al carrito del usuario
    $query = "INSERT INTO carritos (usuario_id, producto_id, cantidad) VALUES ($user_id, $product_id, $cantidad)";
    
    if (mysqli_query($conn, $query)) {
        // Redirigir a la página del carrito después de la adición
        header("Location: carrito.php");
        exit();
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "ID del producto, cantidad o ID del usuario no está establecido.";
}
?>
