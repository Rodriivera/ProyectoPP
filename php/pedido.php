<?php
        include 'db.php';

        session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/pedido.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

    <section class="pedidos">
        
            <?php


            if (isset($_GET['id'])) {
                $pedido_id = $_GET['id'];

                echo "<h1>Detalles del Pedido #$pedido_id</h1>";

                // Consulta para obtener el pedido según el ID del pedido y el usuario
                $sql = "SELECT dp.*, p.imagen_url, p.nombre, p.marca 
                        FROM detalle_pedido dp 
                        JOIN productos p ON dp.producto_id = p.id 
                        WHERE dp.pedido_id = $pedido_id";

                $result = $conn->query($sql);

                // Verifica si se encontró el pedido
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $imagen = $row['imagen_url'];
                        $nombre = $row['nombre'];
                        $marca = $row['marca'];
                        $cantidad = $row['cantidad'];
                        $precio = $row['precio'];

                        // Muestra los detalles del pedido
                        echo "<div class='linea'></div>";
                        echo "<div class='pedido-item'>";
                        echo "<div class='imagen' style='background-image: url($imagen);'></div>";
                        echo "<p><span>Producto: </span>$nombre</p>";
                        echo "<p><span>Marca: </span>$marca</p>";
                        echo "<p><span>Cantidad: </span>$cantidad</p>";
                        echo "<p><span>Precio: </span>" . number_format($precio, 0) . "</p>";
                        
                        echo "</div>";
                        echo "<div class='linea'></div>";
                    }
                }else{
                    echo "<p>No se encontró el pedido.</p>";
                }
                // Consulta para obtener el total del pedido
                $sql_total = "SELECT * FROM pedidos WHERE id = $pedido_id";
                $result_total = $conn->query($sql_total);

                if ($result_total->num_rows > 0) {
                    $row_total = $result_total->fetch_assoc();
                    $estado = $row_total['estado'];
                    $total = $row_total['total'];

                    echo "<div class='resumen-pedido'>";
                    echo "<a href='pedidos.php'>Volver a pedidos</a>";
                    // echo "<h2>Fecha: " . $row_total['fecha_pedido'] . "</h2>";
                    // echo "<h2>Estado: $estado</h2>";
                    echo "<h2>Total: " . number_format($total, 0) . "</h2>";
                    echo "</div>";

                } else {
                    echo "<p>No se pudo obtener el total del pedido.</p>";
                }
            }

            ?>



    </section>


</main>

<?php include 'footer.php'; ?>

</body>
<script src="../js/pedido.js"></script>
</html>