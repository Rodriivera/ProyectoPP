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
    <link rel="stylesheet" href="../css/pedidos.css?v=<?php echo time(); ?>" />
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
        <h1>Mis pedidos</h1>
        
            <?php

            $id = $_SESSION['user_id'];
            
            $sql = "SELECT * FROM pedidos WHERE usuario_id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    $fecha = $row['fecha_pedido'];
                    $total = $row['total'];
                    $estado = $row['estado'];

                    echo "<div class='linea'></div>";
                    echo "<div class='pedido-item'>";
                    echo "<h2>Pedido #$pedido_id</h2>";
                    echo "<p><span>Fecha: </span>$fecha</p>";
                    echo "<p><span>Total: </span>" . number_format($total, 0) . "</p>";
                    echo "<p><span>Estado: </span> $estado</p>";
                    echo "<a href='pedido.php?id=$pedido_id'>Ver detalles</a>";
                    echo "</div>";    
                    echo "<div class='linea'></div>";
                
                
                }
            } else {
                echo "<div class='linea'></div>";
                echo "<p>No hay pedidos.</p>";
                echo "<div class='linea'></div>";
            }

            ?>
    </section>


</main>

<?php include 'footer.php'; ?>

</body>
<script src="../js/pedidos.js"></script>
</html>