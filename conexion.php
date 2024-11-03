<?php
    
    // conexion a base de datos
$servidor = "localhost";
$usuario = "root";
$contraseña = ""; 
$base_datos = "empresa" ;

$conexion =  mysqli_connect("$servidor","$usuario","$contraseña","$base_datos");

if($conexion->connect_error)
{
    die("Conexion fallida". $conexion_connect_error());
}
else
{
    // echo"Conexion exitosa";
}

?>
