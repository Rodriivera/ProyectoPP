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
            // Obtener productos del carrito
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM pedidos WHERE usuario_id = $id";
            $result = $conn->query($sql);
        ?>

        <?php if ($result->num_rows > 0) { ?>
            <table class="pedidos-tabla">
            <thead>
                <tr>
                <th>Pedido</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            while ($row = $result->fetch_assoc()) { 

            ?>

                <tr>
                    <td>Numero #<?php echo $row['id']; ?></td>
                    <td><?php echo $row['fecha_pedido']; ?></td>
                    <td><?php echo "$" . number_format($row['total'], 0); ?></td>
                    <td><?php echo $row['estado']; ?></td>
                    <td><a href="pedido.php?id=<?php echo $row['id'];?>">Ver detalles</a></td>
                </tr>

            <?php 

            } 

            ?>

            </tbody>
            </table>
        <?php } else { ?>
            <div class="linea"></div>
            <p>No tenés Pedidos.</p>
            <div class="linea"></div>

        <?php } ?>



    </section>


</main>

<?php include 'footer.php'; ?>

</body>
<script src="../js/pedidos.js"></script>
</html>