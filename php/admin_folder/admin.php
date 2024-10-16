<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/admin_style/admin.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Aromas</title>
</head>
<body>


    <aside>
        <div class="container-admin">
        <a href="../index.php" class="logo"><img src="../../media/Aromas_sf.png" alt="" width="175px"></a>
            <div class="container-lista-admin">
                <ul class="menu">
                    <li class="active"><span id="active" >Estadisticas</span></li>
                    <li><a href="inventario_admin.php"><span>Inventario</span></a></li>
                    <li><a href="publicar_admin.php"><span>Publicar</span></a></li>
                    <li><a href="mensaje_admin.php"><span>Mensajes</span></a></li>
                </ul>
        </div>
    </aside>
        
    
  





    <section class="content">

        <div class="sellcards">
            <div class="card" id="best_product" style="background-color: rgba(255, 99, 132, 0.3) ">
                <h2>Producto mas vendido</h2>
                <div class="container_datos">
                    <span class="dato">Armani Code</span>
                    <p><i class="fa-solid fa-arrow-trend-up"></i>$1,000.00</p>
                </div>  
                <i class="fa-solid fa-thumbs-up"></i>
            </div>
            <div class="card" id="best_category" style="background-color: rgba(54, 162, 235, 0.3)">
                <h2>Categoria mas vendida</h2>
                <div class="container_datos">
                    <span class="dato">Perfumeria</span>
                    <p><i class="fa-solid fa-arrow-trend-up"></i>$1,000.00</p>
                </div>
                <i class="fa-solid fa-icons"></i>
            </div>
            <div class="card" id="total_sell" style="background-color: rgba(201, 33, 807, 0.3)">
                <h2>Total ventas</h2>
                <div class="container_datos">
                    <span class="dato">$100,000.00</span>
                </div>
                <i class="fa-solid fa-box-archive"></i>
            </div>
            <div class="card" id="total_product" style="background-color: rgba(75, 192, 192, 0.3)">
                <h2>Total de productos</h2>
                <div class="container_datos">
                    <span class="dato">100,000</span>
                    <p></p>
                </div>
                <i class="fa-solid fa-cubes-stacked"></i>
            </div>
        </div>

        <div class="container_graficos">
            <div class="graficos">
                <span>Ventas</span>
                <canvas class="canvas_bar" id="myChart"></canvas>
            </div>
            <div class="graficos">
                <span>Categorias</span>
                <canvas class="canvas_pie" id="pie-chart"></canvas>
            </div>
        </div>
    </section>


   


 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/chart.js?v=<?php echo time(); ?>"></script>
    <script src="../../js/chartpie.js?v=<?php echo time(); ?>"></script>
</body>
</html>