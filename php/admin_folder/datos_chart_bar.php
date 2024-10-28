<?php
    include '../db.php';
    header('Content-Type: application/json');

    $sql = "SELECT DATE_FORMAT(fecha, '%Y-%m') AS mes,SUM(precio * cantidad) AS total_ingresos
        FROM ventas
        GROUP BY mes
        ORDER BY mes ASC";
    $result = $conn->query($sql);

    $data = [
        'labels' => [],
        'data' => []
    ];
    // Verifica si hay resultados en la consulta.
    if ($result->num_rows > 0) {
        // Si hay resultados, recorre cada fila del resultado.
        while ($row = $result->fetch_assoc()) {
            // Agrega la categoría al arreglo de etiquetas.
            $data['labels'][] = $row['mes'];
            // Agrega el total vendido al arreglo de datos.
            $data['data'][] = $row['total_ingresos'];
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