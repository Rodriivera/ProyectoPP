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

        ?>

        <div class="pedido-contenido">
        
        <?php
            // Obtener productos del carrito
            $sql = "SELECT dp.*, p.imagen_url, p.nombre, p.marca 
                    FROM detalle_pedido dp 
                    JOIN productos p ON dp.producto_id = p.id WHERE dp.pedido_id = $pedido_id";

            $result = $conn->query($sql);

            
        ?>

        <?php if ($result->num_rows > 0) { ?>
            
                <?php while ($row = $result->fetch_assoc()) { 

                ?>
                
                <a href="../php/producto.php?id=<?php echo $row['producto_id']; ?>">
                    <div class="producto">

                        <div class="imagen" style="background-image: url('./admin_folder/img_productos/<?php echo $row['imagen_url']; ?>');"></div>

                        <div class="info-producto">
                            <h2><?php echo $row['nombre']; ?></h2>
                            <p><?php echo $row['marca']; ?></p>
                            <h3><?php echo "$" . number_format($row['precio'], 0); ?></h3>
                        </div>

                        <div class="cantidad">
                            <p><?php echo $row['cantidad']; ?></p>
                        </div>
                    
                    </div>
                </a>





                <?php } ?>
            
                <?php
                // Obtener el total del pedido
                $sql_total = "SELECT SUM(precio * cantidad) as total FROM detalle_pedido WHERE pedido_id = $pedido_id";
                $result_total = $conn->query($sql_total);
                $total = 0;
                if ($result_total->num_rows > 0) {
                    $row_total = $result_total->fetch_assoc();
                    $total = $row_total['total'];
                }
                ?>

                
                

        <?php } else { ?>
            <div class="no-pedido">
                <p>No tenés productos en tu pedido.</p>
            </div>

        <?php } ?>

        

    </div>

    <div class="total">
            <p>Total: $<?php echo number_format($total, 0); ?></p>
    </div>
    <?php } ?>

    </section>


</main>

<?php include 'footer.php'; ?>

<script src="../js/pedido.js"></script>
</body>

</html>
