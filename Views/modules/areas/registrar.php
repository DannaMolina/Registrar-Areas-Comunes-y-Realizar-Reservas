<?php

include_once 'Views/modules/areas/areasComunes.php';
?>
<br>

<h1>Registrar Area Comun</h1>

<br>
<form method="post"  onsubmit="return validarRegistro();">
    <label for="nombreArea">Nombre del Area Comunicados: <span></span></label>
    <input type="text" name="nombreArea" id="nombreArea" />
    <br>
    <label for="direccion">Dirección: <span></span></label>
    <input type="text" name="direccion" id="direccison" />
    <br>
    <br>
    <input type="submit" value="Registrar" name="registrar" />
</form>
<script src="<?php echo SERVERURL; ?>Views/js/validar.js"></script>
<?php

$AreasComunesControlador = new AreasComunesControlador();
$AreasComunesControlador->registrarAreasComunesControlador();

if (isset($_GET['action'])) {
    $accion = explode("/", $_GET['action']);
    if (count($accion) > 2) {
      
        if ($accion[2] == "okUser") {
            $msg = "Area Común Registrada Correctamente";
        } else {
            $msg = "Area Común NO Registrado";
        }
    }

  
    if (isset($msg)) {
        echo "<center>" . $msg . "</center>";
    }
}
?>