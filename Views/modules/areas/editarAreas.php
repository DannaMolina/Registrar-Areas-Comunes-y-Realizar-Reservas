<?php
include_once 'php/config.php';
include_once 'Views/modules/areas/areasComunes.php';

$AreasComunesControlador = new AreasComunesControlador();



if (isset($_POST['enviar'])) {
    $AreasComunesControlador->actualizarAreaComunControlador();
}
if (isset($_GET['action'])) {
    $action = explode("/", $_GET['action']);
    $lista = $AreasComunesControlador->listarAreaComunByIdControlador($action[2]);
}
?>
<br>

<h1>Actualizar Area Común</h1>

<br>
<form method="post">
<input type="hidden" name="id" value="<?php print $lista['areas_comunitarias_id'] ?? '' ?>">
<label for="nombreArea">Nombre del Area Comunicados: <span></span></label>
<input type="text" name="nombreArea" id="nombreArea" value="<?php print $lista['areas_comunitarias_nombre'] ?? '' ?>" />
<br>
<label for="direccionEditar">Dirección: <span></span></label>
<input type="text" name="direccion" id="direccion" value="<?php print $lista['areas_comunitarias_direccion'] ?? '' ?>" />
<br>
<br>
<input type="submit" value="Actualizar" name="enviar" />
</form>

<?php
if (isset($_GET["action"])) {
    $action = explode("/", $_GET['action']);
    if (count($action) == 4) {
        switch ($action[3]) {
            case "Okedit":
                $msg = "Area Común actualizada";
                break;

            case "erredit":
                $msg = "Area Común no actualizada";
                break;

            default:
                $msg = "";
        }
        print "<center>" . $msg . "</center>";
    }
}
?>
