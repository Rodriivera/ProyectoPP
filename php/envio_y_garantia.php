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
    <link rel="stylesheet" href="../css/envio_y_garantia.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="envios_y_garantias">

    <h1>Envíos y Garantía</h1>

    <div class="envios">

        <h2>Envíos</h2>
        <ul>
            <li><span>Envío Gratis:</span> Disfrutá de envío gratuito en todas tus compras superiores a $10,000.</li>
            <li><span>Tiempo de entrega:</span> Los tiempos de entrega varían dependiendo de la ubicación, pero normalmente oscilan entre 3 y 7 días hábiles.</li>
            <li><span>Rastreo de pedidos:</span> Recibirás un número de seguimiento por correo electrónico una vez que tu pedido haya sido enviado.</li>
        </ul>
    </div>

    <div class="garantia">
        <h2>Garantía</h2>
        <ul>
            <li><span>Garantía de 14 días:</span> Si tu producto presenta fallos de fabricación, tenés 14 días desde la recepción del pedido para solicitar un cambio o devolución.</li>
            <li><span>Condiciones de garantía:</span> Solo aplicable a defectos de fábrica. No cubre daños causados por el mal uso del producto.</li>
            <li><span>Proceso de devolución:</span> Si necesitás hacer uso de la garantía, ponete en contacto con nuestro equipo de atención al cliente y te guiaremos a través del proceso.</li>
        </ul>
    </div>

</section>



</main>

<?php include 'footer.php'; ?>


</body>
</html>