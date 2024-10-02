<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
include 'db.php'; // Asegúrate de tener tu archivo de conexión

if (isset($_POST['id']) && isset($_SESSION['user_id'])) {
    // Escapar el ID del producto y el ID del usuario para evitar inyecciones SQL
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);
    $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);

    // Verificar si el producto ya está en favoritos
    $check_query = "SELECT * FROM favoritos WHERE usuario_id = $user_id AND producto_id = $product_id";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        header("Location: favoritos.php");
            exit();
    } else {
        // Consulta para agregar el producto a favoritos del usuario
        $query = "INSERT INTO favoritos (usuario_id, producto_id) VALUES ($user_id, $product_id)";
        
        if (mysqli_query($conn, $query)) {
            // Redirigir a la página de favoritos después de la adición
            header("Location: favoritos.php");
            exit();
        } else {
            echo "Error al agregar el producto: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    echo "ID del producto o ID del usuario no está establecido.";
}
?>
