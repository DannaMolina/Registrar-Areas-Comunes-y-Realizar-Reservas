<?php

include_once 'Views/modules/reserva/reservas.php';
$ReservaDao = new ReservaDAO();
$areasComunitarias = $ReservaDao->obtenerAreasComunitarias();
?>

<h1>Realizar Reserva</h1>

<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label for="numDocumento">Número de documento:</label>
    <input type="number" name="numDocumento" required><br>
    
    <label for="dia">Día:</label>
    <input type="date" name="dia" required><br>

    <label for="horaInicio">Hora de inicio:</label>
    <input type="time" name="horaInicio" required><br>

    <label for="horaFin">Hora de finalización:</label>
    <input type="datetime-local" name="horaFin" required><br>

    <label for="areaComun">Área comunitaria:</label>
    <select name="areaComun" required>
        <?php foreach ($areasComunitarias as $areaComun) : ?>
            <option value="<?php print $areaComun['areas_comunitarias_id']; ?>"><?php print $areaComun['areas_comunitarias_nombre']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Registrar">
</form>

<?php
$ReservaControlador = new ReservaControlador();
$ReservaControlador->registrarReservaControlador();

if (isset($_GET['action'])) {
    $accion = explode("/", $_GET['action']);
    if (count($accion) > 2) {
        
        if ($accion[2] == "oKUser") {
            $msg = "Reserva Registrada Correctamente";
        } else {
            $msg = "Reserva NO Registrada";
        }
    }

   
    if (isset($msg)) {
        echo "<center>" . $msg . "</center>";
    }
}
?>