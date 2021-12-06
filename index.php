<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="style.css">
    <title>Manometro en linea</title>
</head>
<body>
    <header id="header">
        <div class="head-title">
            <h1>Manómetro en línea</h1>
        </div>
    </header>  
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link disabled" href="#">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./medicion-manual/medicion-manual.php">Realizar Medición</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./graficas/graficas.php">Graficas</a>
                </li>
            </ul>
        </div>
    </nav>

    <main id="main">
        <div class="main-welcome">
            <h2>BIENVENIDO</h2>
            <hr>
        </div>

        <div class="wrapper">
            <div class="main-manometro">
                <h3>¿Qué es un manómetro?</h3><br>
                <p>Un manómetro de presión es un indicador analógico utilizado 
                    para medir la presión de un gas o líquido, como agua, aceite 
                    o aire. A diferencia de los transductores de presión tradicionales, 
                    estos son dispositivos analógicos con un dial circular y un puntero 
                    accionado mecánicamente que han estado en uso durante décadas.</p>
                <a class="btn btn-primary" href="https://es.wikipedia.org/wiki/Manómetro">Mas info...</a>
            </div>
            <div class="main-manometro-img">
                <img src="./imgs/manometro.jpg" alt="manometro.jpg">
            </div>
        </div>
    </main>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>