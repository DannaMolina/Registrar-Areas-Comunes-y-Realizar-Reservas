<?php
include_once '../../../Controllers/AreasComunesControlador.php';
include_once '../../../Models/AreasComunesDAO.php';

class AjaxAreas {
    public $id;
    public $ope;
    
    public function eliminarAreas(){
        $areasComunesControlador = new AreasComunesControlador();
        $respuesta = $areasComunesControlador->eliminarAreaComunControlador($this->id);
        print $respuesta;
    }
}

$ajaxAreas = new AjaxAreas();

if(isset($_POST['id']) && isset($_POST['ope'])){
    $ajaxAreas->id = $_POST['id'];
    $ajaxAreas->ope = $_POST['ope'];
    $ajaxAreas->eliminarAreas();
}
?>