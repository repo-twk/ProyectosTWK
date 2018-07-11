<?php
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "control";
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
     // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['correo'];
  $password = $_POST['password'];
   
  // Consulta segura para evitar inyecciones SQL.
  $sql = "SELECT * FROM usuario WHERE correo = '$email'";
  $resultado = $conn->query($sql);

  
  if($row = mysqli_fetch_array($resultado)){

  if($row['contrasena'] == $password){

    session_start();
    $_SESSION['usuario'] = $email;
    header("location: inicio.html");
  }else{
    header("location: ../trabajo/index.html");
    exit();
  }
}else{
  header("location: ../trabajo/index.html");
}


 ?>