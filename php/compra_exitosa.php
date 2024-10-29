<?php
include 'db.php';  // Conexión a la base de datos
session_start();

// ID del usuario logueado
$userId = $_SESSION['user_id'];

// Calcular el total del carrito
$total = 0;
$productos = $conn->query("SELECT * FROM carritos WHERE usuario_id = $userId");
while ($producto = $productos->fetch_assoc()) {
    // Obtener el precio del producto
    $precioProducto = $conn->query("SELECT precio FROM productos WHERE id = " . $producto['producto_id'])->fetch_assoc()['precio'];
    $total += $precioProducto * $producto['cantidad'];
}

// Insertar el pedido en la tabla 'pedidos'
$conn->query("INSERT INTO pedidos (usuario_id, total, estado, fecha_pedido) VALUES ($userId, $total, 'Pendiente', NOW())");

// Obtener el ID del pedido recién insertado
$pedidoId = $conn->insert_id;

// Insertar los productos en la tabla 'detalle_pedido' y restar stock
$productos->data_seek(0);  // Reiniciar el puntero del resultado
while ($producto = $productos->fetch_assoc()) {
    $productoId = $producto['producto_id'];
    $cantidad = $producto['cantidad'];
    $precio = $conn->query("SELECT precio FROM productos WHERE id = $productoId")->fetch_assoc()['precio'];

    // Insertar en detalle_pedido
    $conn->query("INSERT INTO detalle_pedido (pedido_id, producto_id, cantidad, precio) 
                  VALUES ($pedidoId, $productoId, $cantidad, $precio)");

    // Restar la cantidad comprada del stock del producto
    $conn->query("UPDATE productos SET stock = stock - $cantidad WHERE id = $productoId");
    // enviar datos para la grafica del admin
$categoria = $conn->query("SELECT categoria FROM productos WHERE id = $productoId")->fetch_assoc()['categoria'];
$conn->query("INSERT INTO ventas (producto_id, categoria, precio, cantidad, fecha) VALUES ($productoId, '$categoria', $precio, $cantidad, NOW())");
}

// Vaciar el carrito del usuario
$conn->query("DELETE FROM carritos WHERE usuario_id = $userId");





?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/compra_exitosa.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<div class="mensaje">
    <h1>¡Gracias por tu compra!</h1>
    <h2>Tu pedido fue registrado y está en la sección "Pedidos".</h2>
    <p>Serás redirigido automáticamente a la sección de pedidos en 10 segundos.</p>

</div>

</main>

<?php include 'footer.php'; ?>
<script src="../js/compra_exitosa.js?v=<?php echo time(); ?>"></script>
</body>
</html>