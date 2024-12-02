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
    <link rel="stylesheet" href="../css/pago.css?v=<?php echo time(); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Aromas</title>
</head>

<body>

<?php include 'header.php'; ?>

<main>




    <section class="pago_container">

        <h1 class="hidden">Completar la compra</h1>

        

        <div class="resumen tarjeta hidden">

                <div class="tarjeta-texto">
                    <h2>Resumen de la compra</h2>
                    <p>Revisa los productos antes de pagar</p>
                </div>

                <div class="tabla_container">
                    <table class="resumen_tabla">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                // Obtener productos del carrito
                                $userId = $_SESSION['user_id'];
                                $query = "SELECT carritos.*, productos.nombre, productos.precio, productos.imagen_url, productos.marca 
                                    FROM carritos 
                                    JOIN productos ON carritos.producto_id = productos.id 
                                    WHERE carritos.usuario_id = $userId";
                                $result = $conn->query($query);

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    ?>
                                    <td><div class='imagen' style='background-image: url("./admin_folder/img_productos/<?php echo $row['imagen_url']; ?>");'></div></td>
                                    <?php
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['cantidad'] . "</td>";
                                    echo "<td>$" . number_format($row['precio'], 0) . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>

                        <tfoot>
                            <?php

                                $result->data_seek(0); // Reset result pointer to the beginning
                                $subtotal = 0;
                                $total = 0;

                                $envio = 0;

                                $queryconf = "SELECT * FROM configuraciones WHERE clave = 'valor-envio'";
                                $resultconf = $conn->query($queryconf);
                                $envio = (float)$resultconf->fetch_assoc()['valor'];



                                while ($row = $result->fetch_assoc()) {
                                    $subtotal += $row['precio'] * $row['cantidad'];
                                }
                                if ($subtotal >= 50000) {
                                    $envio = 0;
                                }
                                $total = $subtotal + $envio;
                            ?>
                            <tr>
                                <td>Subtotal:</td>
                                <td></td>
                                <td></td>
                                <td>$<?php echo number_format($subtotal, 0); ?></td>
                            </tr>
                            <tr>
                                <td>Envio:</td>
                                <td></td>
                                <td></td>
                                <td>$<?php echo number_format($envio, 0); ?></td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td></td>
                                <td></td>
                                <td>$<?php echo number_format($total, 0); ?></td>
                            </tr>
                        </tfoot>

                
                    </table>
                </div>


        </div>


        <form class="tarjetas" action="compra_exitosa.php" method="POST"> 

            <div class="forma_pago tarjeta hidden">

                <div class="tarjeta-texto">
                    <h2>Detalles del pago</h2>
                    <p>Ingrese los datos del pago</p>
                </div>
                
                <div class="form_container">
                    <?php
                        // Obtener datos del usuario
                        $userId = $_SESSION['user_id'];
                        $query = "SELECT * FROM usuarios WHERE id = $userId";
                        $result = $conn->query($query);
                        $user = $result->fetch_assoc();
                    ?>

                    

                                <div class="labels-inputs">
                                    <label for="numero-tarjeta">Numero de la tarjeta</label>
                                    <input id="numero-tarjeta" type="text" required minlength="19" maxlength="19" placeholder=" 1234-5678-9012-3456" oninput="formatCardNumber(this)" pattern="\d{4}-\d{4}-\d{4}-\d{4}">

                                </div>

                                

                                    <div class="labels-inputs">
                                        <label for="fecha-vencimiento">Fecha de vencimiento</label>
                                        <input id="fecha-vencimiento" type="text" required minlength="5" maxlength="5" placeholder="MM/AA" oninput="formatExpirationDate(this)" pattern="0[1-9]|1[0-2]/(2[0-9]|3[0-9])">
                                    </div>

                                    <div class="labels-inputs">
                                        <label for="ccv">CCV</label>
                                        <input id="ccv" type="text" minlength="3" maxlength="3" required placeholder="123" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,3)">
                                    </div>

                                

                                <div class="labels-inputs">
                                    <label for="nombre-titular">Titular de la tarjeta</label>
                                    <input id="nombre-titular" type="text" required placeholder="Julio César Falcioni Capdevila" oninput="onlyText(this)">
                                </div>

                                

                                

                    
                </div>

            </div>

            <div class="envio tarjeta hidden">

                <div class="tarjeta-texto">
                    <h2>Detalles del envio</h2>
                    <p>Ingrese los datos del envio</p>
                </div>

                <div class="envio-container">

                    <div class="fecha-ccv">

                        <div class="labels-inputs">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" required value="<?php echo $user['nombre']; ?>" placeholder="Julio César" oninput="onlyText(this)">
                        </div>

                        <div class="labels-inputs">
                            <label for="apellido">Apellido</label>
                            <input id="apellido" type="text" required value="<?php echo $user['apellido']; ?>" placeholder="Falcioni Capdevila" oninput="onlyText(this)">
                        </div>

                    </div>



                    <div class="fecha-ccv">
                        <div class="labels-inputs">
                            <label for="email">Email</label>
                            <input id="email" type="email" required value="<?php echo $user['email']; ?>" placeholder="nombre@dominio.com" oninput="onlyText(this)">
                        </div>

                        <div class="labels-inputs">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" type="number" required value="<?php echo $user['telefono']; ?>" placeholder="1234567890" oninput="onlyNumber(this)">
                        </div>
                    </div>

                    <div class="fecha-ccv">

                        <div class="labels-inputs">
                            <label for="direccion">Direccion</label>
                            <input id="direccion" type="text" required value="<?php echo $user['direccion']; ?>" placeholder="Calle 123">
                        </div>
                        
                        <div class="labels-inputs">
                            <label for="dni">DNI</label>
                            <input id="dni" type="number" required value="<?php echo $user['dni']; ?>" placeholder="12345678" oninput="onlyNumber(this)">
                        </div>

                    </div>

                    <div class="fecha-ccv">

                        <div class="labels-inputs">
                            <label for="ciudad">Ciudad</label>
                            <input id="ciudad" type="text" required value="<?php echo $user['ciudad']; ?>" placeholder="Ciudad" oninput="onlyText(this)">
                        </div>

                        <div class="labels-inputs">
                            <label for="codigo-postal">Codigo postal</label>
                            <input id="codigo-postal" type="number" required value="<?php echo $user['codigo_postal']; ?>" placeholder="12345" oninput="onlyNumber(this)">
                        </div>

                    </div>

                </div>

            </div>


            <input type="hidden" name="total" value="<?php echo $total; ?>">
            <input type="hidden" name="envio" value="<?php echo $envio; ?>">
            <div class="botones hidden">
                <button type="button" onclick="window.location.href='carrito.php'"><i class="ri-close-circle-line"></i>Cancelar compra</button>
                <button type="submit"><i class="ri-bank-card-line"></i>Pagar $<?php echo number_format($total, 0); ?></button>
            </div>
           

        </form>

    </section>




</main>

<?php include 'footer.php'; ?>

<script src="../js/pago.js?v=<?php echo time(); ?>"></script>

</body>

</html>

