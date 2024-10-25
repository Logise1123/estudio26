<?php
$host = 'db5016547740.hosting-data.io';
$db = 'dbs13427913';
$user = 'dbu567193';
$pass = '${{secrets.pwd}}'; // Cambia a tu contraseña

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$accion = $_POST['accion'];

if ($accion == 'insertar') {
    $columna1 = $_POST['columna1'];
    $columna2 = $_POST['columna2'];
    $sql = "INSERT INTO tu_tabla (columna1, columna2) VALUES ('$columna1', '$columna2')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif ($accion == 'leer') {
    $sql = "SELECT * FROM tu_tabla";
    $result = $conn->query($sql);

    $datos = array();
    while ($fila = $result->fetch_assoc()) {
        $datos[] = $fila;
    }
    echo json_encode($datos);
}

$conn->close();
?>
