<?php 
include '../procesos/conexion.php';
$queryPozo = mysqli_query($mysqli, "SELECT nombre from pozo");
$queryPozo2 = mysqli_query($mysqli, "SELECT nombre from pozo");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>Manómetro en línea - Medición manual</title>
</head>
<body id="body">
    <div class="registro-pozo-bg animate__animated animate__fadeIn" id="registro-pozo-bg"></div>
    <header id="header">
        <div class="head-title">
            <h1>Realizar medición manual</h1>
        </div>
    </header>  
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Realizar Medición</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../graficas/graficas.php">Graficas</a>
                </li>
            </ul>
        </div>
    </nav>

    <main id="main">
        <div class="main-title">
            <h2>Inserte los siguientes datos:</h2>
            <hr>
        </div>
        <div class="main-form">
            <form action="../procesos/insertarDatos.php" method="POST">
                Medida (PCI) <br>
                <input type="number" 
                    step="0.01" 
                    value="0.00" 
                    placeholder="0.00" 
                    name="medicion"
                    > 
                    <br><br>
                Fecha/hora <br>
                <input type="datetime-local" 
                    name="fecha" 
                    min="1986-01-01T00:00" 
                    max="2021-12-31T00:00"
                    > 
                <br><br>
                Nombre del pozo <br>
                <select name="pozo" id="pozo">
                    <option value="#">-- Seleccione un pozo --</option>
                    <?php
                        while($datos = mysqli_fetch_array($queryPozo)){
                            ?>
                                <option value="<?php echo $datos['nombre'] ?>"> <?php echo $datos['nombre'] ?> </option>"
                            <?php
                        }
                    ?>
                </select> <br><br>

                <a href="javascript:popup_registro_pozo()">Registrar un pozo...</a> <br><br>
                <input class="btn btn-primary" type="submit" name="btn" value="insertar">
            </form>
        </div>

        <!-- Añadir un pozo -->
        <div class="registro-pozo animate__animated animate__zoomIn" id="registro-pozo">
            <h3>Nuevo pozo</h3>
            <hr>
            <form action="../procesos/insertarPozo.php" method="POST">
                Escriba el nombre del nuevo pozo: <br>
                <input type="text" placeholder="Nombre del pozo" name="nombre-pozo">
                <br><br>
                <input type="submit" name="btn" value="guardar" class="btn btn-success">
                <a href="javascript:popout_registro_pozo()" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </main>
</body>
<script>
    function popup_registro_pozo(){
        document.getElementById('registro-pozo').style.display="block";
        document.getElementById('registro-pozo-bg').style.display="block";
    }
    function popout_registro_pozo(){
        document.getElementById('registro-pozo').style.display="none";
        document.getElementById('registro-pozo-bg').style.display="none";
    }
</script>
</html>

