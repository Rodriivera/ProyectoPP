<?php 

    include '../db.php';
    header('Content-Type: application/json');

    $sql = "SELECT categoria, SUM(precio * cantidad) AS total_vendido
    FROM ventas
    GROUP BY categoria;";
    $result = $conn->query($sql);



    // Prepara un arreglo para almacenar las etiquetas (categorías) y los datos (totales vendidos).
    $data = [
        'labels' => [],
        'data' => []
    ];

    // Verifica si hay resultados en la consulta.
    if ($result->num_rows > 0) {
        // Si hay resultados, recorre cada fila del resultado.
        while ($row = $result->fetch_assoc()) {
            // Agrega la categoría al arreglo de etiquetas.
            $data['labels'][] = $row['categoria'];
            // Agrega el total vendido al arreglo de datos.
            $data['data'][] = $row['total_vendido'];
        }
    }

    if (!$result) {
        // Si la consulta falla, devuelve un mensaje de error como JSON.
        die(json_encode(['error' => "Error en la consulta: " . $conn->error]));
    }

    // Cierra la conexión a la base de datos.
    $conn->close();

    // Devuelve los datos en formato JSON.
    echo json_encode($data);
    ?>
