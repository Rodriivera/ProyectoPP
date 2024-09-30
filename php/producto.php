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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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

        <div class="producto-imagen" style=" background-image: url('./admin_folder/img_productos/<?php echo $imagen; ?>');"></div>

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
            <form class="cantidadycarrito" action="agregar_carrito.php" method="post"  onsubmit="this.querySelector('input[name=hidden_quantity]').value = this.querySelector('input[name=visible_quantity]').value;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="hidden_quantity" value="1"> <!-- Input oculto para la cantidad -->

                <div class="cantidad">

                    <!-- Botón para reducir cantidad -->
                    <button type="button" class="btn" onclick="let qtyInput = this.parentNode.querySelector('input[name=visible_quantity]'); if (qtyInput.value > 1) qtyInput.stepDown();"><i class="ri-subtract-line"></i></button>
                    
                    <!-- Input visible de cantidad -->
                    <input type="number" name="visible_quantity" value="1" min="1" max="<?php echo $stock; ?>" class="quantity-input">
                    
                    <!-- Botón para aumentar cantidad -->
                    <button type="button" class="btn" onclick="this.parentNode.querySelector('input[name=visible_quantity]').stepUp();"><i class="ri-add-line"></i></button>

                </div>

                <!-- Botón para añadir al carrito -->
                <button type="submit" class="botones añadir-al-carrito">
                    <i class="ri-shopping-cart-2-line"></i>Añadir al carrito
                </button>
            </form>




        <?php
        } else { // Si la sesión no está iniciada, redirigir al login
        ?>

            <form class="cantidadycarrito" action="login-register.php" method="post"  onsubmit="this.querySelector('input[name=hidden_quantity]').value = this.querySelector('input[name=visible_quantity]').value;">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="hidden_quantity" value="1"> <!-- Input oculto para la cantidad -->

                <div class="cantidad">

                    <!-- Botón para reducir cantidad -->
                    <button type="button" class="btn" onclick="let qtyInputt = this.parentNode.querySelector('input[name=visible_quantity]'); if (qtyInputt.value > 1) qtyInputt.stepDown();"><i class="ri-subtract-line"></i></button>
                    
                    <!-- Input visible de cantidad -->
                    <input type="number" name="visible_quantity" value="1" min="1" max="<?php echo $stock; ?>" class="quantity-input">
                    
                    <!-- Botón para aumentar cantidad -->
                    <button type="button" class="btn" onclick="this.parentNode.querySelector('input[name=visible_quantity]').stepUp();"><i class="ri-add-line"></i></button>

                </div>

                <!-- Botón para añadir al carrito -->
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
        <form action="agregar_favoritos.php" method="post">
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

    <section class="slider">
        <span>Productos relacionados</span>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    $sql = "SELECT * FROM productos WHERE categoria = '$categoria' ORDER BY RAND()";
                    $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) {
                        $name = $row['nombre'];
                        $brand = $row['marca'];
                        $price = $row['precio'];
                        $image = $row['imagen_url'];
                ?>
                <div class="swiper-slide">
                    <a href="producto.php?id=<?php echo $row['id']; ?>">
                        
                            <div class="imagen" style="background-image: url('./admin_folder/img_productos/<?php echo $image; ?>');"></div>
                            <div class="info">
                                <h2 title="<?php echo $name; ?>"><?php echo $name; ?></h2>
                                <p><?php echo $brand; ?></p>
                                <h3 class="price">$<?php echo number_format($price, 0); ?></h3>
                            </div>
                        
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


    </section>


    








</main>

<?php include 'footer.php';?>

<script src="../js/producto.js?v=<?php echo time();?>"></script>



</body>

</html>