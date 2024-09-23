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
    <link rel="stylesheet" href="../css/carrito.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="carrito">
    <h1>Mi carrito</h1>
    <div class="carrito-contenido">

        <?php
            // Assuming you have a database connection in db.php
            $userId = $_SESSION['user_id']; // Assuming user_id is stored in session

            $query = "SELECT carritos.*, productos.nombre, productos.precio, productos.imagen_url, productos.marca FROM carritos 
                      JOIN productos ON carritos.producto_id = productos.id WHERE carritos.usuario_id = $userId";
                      
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo "<div class='linea'></div>";

                    echo "<div class='carrito-item'>";
                    
                        echo "<div class='imagen' style='background-image: url(" . $row['imagen_url'] . ");'></div>";
                        echo "<h2><span>Producto: </span>" . htmlspecialchars($row['nombre']) . "</h2>";
                        echo "<p><span>Marca: </span>" . htmlspecialchars($row['marca']) . "</p>";
                        echo "<p><span>Cantidad: </span>" . htmlspecialchars($row['cantidad']) . "</p>";
                        echo "<p><span>Precio: $</span>" . number_format(htmlspecialchars($row['precio']), 0) . "</p>";

                        ?>

                        <form action="eliminar_carrito.php" method="POST" style="display:inline;">

                            <input type="hidden" name="id" value="<?php echo $row['producto_id']; ?>">
                            <button type="submit" style="background:none;border:none;cursor:pointer;">
                                <i class="ri-delete-bin-line"></i>
                            </button>

                        </form>

                        <?php

                    echo "</div>";

                    echo "<div class='linea'></div>";
                }
            } else {
                echo "<div class='linea'></div>";
                echo "<p>Tu carrito esta vacio.</p>";
                echo "<div class='linea'></div>";
            }
        ?>

        <?php

            $total = 0;

            // Reset the result pointer and re-fetch the data
            $result->data_seek(0);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total += $row['precio'] * $row['cantidad'];
                }
            }

        ?>

        <div class="resumen">
        <?php if ($result->num_rows > 0): ?>

        <a href="pago.php">Realizar compra</a>
        <h3>Total: $<?php echo number_format($total, 0); ?></h3>

        <?php endif; ?>
        </div>

    </div>

</section>








</main>

<?php include 'footer.php'; ?>

<script src="../js/carrito.js?v=<?php echo time(); ?></script>
</body>
</html>