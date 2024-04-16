<?php
class ReservaControlador
{

    /////////////////////REGISTRAR RESERVA Controlador////

    public function registrarReservaControlador() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $numDocumento = $_POST['numDocumento'];
            $idAreaComun = $_POST['areaComun'];
            $dia = $_POST['dia'];
            $horaInicio = $_POST['horaInicio'];
            $horaFin = $_POST['horaFin'];

            $ReservaDao = new ReservaDAO();
            $resultado = $ReservaDao->registrarReservaModelo($nombre, $numDocumento, $idAreaComun, $dia, $horaInicio, $horaFin);

            if ($resultado == "success") {
                header("Location: " . SERVERURL . "reserva/verReservas/oKUser");
            } else {
                header("Location: " . SERVERURL . "reserva/registrarReserva/erUser");
            }
        }
    }


      //////////LISTAR RESERVA CONTROLADOR//////////////

      public function listarReservaControlador()
      {
          $ReservaDao = new ReservaDAO();
          $listado = $ReservaDao->listarReservasModelo();
          return $listado;
      }

       //////////LISTAR RESERVA BY ID CONTROLADOR//////////////

      public function listarReservasByIdControlador($id)
    {
        $ReservaDao = new ReservaDAO();
        $resultado = $ReservaDao->listarReservasByIdModelo($id);

        return $resultado;
    }

    //////////Actualizar Reserva Controlador//////////////

    public function actualizarReservaControlador()
    {
        if (isset($_POST['enviar'])) {
            $idReserva = $_POST['id']; 
            $nombre = $_POST['nombre'];
            $numDocumento = $_POST['numDocumento'];
            $idAreaComun = $_POST['areaComun'];
            $dia = $_POST['dia'];
            $horaInicio = $_POST['horaInicio'];
            $horaFin = $_POST['horaFin'];

        
            $ReservaDao = new ReservaDAO();
            $respuesta = $ReservaDao->actualizarReservaModelo($idReserva, $nombre, $numDocumento, $idAreaComun, $dia, $horaInicio, $horaFin);

            if ($respuesta) {
                header("Location: " . SERVERURL . "reserva/editarReserva/Okedit");
                exit();
            } else {
                header("Location: " . SERVERURL . "reserva/editarReserva/erredit");
                exit();
            }
            
        }
    }

     //////////Eliminar Reserva Controlador //////////////
    
     public function eliminarReservaControlador($id){
        $reservaDao = new ReservaDAO();
        $respuesta = $reservaDao->eliminarReservaModelo($id);
        return $respuesta;
    }
}