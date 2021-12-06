<?php
include '../procesos/conexion.php';
$query = mysqli_query($mysqli, "SELECT nombre from pozo");

while($datos = mysqli_fetch_array($query)){
    echo $datos['nombre'];
}

?>