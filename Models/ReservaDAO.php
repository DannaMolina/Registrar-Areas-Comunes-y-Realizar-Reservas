<?php

if (!file_exists('config/Conexion.php')) {
    require_once '../../../config/Conexion.php';
} else {
    require_once 'config/Conexion.php';
}
class ReservaDAO extends Conexion
{

    //////////REGISTRAR RESERVA MODELO//////////////

    public function registrarReservaModelo($nombre,  $numDocumento, $idAreaComun, $dia, $horaInicio, $horaFin)
    {
        try {
            $conexion = new Conexion();

            $sqlInsertarReserva = "INSERT INTO reservas (reservas_dia, reservas_hora_inicio, reservas_hora_fin, personas_personas_id, areas_comunitarias_areas_comunitarias_id) VALUES (:dia, :horaInicio, :horaFin, :idPersona, :idAreaComun)";
            $stmtInsertarReserva = $conexion->conectar()->prepare($sqlInsertarReserva);
            $stmtInsertarReserva->bindParam(":dia", $dia, PDO::PARAM_STR);
            $stmtInsertarReserva->bindParam(":horaInicio", $horaInicio, PDO::PARAM_STR);
            $stmtInsertarReserva->bindParam(":horaFin", $horaFin, PDO::PARAM_STR);
            $stmtInsertarReserva->bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
            $stmtInsertarReserva->bindParam(":idAreaComun", $idAreaComun, PDO::PARAM_INT);


            $sql = "SELECT personas_id FROM personas WHERE personas_nombre = :nombre AND personas_numero_documento = :numDocumento";
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":numDocumento", $numDocumento, PDO::PARAM_STR);
            $stmt->execute();
            $persona = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$persona) {

                return false;
            }

            $idPersona = $persona['personas_id'];


            if ($stmtInsertarReserva->execute()) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $ex) {

            return false;
        }
    }

    //////////OBTENER AREAS COMUNES PARA LAS RESERVAS MODELO//////////////

    public function obtenerAreasComunitarias()
    {
        try {
            $conexion = new Conexion();
            $sql = "SELECT * FROM areas_comunitarias";
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->execute();
            $areasComunitarias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $areasComunitarias;
        } catch (PDOException $ex) {

            return array();
        }
    }


    //////////LISTAR RESERVA MODELO//////////////

    public function listarReservasModelo()
    {
        $sql = "SELECT reservas.reservas_id, reservas.reservas_dia, reservas.reservas_hora_inicio, reservas.reservas_hora_fin, personas.personas_nombre, personas.personas_numero_documento, areas_comunitarias.areas_comunitarias_nombre
                FROM reservas
                INNER JOIN personas ON reservas.personas_personas_id = personas.personas_id
                INNER JOIN areas_comunitarias ON reservas.areas_comunitarias_areas_comunitarias_id = areas_comunitarias.areas_comunitarias_id
                ORDER BY reservas.reservas_dia,reservas.reservas_hora_inicio";
        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //////////LISTAR RESERVA BY ID MODELO//////////////

    public function listarReservasByIdModelo($id)
    {
        $sql = "SELECT reservas.reservas_id, reservas.reservas_dia, reservas.reservas_hora_inicio, reservas.reservas_hora_fin, personas.personas_nombre, personas.personas_numero_documento, areas_comunitarias.areas_comunitarias_nombre
                FROM reservas
                INNER JOIN personas ON reservas.personas_personas_id = personas.personas_id
                INNER JOIN areas_comunitarias ON reservas.areas_comunitarias_areas_comunitarias_id = areas_comunitarias.areas_comunitarias_id
                WHERE reservas.reservas_id = :id";
        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //////////ACTUALIZAR RESERVA MODELO//////////////

    public function actualizarReservaModelo($idReserva, $nombre,  $numDocumento, $idAreaComun, $dia, $horaInicio, $horaFin)
    {
        try {
            $conexion = new Conexion();


            $sqlVerificarReserva = "SELECT * FROM reservas WHERE reservas_id = :idReserva";
            $stmtVerificarReserva = $conexion->conectar()->prepare($sqlVerificarReserva);
            $stmtVerificarReserva->bindParam(":idReserva", $idReserva, PDO::PARAM_INT);
            $stmtVerificarReserva->execute();
            $reservaExistente = $stmtVerificarReserva->fetch(PDO::FETCH_ASSOC);

            if (!$reservaExistente) {

                return false;
            }

            $sqlObtenerPersona = "SELECT personas_id FROM personas WHERE personas_nombre = :nombre AND personas_numero_documento = :numDocumento";
            $stmtObtenerPersona = $conexion->conectar()->prepare($sqlObtenerPersona);
            $stmtObtenerPersona->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmtObtenerPersona->bindParam(":numDocumento", $numDocumento, PDO::PARAM_STR);
            $stmtObtenerPersona->execute();
            $persona = $stmtObtenerPersona->fetch(PDO::FETCH_ASSOC);

            if (!$persona) {

                return false;
            }

            $idPersona = $persona['personas_id'];


            $sqlActualizarReserva = "UPDATE reservas SET reservas_dia = :dia, reservas_hora_inicio = :horaInicio, reservas_hora_fin = :horaFin, personas_personas_id = :idPersona, areas_comunitarias_areas_comunitarias_id = :idAreaComun WHERE reservas_id = :idReserva";
            $stmtActualizarReserva = $conexion->conectar()->prepare($sqlActualizarReserva);
            $stmtActualizarReserva->bindParam(":dia", $dia, PDO::PARAM_STR);
            $stmtActualizarReserva->bindParam(":horaInicio", $horaInicio, PDO::PARAM_STR);
            $stmtActualizarReserva->bindParam(":horaFin", $horaFin, PDO::PARAM_STR);
            $stmtActualizarReserva->bindParam(":idPersona", $idPersona, PDO::PARAM_INT);
            $stmtActualizarReserva->bindParam(":idAreaComun", $idAreaComun, PDO::PARAM_INT);
            $stmtActualizarReserva->bindParam(":idReserva", $idReserva, PDO::PARAM_INT);

            if ($stmtActualizarReserva->execute()) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $ex) {

            return false;
        }
    }

     //////////ELIMINAR RESERVA MODELO//////////////

     public function eliminarReservaModelo($id)
     {
         $sql = "DELETE FROM reservas WHERE reservas_id = :id";
 
         try {
             $conexion = new Conexion();
             $stmt = $conexion->conectar()->prepare($sql);
             $stmt->bindParam(":id", $id, PDO::PARAM_INT);
             $stmt->execute();
 
             if ($stmt->rowCount() > 0) {
                 return "success";
             } else {
                 return "error";
             }
         } catch (Exception $ex) {
             return "errores";
         }
     }
}
