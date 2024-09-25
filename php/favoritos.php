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
    <link rel="stylesheet" href="../css/favoritos.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="favoritos">
    <h1>Mis favoritos</h1>
    <div class="favoritos-contenido">

    <div class="favoritos-contenido">
        <?php
            // Obtener productos
            $userId = $_SESSION['user_id'];
            $query = "SELECT favoritos.*, productos.nombre, productos.precio, productos.imagen_url, productos.marca 
                  FROM favoritos 
                  JOIN productos ON favoritos.producto_id = productos.id 
                  WHERE favoritos.usuario_id = $userId";
            $result = $conn->query($query);
        ?>

        <?php if ($result->num_rows > 0) { ?>
            <table class="favoritos-tabla">
            <thead>
                <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Fabricante</th>
                <th>Precio</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { 


                ?>
                <tr>
                    <td><div class='imagen' style='background-image: url("<?php echo $row['imagen_url']; ?>");'></div></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['marca']; ?></td>


                    <td><?php echo "$" . number_format($row['precio'], 0); ?></td>

                    <td>
                    <form class="borrar" action="eliminar_favoritos.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['producto_id']; ?>">
                        <button type="submit" style="background:none;border:none;cursor:pointer;">
                        <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            
            </table>
        <?php } else { ?>
            <div class="linea"></div>
            <p>No tenés favoritos.</p>
            <div class="linea"></div>

        <?php } ?>

        

    </div>

</section>








</main>

<?php include 'footer.php'; ?>

<script src="../js/favoritos.js?v=<?php echo time(); ?></script>
</body>
</html>