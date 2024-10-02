<?php
session_start();
include 'db.php';  // Conexión a la base de datos

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
}

// Vaciar el carrito del usuario
$conn->query("DELETE FROM carritos WHERE usuario_id = $userId");

// Redirigir a una página de confirmación
header("Location: pedidos.php");
?>
