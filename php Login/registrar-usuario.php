<?php

$host_db = "localhost";
$user_db = "usuarios";
$password_db = "n0IHu9Ef0acPgpUx";
$database_name = "usuarios";
$table_name = "registros";

$form_pass = $_POST['password'];

$hash = password_hash($form_pass, PASSWORD_BCRYPT); 

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 

    if ($conexion->connect_error)  
    {
        die("La conexión ha fallado: " . $conexion->connect_error);
    }


$buscarUsuario = "SELECT * FROM $tbl_name WHERE nombre_usuario = '$_POST[username]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {

 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";


 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";

 }

 else{

 $query = "INSERT INTO Usuarios (nombre_usuario, password)

           VALUES ('$_POST[username]', '$hash')";

 

 if ($conexion->query($query) === TRUE) {

  

 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";

 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";

 echo "<h5>" . "Realizar Login: " . "<a href='login.html'>Login</a>" . "</h5>"; 

 }

 

 else {

 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 

   }

 }

 mysqli_close($conexion);

?>

?>