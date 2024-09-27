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
    <link rel="stylesheet" href="../css/producto.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>


<section class="producto">

        
        <?php
                
                
                $id = $_GET['id'];

                $query = "SELECT * FROM productos WHERE id = $id";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $nombre = $row['nombre'];
                $marca = $row['marca'];
                $imagen = $row['imagen_url'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $stock = $row['stock'];
                $categoria = $row['categoria'];

                
        ?>


    <div class="producto-container">

        <div class="producto-imagen" style=" background-image: url('<?php echo $imagen; ?>');"></div>

        <div class="producto-texto-botones">
            <div class="producto-texto">

                <div class="producto-redireccion">
                    <a href="../php/index.php">Inicio</a><span> / </span><a href="busqueda.php?category=<?php echo $categoria; ?>""><?php echo $categoria; ?></a><span> / </span><a href=""><?php echo $nombre; ?></a>
                </div>

                <h1><?php echo $nombre; ?></h1>
                <p class="marca"><?php echo $marca;?></p>
                <h2 class="precio">$<?php echo number_format($precio, 0); ?></h2>
                
    </div>

    <div class="producto-botones">
    <?php
    

    if ($stock > 0) {

        // Verificar si la sesión está iniciada
        if (isset($_SESSION['user_id'])) { 
        ?>
            <form class="cantidad" method="post" style="display: flex; align-items: center;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                
                <!-- Botón para reducir cantidad -->
                <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown();"><i class="ri-subtract-line"></i></button>
                
                <!-- Input de cantidad -->
                <input type="number" name="quantity" value="1" min="1" max="<?php echo $stock; ?>" class="quantity-input">
                
                <!-- Botón para aumentar cantidad -->
                <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp();"><i class="ri-add-line"></i></button>
            </form>

            <form action="carrito.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="botones añadir-al-carrito">
                    <i class="ri-shopping-cart-2-line"></i>Añadir al carrito
                </button>
            </form>
        <?php
        } else { // Si la sesión no está iniciada, redirigir al login
        ?>

            <form class="cantidad" method="post" style="display: flex; align-items: center;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                
                <!-- Botón para reducir cantidad -->
                <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepDown();"><i class="ri-subtract-line"></i></button>
                
                <!-- Input de cantidad -->
                <input type="number" name="quantity" value="1" min="1" max="<?php echo $stock; ?>" class="quantity-input">
                
                <!-- Botón para aumentar cantidad -->
                <button type="submit" name="update_quantity" class="btn" onclick="this.parentNode.querySelector('input[name=quantity]').stepUp();"><i class="ri-add-line"></i></button>
            </form>
            
            <form action="login-register.php" method="GET">
                <button type="submit" class="botones añadir-al-carrito">
                    <i class="ri-shopping-cart-2-line"></i>Añadir al carrito
                </button>
            </form>
        <?php
        }
    } else {
        echo "<p>No hay stock disponible</p>";
    }

    // Verificar si la sesión está iniciada antes de añadir a favoritos
    if (isset($_SESSION['user_id'])) {
    ?>
        <form action="agregar_favoritos.php" method="GET">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="botones añadir-a-favoritos">
                <i class="ri-heart-3-line"></i>Añadir a favoritos
            </button>
        </form>
    <?php
    } else {
    ?>
        <form action="login-register.php" method="GET">
            <button type="submit" class="botones añadir-a-favoritos">
                <i class="ri-heart-3-line"></i>Añadir a favoritos
            </button>
        </form>
    <?php
    }
    ?>
</div>

        

        </div>

    </div>   
    
    <div class="linea"></div>

    <div class="producto-descripcion">

            <div class="descripcion">
                <h2>Descripción del producto</h2>
                <p><?php echo $descripcion; ?></p>
            </div>





    </div>
    
    <div class="linea"></div>


    





</section>


</main>

<?php include 'footer.php';?>

<script src="../js/cuenta.js"></script>
    
</body>

</html>