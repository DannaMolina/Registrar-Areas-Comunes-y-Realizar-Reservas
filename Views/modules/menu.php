<?php
$mostrarContenido = false;
include_once 'php/config.php';

include_once 'Views/template.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de Stigma</title>

</head>

<body>

    <div class="row text-center">
        <h1>MENU</h1>
    </div>

    <br><br>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="azul">
                    <a href="<?php echo SERVERURL; ?>reserva/reservas">
                        <figure class="figure">
                            <img src="Views/Img/Reserva.png" class="rounded float-back" alt="Reservar">
                            <figcaption><a class="figure-caption" href="<?php echo SERVERURL; ?>reserva/reservas">Reservas</a></figcaption>
                        </figure>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="gris">
                    <a href="<?php echo SERVERURL; ?>areas/areasComunes">
                        <figure class="figure">
                            <img src="Views/Img/piscina.png" class="rounded float-back" alt="Areas">
                            <figcaption><a class="figure-caption" href="<?php echo SERVERURL; ?>areas/areasComunes">Areas Comunes</a></figcaption>
                        </figure>
                    </a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


</body>

</html>