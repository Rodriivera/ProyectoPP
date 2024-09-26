<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/Aromas.png" type="image/x-icon">
    <link rel="stylesheet" href="../../css/admin_style/mensaje_admin.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <title>Aromas</title>
</head>
<body>




    <section id="aside">
        
        <div class="container-admin">
            <a href="../index.php" class="logo"><img src="../../media/Aromas_sf.png" alt="" width="175px"></a>
    
            <ul class="menu">
            
                <li><a href="estadisticas_admin.php"><span onclick="showSection('estadisticas-section')">Estadisticas</span></a></li>
                <li><a href="inventario_admin.php"><span onclick="showSection('inventario-section')">Inventario</span></a></li>
                <li><a href="publicar_admin.php"><span onclick="showSection('publicar-section')">Publicar</span></a></li>
                <li class="active"><span onclick="showSection('mensaje-section')">Mensajes</span></li>
            </ul>
        </div>
    </section>
    
</body>
</html>