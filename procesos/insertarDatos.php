<?php
require_once "conexion.php";

$errores = '';

if(isset($_POST['btn']) && $_POST['btn'] == "insertar"){
    $medicion = $_POST['medicion'];
    $fecha = $_POST['fecha'];
    $pozo = $_POST['pozo'];

    if($pozo == '#' || $medicion == null || $fecha == null){
        echo '<script>alert("Error, datos faltantes..");
            location.href = "../medicion-manual/medicion-manual.php";
            </script>';
    } else {
        $insert = "INSERT INTO manometro (valor_medicion, fecha, pozo) VALUES ('$medicion', '$fecha', '$pozo')";
        $query = mysqli_query($mysqli, $insert);

        if($query){
            echo '<script>alert("Guardado correctamente.");
            location.href = "../medicion-manual/medicion-manual.php";
            </script>';
        } else {
            echo '<script>alert("Error al guardar los datos.");
            location.href = "../medicion-manual/medicion-manual.php";
            </script>';
        }
    }
}

?>