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
    <link rel="stylesheet" href="../css/terminos.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>

<section class="terminos">

    <h1>Términos y Condiciones</h1>

    <div class="generalidades">
        <h2>Generalidades</h2>
        <p>Al acceder y realizar compras en nuestro sitio web, aceptas los siguientes términos y condiciones. Nos reservamos el derecho de modificar estos términos en cualquier momento sin previo aviso. Es responsabilidad del usuario revisar esta página regularmente para estar al tanto de los cambios.</p>
    </div>

    <div class="condiciones">
        <h2>Condiciones de Compra</h2>
        <ul>
            <li><span>Disponibilidad de productos:</span> Todos los productos están sujetos a disponibilidad. Nos reservamos el derecho de cancelar cualquier pedido si el producto no está disponible.</li>
            <li><span>Precios:</span> Los precios en el sitio están indicados en moneda local y pueden estar sujetos a cambios sin previo aviso. El precio que aplicará será el vigente al momento de realizar la compra.</li>
            <li><span>Pago:</span> Aceptamos varios métodos de pago, incluyendo tarjetas de crédito, débito y opciones de pago online. Todos los pagos se procesan de manera segura.</li>
        </ul>
    </div>

    <div class="privacidad">
        <h2>Privacidad</h2>
        <ul>
            <li><span>Información Personal:</span> Toda la información personal que recopilamos está protegida y se utilizará únicamente para procesar tus pedidos, mejorar tu experiencia de compra y mantenerte informado sobre nuestras promociones. Para más detalles, revisa nuestra [Política de Privacidad].</li>
        </ul>
    </div>

    <div class="Propiedad_intelectual">
        <h2>Propiedad Intelectual</h2>
        <p>Todos los derechos de propiedad intelectual en el sitio web, incluidos los textos, imágenes, logotipos, gráficos, y diseños, pertenecen a nuestra empresa o a los titulares de licencia correspondientes. Está prohibido el uso no autorizado de cualquiera de estos elementos.</p>
    </div>

    <div class="Contacto">
        <h2>Contacto</h2>
        <p>Si tenés alguna duda respecto a nuestros términos y condiciones, no dudes en ponerte en contacto con nuestro equipo de atención al cliente a través de nuestro correo electrónico aromas@aromas.com o llamando al 44228085.</p>
    </div>

</section>



</main>

<?php include 'footer.php'; ?>


</body>
</html>