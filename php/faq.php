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
    <link rel="stylesheet" href="../css/faq.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="faq">

    <h1>Preguntas Frecuentes (FAQ)</h1>

    <div class="preguntas">
        <h2>¿Cómo puedo realizar una compra en su tienda?</h2>
        <p>Para realizar una compra, simplemente seleccioná los productos que quieras, agrégalos a tu carrito de compras y seguí los pasos para finalizar el pedido.</p>

        <h2>¿Cuáles son los métodos de pago disponibles?</h2>
        <p>Aceptamos varios métodos de pago, incluyendo tarjetas de crédito, débito y opciones de pago online, dependiendo de tu región.</p>

        <h2>¿Ofrecen envío gratuito?</h2>
        <p>Sí, ofrecemos envío gratuito en todas las compras superiores a $50,000. Para compras por debajo de ese monto, el costo de envío dependerá de tu ubicación y será calculado al finalizar la compra.</p>

        <h2>¿Cuánto tarda en llegar mi pedido?</h2>
        <p>Los tiempos de entrega varían según la ubicación. Generalmente, los envíos nacionales tardan entre 3 a 7 días hábiles. Recibirás un número de seguimiento una vez que tu pedido haya sido enviado.</p>

        <h2>¿Puedo rastrear mi pedido?</h2>
        <p>Sí, una vez que tu pedido ha sido enviado, recibirás un correo electrónico con un número de seguimiento y el enlace para rastrear tu envio en tiempo real.</p>

        <h2>¿Cómo puedo devolver un producto?</h2>
        <p>Si deseas devolver un producto, por favor ponete en contacto con nuestro equipo de atención al cliente dentro de los 14 días posteriores a la recepción del pedido. Te proporcionaremos las instrucciones para completar la devolución.</p>

        <h2>¿Qué hago si recibí un producto defectuoso?</h2>
        <p>Si el producto presenta un defecto de fabricación, contactános dentro de los 14 días de haber recibido el artículo para solicitar un reemplazo o reembolso. Asegúrate de enviarnos fotos y detalles del problema.</p>

        <h2>¿Puedo modificar o cancelar mi pedido?</h2>
        <p>Puedes modificar o cancelar tu pedido si todavia no fue enviado. Ponete en contacto con nuestro equipo de atención al cliente lo antes posible para gestionar la solicitud.</p>
        
        <h2>¿Cómo puedo comunicarme con ustedes?</h2>
        <p>Podes ponerte en contacto con nuestro equipo de atención al cliente enviando un correo a aromas@aromas.com o llamando al 44228085. Nuestro horario de atención es de lunes a viernes, de 9:00 a 18:00</p>

        
    </div>

    

</section>



</main>

<?php include 'footer.php'; ?>


</body>
</html>

