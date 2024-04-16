<?php
include_once 'php/config.php';
include_once 'Views/modules/areas/areasComunes.php';

$AreasComunesControlador = new AreasComunesControlador();
if (isset($_GET['action'])) {
    $action = explode("/", $_GET['action']);
    if (count($action) == 3 && $action[0] == "eliminar") {
       // $usuarioControlador->eliminarAreaComunControlador($action[2]);
    }
}

?>

<br>

<h1>Ver Áreas Comunes</h1>

<center>
<table border="2" cellspacing="10" cellpadding="4">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <?php     
           $AreasComunesDao = new AreasComunesDAO();
           $listado = $AreasComunesDao->listarAreaComunModelo();
           
           foreach($listado as $row =>$value){
   
           print "<tr id='fila". $value['areas_comunitarias_id'] ."'>";
           print "<td>" . $value['areas_comunitarias_id'] . "</td>";
           print "<td>" .$value['areas_comunitarias_nombre'] ."</td>";
           print "<td>" . $value['areas_comunitarias_direccion'] ."</td>";
           print "<td><button><a href='" . SERVERURL . "areas/editarAreas/" . $value['areas_comunitarias_id'] . "'>Editar</a></button></td>";
           print "<td><button><a href='" . SERVERURL . "areas/verAreas/eliminar/" . $value['areas_comunitarias_id'] . "' onclick='return validarEliminarRegistro(event);'>Eliminar</a></button></td>";
           print "</tr>";
           }
            ?>
    </tbody>
</table>
</center>
<script src=<?php echo SERVERURL . "/Views/js/validarEliminarRegistro.js" ?>></script>
<?php
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "okdel":
            $msg = "Área común eliminada correctamente";
            break;

        case "erdel":
            $msg = "Error al eliminar el área común";
            break;

        default:
            $msg = "";
    }
    print "<center>" . $msg . "</center>";
}
?>
