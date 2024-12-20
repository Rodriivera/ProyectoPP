<?php
    include 'db.php';
    session_start();

    // Procesar la actualización de la cantidad
    if (isset($_POST['update_quantity'])) {
        $productId = $_POST['id'];
        $newQuantity = $_POST['quantity'];

        // Asegurarse de que la cantidad sea válida
        if ($newQuantity > 0) {
            // Actualizar la cantidad del producto en el carrito
            $query = "UPDATE carritos SET cantidad = $newQuantity WHERE id = $productId AND usuario_id = " . $_SESSION['user_id'];
            $conn->query($query);
        }

        // Redirigir a la misma página para evitar reenvíos del formulario al actualizar
        header("Location: carrito.php");
        exit();
    }
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
    <h1 class=" hiddenn">Carrito</h1>


    
    <div class="carrito-contenido">

        <?php
            // Obtener productos del carrito
            $userId = $_SESSION['user_id'];
            $query = "SELECT carritos.*, productos.nombre, productos.precio, productos.imagen_url, productos.marca 
                  FROM carritos 
                  JOIN productos ON carritos.producto_id = productos.id 
                  WHERE carritos.usuario_id = $userId";
            $result = $conn->query($query);
        ?>

        <?php if ($result->num_rows > 0) { ?>
            
            <?php while ($row = $result->fetch_assoc()) { 
                
                
                $precioTotal = $row['precio'] * $row['cantidad'];

            ?>
            <a href="../php/producto.php?id=<?php echo $row['producto_id']; ?>">
                <div class="producto hiddenn">

                    <div class="imagen" style="background-image: url('./admin_folder/img_productos/<?php echo $row['imagen_url']; ?>');"></div>
                    <div class="info-producto">
                        <h2><?php echo $row['nombre']; ?></h2>
                        <p><?php echo $row['marca']; ?></p>
                        <h3>$<?php echo number_format($row['precio'], 0); ?></h3>
                    </div>

                    <div class="acciones">

                        
                        <form class="borrar" action="eliminar_carrito.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $row['producto_id']; ?>">
                            <button type="submit" style="background:none;border:none;cursor:pointer;">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </form>
                        
                        <form class="cantidad" method="post" style="display: flex; align-items: center;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            
                            <!-- Botón para reducir cantidad -->
                            <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown();"><i class="ri-subtract-line"></i></button>
                            
                            <!-- Input de cantidad -->
                            <input type="number" name="quantity" value="<?= $row['cantidad'] ?>" min="1" class="quantity-input">
                            
                            <!-- Botón para aumentar cantidad -->
                            <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp();"><i class="ri-add-line"></i></button>
                            
                        </form>
                    </div>

                    
                

                </div>
            </a>

            <?php } ?>

        <?php } else { ?>
            <div class="no-carrito hiddenn">
                <p>No tenés productos en tu carrito.</p>
            </div>
            
        <?php } ?>

        <?php
                    $total = 0;
                    $result->data_seek(0); // Reset result pointer to the beginning
                    while ($row = $result->fetch_assoc()) {
                    $total += $row['precio'] * $row['cantidad'];
                    }
        ?>

        

    </div>

    <div class="hiddenn resumen <?php echo ($total == 0) ? 'hidden' : ''; ?>">
        <span>Total:  $<?php echo number_format($total, 0); ?></span>
        <a href="pago.php">Proceder al pago</a>
    </div>

</section>
</main>

<?php include 'footer.php'; ?>

<script src="../js/carrito.js?v=<?php echo time(); ?>"></script>
</body>
</html>
