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

    <h1 class="hidden">Mis pedidos</h1>
                
    <div class="pedidos-container">
        <?php
            // Obtener pedidos
            $id = $_SESSION['user_id'];
            $sql = "SELECT * FROM pedidos WHERE usuario_id = $id";
            $result = $conn->query($sql);

        if ($result->num_rows > 0) { 

            while ($row = $result->fetch_assoc()) {?>
            <a href="pedido.php?id=<?php echo $row['id'];?>">
            <div class="pedido hidden">
                <h2>Numero #<?php echo $row['id']; ?></h2>
                <p><?php echo $row['fecha_pedido']; ?></p>
                <p><?php echo "$" . number_format($row['total'], 0); ?></p>
                <p class="estados <?php echo strtolower($row['estado']); ?>"><?php echo $row['estado']; ?></p>
            </div>
            </a>

        <?php
            }
        } else { ?>
            <div class="no-pedidos hidden">
                <p>No tenés pedidos.</p>
            </div>
        <?php
        }

        ?>


    </div>
    



    </section>


</main>

<?php include 'footer.php'; ?>

</body>

<script src="../js/pedidos.js"></script>

</html>
