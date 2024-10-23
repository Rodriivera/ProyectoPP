<?php
        include 'db.php';

        

        session_start();

        // // Obtener información del usuario logeado, si lo hay
        // $user_id = $_SESSION['user_id'];
        // $user_email = $_SESSION['user_email'];
        // $user_is_admin = false;

        
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<body>
    


    <?php include 'header.php'; ?>


<main>

        
    <section class="ads">
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item"><img src="../media/chanel_3_1920x480_1.jpg" alt="Image 1"></div>
                <div class="carousel-item"><img src="../media/notas.jpg" alt="Image 2"></div>
                <div class="carousel-item"><img src="../media/vita_hero-parfum-cps-solo_1200x300.webp" alt="Image 3"></div>
            </div>
        </div>
    </section>
        
    
    
    <section class="categorias">

        <h2>Nuestras categorias</h2>

        <div class="categorias-container">
            <div class="categoria-separada">
                <a href="busqueda.php?category=fragancias">
                    <div class="categoria-foto">
                        <img src="../media/perfume.png" 
                        alt="logo Fragancias">
                    </div>
                </a>
                <p>Fragancias</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=maquillajes">
                    <div class="categoria-foto">
                        <img src="../media/maquillaje.png"
                        alt="logo maquillajes">
                    </div>
                 </a>
                <p>Maquillajes</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=faciales">
                    <div class="categoria-foto">
                        <img src="../media/tratamiento-facial.png"
                        alt="logo faciales">
                    </div>
                 </a>
                <p>Faciales</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=capilares">
                    <div class="categoria-foto">
                        <img src="../media/tratamiento-capilar.png"
                        alt="logo capilares">
                    </div>
                 </a>
                <p>Capilares</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=personales">
                    <div class="categoria-foto">
                        <img src="../media/articulos-de-aseo.png"
                        alt="logo personales">
                    </div>
                 </a>
                <p>Personales</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=regaleria">
                    <div class="categoria-foto">
                        <img src="../media/regalos.png"
                        alt="logo regaleria">
                    </div>
                 </a>
                <p>Regalería</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=hogar">
                    <div class="categoria-foto">
                        <img src="../media/bateria-de-cocina.png"
                        alt="logo hogar">
                    </div>
                 </a>
                <p>Hogar</p>
            </div>
            <div class="categoria-separada">
                <a href="busqueda.php?category=accesorios">
                    <div class="categoria-foto">
                        <img src="../media/accesorios.png"
                        alt="logo accesorios">
                    </div>
                 </a>
                <p>Accesorios</p>
            </div>


        </div>


    </section>



    <section class="slider">
        <span>Productos relacionados</span>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php
                    $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT 10";
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
            <div class="swiper-button-next arrows"></div>
            <div class="swiper-button-prev arrows"></div>
        </div>


    </section>

    
    <section class="prestaciones">

        <div class="prestaciones-container">

            <div class="prestacion-separada" id="envio">
                <div class="prestacion-foto">
                    <img src="../media/enviado.png"
                    alt="logo envio">
                </div>
                <div class="prestacion-texto">
                <h3>Envio gratis</h3>
                <p>En compras superiores a $10.000</p>
                </div>
            </div>

            <div class="prestacion-separada" id="reembolso">
                <div class="prestacion-foto">
                    <img src="../media/reembolso2.png"
                    alt="logo reembolso">
                </div>
                <div class="prestacion-texto">
                <h3>14 dias de garantia</h3>
                <p>Por fallo de fabricacion</p>
                </div>
            </div>

            <div class="prestacion-separada" id="seguro">
                <div class="prestacion-foto">
                    <img src="../media/pago-seguro2+.png"
                    alt="logo seguro">
                </div>
                <div class="prestacion-texto">
                <h3>Pago seguro</h3>
                <p>Pagos 100% seguros</p>
                </div>
            </div>

            <div class="prestacion-separada" id="soporte">
                <div class="prestacion-foto">
                    <img src="../media/centro-de-llamadas.png"
                    alt="logo soporte">
                </div>
                <div class="prestacion-texto">
                <h3>Soporte 24/7</h3>
                <p>Soporte personalizado</p>
                </div>
            </div>

        </div>


    </section>







   


</main>


    <?php include 'footer.php'; ?>



    <script src="../js/index.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>