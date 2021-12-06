<?php 
include '../procesos/conexion.php';
$query = mysqli_query($mysqli, "SELECT nombre FROM pozo");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.js" integrity="sha512-CWVDkca3f3uAWgDNVzW+W4XJbiC3CH84P2aWZXj+DqI6PNbTzXbl1dIzEHeNJpYSn4B6U8miSZb/hCws7FnUZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <title>Manómetro en línea - Graficas</title>
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
                    <a class="nav-link" href="../medicion-manual/medicion-manual.php">Realizar Medición</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="../graficas/graficas.php">Graficas</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="main-graficas-title">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <h2>Gráficas</h2>
                <hr>
                Seleccione un pozo: 
                <select name="select_pozo" id="pozo" style="margin-right: 10px;">
                    <option value="#">-- Seleccione un pozo --</option>
                    <?php
                        while($datos = mysqli_fetch_array($query)){
                            ?>
                                <option value="<?php echo $datos['nombre'] ?>"> <?php echo $datos['nombre'] ?> </option>"
                            <?php
                        }
                    ?>

                <input type="submit" name="ver" value="Ver grafica" class="btn btn-primary">
                </select>
            </form><br><br>

            <?php
            if(isset($_POST['ver']) && $_POST['ver'] == 'Ver grafica') {
                $ver_pozo = $_POST['select_pozo'];
            ?>
            <h2><?php echo $ver_pozo ?></h2>
            <div class="grafica">
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            <?php
                                $sql_fecha = "SELECT fecha FROM manometro WHERE pozo = '$ver_pozo' ORDER BY fecha ASC;";

                                if ($resul = $mysqli->query($sql_fecha)) {
                                    while ($datos = $resul->fetch_assoc()) {
                                        $timestamp = strtotime($datos['fecha']);
                                        $nueva_fecha = date('d/m/Y H:i:s', $timestamp);
                                ?>
                                        '<?php echo $nueva_fecha ?>',
                                <?php
                                    }
                                    $resul->free();
                                }
                            ?>
                        ],
                        datasets: [{
                            label: 'Valor de medición (PCI)',
                        data: [
                            <?php
                            $sql_medicion = "SELECT valor_medicion FROM manometro WHERE pozo = '$ver_pozo' ORDER BY fecha ASC;";

                            if ($resul = $mysqli->query($sql_medicion)) {
                                while ($datos = $resul->fetch_assoc()) {
                                ?>

                                    '<?php echo $datos["valor_medicion"]; ?>',
                                
                                <?php 
                                }
                                $resul->free();
                            }
                            ?>
                        ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
        </div>
        <?php
            }
        ?>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
    mysqli_close($mysqli);
?>
</html>

