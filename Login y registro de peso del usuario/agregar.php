 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control";
$rut = $_POST['run'];
$nombre = $_POST['name'];
$correo = $_POST['email'];
$contraseña = $_POST['password'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuario (rut, nombre, correo, contrasena) VALUES ('$rut','$nombre','$correo','$contraseña');";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>