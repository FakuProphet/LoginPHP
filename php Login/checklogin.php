<?php
session_start();
?>
 
<?php

 
$host_db = "localhost";
$user_db = "Facundo";
$password_db = "n0IHu9Ef0acPgpUx";
$database_name = "usuarios";
$table_name = "registros";

 
$conexion = new mysqli($host_db, $user_db, $password_db, $database_name);
 

if ($conexion->connect_error) {

 die("La conexion falló: " . $conexion->connect_error);

}

 
$username = $_POST['username'];
$password = $_POST['password'];
  
$sql = "SELECT * FROM $table_name WHERE nombre_usuario = '$username'";

 

$result = $conexion->query($sql);

if ($result->num_rows > 0) {     
    $row = $result->fetch_array(MYSQLI_ASSOC);
 }

 
/*
La función password_verify();  descifra el hash 
en la base de datos y realiza la comparación con el password ingresado 
en el formulario y verifica que sean iguales a los registrados en la BBDD.  
*/
 if (password_verify($password, $row['pass'])) { 

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);/* 5 minutos */

  echo "Bienvenido! " . $_SESSION['username'];
  echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 


 } else { 

 echo "Username o Password estan incorrectos.";
 echo "<br><a href='login.html'>Volver a Intentarlo</a>";

 }

 mysqli_close($conexion); 

 ?>