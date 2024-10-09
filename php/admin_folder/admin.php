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
        <div class="container_graficos">
            <canvas class="canvas_bar" id="myChart"></canvas>
        </div>
    </section>


   


 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../js/chart.js?v=<?php echo time(); ?>"></script>
</body>
</html>