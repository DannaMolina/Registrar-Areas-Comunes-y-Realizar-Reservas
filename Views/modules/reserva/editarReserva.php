<?php
include_once 'php/config.php';
include_once 'Views/modules/reserva/reservas.php';

$ReservaControlador = new ReservaControlador();

if (isset($_POST['enviar'])) {
    $ReservaControlador->actualizarReservaControlador();
}
if (isset($_GET['action'])) {
    $action = explode("/", $_GET['action']);
    $lista = $ReservaControlador->listarReservasByIdControlador($action[2]);
    $AreasComunesControlador = new AreasComunesControlador();
    $listadoAreasComunitarias = $AreasComunesControlador->listarAreaComunControlador();
}
?>

<h1>Actualizar Reserva</h1>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $lista['reservas_id'] ?? ''; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $lista['personas_nombre'] ?? ''; ?>" required><br>

    <label for="numDocumento">Número de documento:</label>
    <input type="text" name="numDocumento" value="<?php echo $lista['personas_numero_documento'] ?? ''; ?>" required><br>
    
    <label for="dia">Día:</label>
    <input type="date" name="dia" value="<?php echo $lista['reservas_dia'] ?? ''; ?>" required><br>

    <label for="horaInicio">Hora de inicio:</label>
    <input type="time" name="horaInicio" value="<?php echo $lista['reservas_hora_inicio'] ?? ''; ?>" required><br>

    <label for="horaFin">Hora de finalización:</label>
    <input type="datetime-local" name="horaFin" value="<?php echo $lista['reservas_hora_fin'] ?? ''; ?>" required><br>

    <label for="areaComun">Área comunitaria:</label>
    <select name="areaComun" required>
        <?php foreach ($areasComunitarias as $areaComun) : ?>
            <option value="<?php echo $areaComun['areas_comunitarias_id']; ?>" <?php echo ($areaComun['areas_comunitarias_nombre']) ? 'selected' : ''; ?>>
                <?php echo $areaComun['areas_comunitarias_nombre']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" name="enviar" value="Actualizar">
</form>

<?php
if (isset($_GET["action"])) {
    $action = explode("/", $_GET['action']);
    if (count($action) == 4) {
        switch ($action[3]) {
            case "Okedit":
                $msg = "Reserva actualizada";
                break;

            case "erredit":
                $msg = "Reserva no actualizada";
                break;

            default:
                $msg = "";
        }
        print "<center>" . $msg . "</center>";
    }
}
?>