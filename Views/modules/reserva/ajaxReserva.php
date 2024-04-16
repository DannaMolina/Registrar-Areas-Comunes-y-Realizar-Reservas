<?php
include_once '../../../Controllers/ReservaControlador.php';
include_once '../../../Models/ReservaDAO.php';

class AjaxAreas {
    public $id;
    public $ope;
    
    public function eliminarReserva(){
        $reservaControlador = new ReservaControlador();
        $respuesta = $reservaControlador->eliminarReservaControlador($this->id);
        print $respuesta;
    }
}

$ajaxAreas = new AjaxAreas();

if(isset($_POST['id']) && isset($_POST['ope'])){
    $ajaxAreas->id = $_POST['id'];
    $ajaxAreas->ope = $_POST['ope'];
    $ajaxAreas->eliminarReserva();
}
?>