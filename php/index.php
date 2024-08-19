<?php
        include 'db.php';

        // Primera consulta
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/index.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>
<body>
    
    <header>
        <a href="#" class="logo"><img src="../media/Aromas_sf.png" alt="" width="175px"></a>

        <form class="search-container" action="busqueda.php" method="POST">
            
                <input type="text" placeholder="Buscar">
                <button type="submit"><i class="ri-search-line"></i></button>
            
        </form>

        <nav>
            <ul>
                <li><i class="ri-heart-3-line"></i></li>
                <li><i class="ri-shopping-bag-4-line"></i></li>
                <li><i class="ri-user-3-line"></i></li>
                
            </ul>
        </nav>
    </header>



    <main>
        
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item"><img src="../media/chanel_3_1920x480_1.jpg" alt="Image 1"></div>
            <div class="carousel-item"><img src="../media/notas.jpg" alt="Image 2"></div>
            <div class="carousel-item"><img src="../media/vita_hero-parfum-cps-solo_1200x300.webp" alt="Image 3"></div>
        </div>
    </div>
        


    <div class="carousel-container">
        <div class="product-carousel">
            <?php foreach ($result as $product): 
                echo '<div class="product-card">';
                        echo '<a href="producto.php?id=' . htmlspecialchars($product["id"]) . '">';
                        echo '<div class="product-image" style="background-image: url(' . htmlspecialchars($product["imagen"]) . ');"></div>';
                        echo '<div class="product-info">';
                        echo '<h3>' . htmlspecialchars($product["nombre"]) . '</h3>';
                        echo '<p class="autor">De '. htmlspecialchars($product["autor"]) . '</p>';
                        // echo '<p>Para ' . htmlspecialchars($row["genero"]) . '</p>';
                        echo '<p class="price">$' . number_format($product["precio"], 0) . '</p>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
             endforeach; ?>
        </div>
        <button class="prev"><i class="ri-arrow-left-s-line"></i></button>
        <button class="next"><i class="ri-arrow-right-s-line"></i></button>
    </div>

   


    </main>



    <footer>

    </footer>



    <script src="../js/index.js?v=<?php echo time(); ?>"></script>
</body>
</html>