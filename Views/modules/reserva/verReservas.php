<?php
include_once 'php/config.php';
include_once 'Views/modules/reserva/reservas.php';

$ReservaControlador = new ReservaControlador();

$listadoReservas = $ReservaControlador->listarReservaControlador();
$AreasComunesControlador = new AreasComunesControlador();
$listadoAreasComunitarias = $AreasComunesControlador->listarAreaComunControlador();
?>

<br>

<h1>Ver Reservas</h1>
<center>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del reservante</th>
            <th>Número de documento</th>
            <th>Día de la reserva</th>
            <th>Hora de inicio</th>
            <th>Hora y día finalizando</th>
            <th>Nombre Área comunitaria</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
         foreach ($listadoReservas as $value){
            print "<tr id='fila". $value['reservas_id'] ."'>";
            print "<td>" . $value['reservas_id'] . "</td>";
            print "<td>" . $value['personas_nombre'] . "</td>";
            print "<td>" . $value['personas_numero_documento'] . "</td>";
            print "<td>" . $value['reservas_dia'] . "</td>";
            print "<td>" . $value['reservas_hora_inicio'] . "</td>";
            print "<td>" . $value['reservas_hora_fin'] . "</td>";
            print "<td>" . $value['areas_comunitarias_nombre'] . "</td>";
            print "<td><button><a href='" . SERVERURL . "reserva/editarReserva/" . $value['reservas_id'] . "'>Editar</a></button></td>";
            print "<td><button><a href='" . SERVERURL . "reserva/verReservas/eliminar/" . $value['reservas_id'] . "'onclick='return validarEliminarReserva(event);'>Eliminar</a></button></td>";
            print "</tr>";
         }
         ?>
        
    </tbody>
   
</table>
</center>
<script src=<?php echo SERVERURL . "/Views/js/validarEliminarReserva.js" ?>></script>
<?php

if (isset($action) && count($action) == 2) {
    switch ($action[1]) {
        case "okdel":
            $msg = "Reserva eliminada correctamente";
            break;

        case "erdel":
            $msg = "Error al eliminar una Reserva";
            break;

        default:
            $msg = "";
    }
    print "<center>" . $msg . "</center>";
}
?>