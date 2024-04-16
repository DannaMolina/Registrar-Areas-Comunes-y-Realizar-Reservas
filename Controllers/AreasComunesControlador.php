<?php
class AreasComunesControlador
{

    /////////////////////REGISTRAR AREAS COMUNES///////////////////

    public function registrarAreasComunesControlador()
    {
        if (isset($_POST['nombreArea']) && isset($_POST['direccion'])) {
            $datos = array(
                'nombreArea' => $_POST['nombreArea'],
                'direccion' => $_POST['direccion']
            );

            $AreasComunesDao = new AreasComunesDAO();
            $respuesta = $AreasComunesDao->registrarAreasComunesModelo($datos);

            if ($respuesta == "success") {
                header("Location: " . SERVERURL . "areas/verAreas");
            } else {
                header("Location: " . SERVERURL . "areas/registrar/erUser");
            }
        }
    }

    //////////LISTAR AREAS COMUNES //////////////
    

    public function listarAreaComunControlador()
    {
        $AreasComunesDao = new AreasComunesDAO();
        $listado = $AreasComunesDao->listarAreaComunModelo();
        return $listado;
    }


     //////////LISTAR BY ID AREAS COMUNES //////////////

    public function listarAreaComunByIdControlador($id)
    {
        $AreasComunesDao = new AreasComunesDAO();
        $resultado = $AreasComunesDao->listarAreaComunByIdModelo($id);

        return $resultado;
    }

     //////////ACTUALIZAR AREAS COMUNES //////////////

    public function actualizarAreaComunControlador()
    {
        if (isset($_POST['id']) && isset($_POST['nombreArea']) && isset($_POST['direccion'])) {
            $datos = array(
                'id' => $_POST['id'],
                'nombreArea' => $_POST['nombreArea'],
                'direccion' => $_POST['direccion']
            );
    
            $AreasComunesDao = new AreasComunesDAO();
            $respuesta = $AreasComunesDao->actualizarAreasComunesModelo($datos);
    
            if ($respuesta == "success") {
                header("Location: " . SERVERURL . "areas/editarAreas/Okedit");
                exit();
            } else {
                header("Location: " . SERVERURL . "areas/editarAreas/erredit");
                exit();
            }
        }
    }

     //////////Eliminar AREAS COMUNES //////////////
    
    public function eliminarAreaComunControlador($id){
        $areasComunesDao = new AreasComunesDAO();
        $respuesta = $areasComunesDao->eliminarAreaComunModelo($id);
        return $respuesta;
    }
    
    

}