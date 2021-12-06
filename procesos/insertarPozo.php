<?php
include 'conexion.php';

if(isset($_POST['btn']) && $_POST['btn'] == 'guardar'){
    $nombrePozo = $_POST['nombre-pozo'];

    if($nombrePozo == "" || $nombrePozo == null){
        echo '<script>alert("Escribir un nombre para el nuevo pozo...")</script>';

    } else {
        $insert = "INSERT INTO pozo (nombre) VALUES ('$nombrePozo')";
        $query = mysqli_query($mysqli, $insert);

        if($query){
            echo '<script>alert("Nuevo pozo agregado con exito!.")
            location.href = "../medicion-manual/medicion-manual.php";
            </script>';
        } else {
            echo '<script>alert("Ha ocurrido un problema!.")
            location.href = "../medicion-manual/medicion-manual.php";
            </script>';
        }

    }
}


?>