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

        <h1>Completar la compra</h1>

        <div class="tarjetas">

            <div class="resumen tarjeta">

                <div class="tarjeta-texto">
                    <h2>Resumen de la compra</h2>
                    <p>Revisa los productos antes de pagar</p>
                </div>

                <div class="tabla_container">
                    <table class="resumen_tabla">
                        <thead>
                            <tr>
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
                                $total = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $total += $row['precio'] * $row['cantidad'];
                                }
                            ?>
                            <tr>
                                <td>Total:</td>
                                <td></td>
                                <td>$<?php echo number_format($total, 0); ?></td>
                            </tr>
                        </tfoot>

                
                    </table>
                </div>


            </div>


            <div class="forma_pago tarjeta">

                <div class="tarjeta-texto">
                    <h2>Detalles del pago</h2>
                    <p>Ingrese los datos del pago</p>
                </div>
                
                <div class="form_container">

                    <form action="agregar_pedido.php" method="POST">

                                <div class="labels-inputs">
                                    <label for="numero-tarjeta">Numero de la tarjeta</label>
                                    <input id="numero-tarjeta" type="text" required minlength="19" maxlength="19" placeholder=" 1234-5678-9012-3456" oninput="formatCardNumber(this)" pattern="\d{4}-\d{4}-\d{4}-\d{4}">

                                </div>

                                <div class="fecha-ccv">

                                    <div class="labels-inputs">
                                        <label for="fecha-vencimiento">Fecha de vencimiento</label>
                                        <input id="fecha-vencimiento" type="text" required minlength="5" maxlength="5" placeholder="MM/AA" oninput="formatExpirationDate(this)" pattern="0[1-9]|1[0-2]/(2[0-9]|3[0-9])">
                                    </div>

                                    <div class="labels-inputs">
                                        <label for="ccv">CCV</label>
                                        <input id="ccv" type="text" maxlength="3" required placeholder="123" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,3)">
                                    </div>

                                </div>

                                <div class="labels-inputs">
                                    <label for="nombre-titular">Nombre del titular</label>
                                    <input id="nombre-titular" type="text" required placeholder="Julio César Falcioni Capdevila" oninput="onlyText(this)">
                                </div>

                                <button type="submit"><i class="ri-bank-card-line"></i>Pagar $<?php echo number_format($total, 0); ?></button>

                    </form>
                </div>

            </div>

        </div>

    </section>




</main>

<?php include 'footer.php'; ?>

<script src="../js/pago.js?v=<?php echo time(); ?>"></script>

</body>

</html>