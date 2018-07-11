<?php
session_start(); // inicio sesiones.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control";
$fecha = $_POST['date'];
$peso = $_POST['ps'];
$correo1 = $_SESSION['usuario'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO peso ( correo, peso, fecha) VALUES ('$correo1','$peso', '$fecha');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>