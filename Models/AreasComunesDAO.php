<?php

if (!file_exists('config/Conexion.php')) {
    require_once '../../../config/Conexion.php';
} else {
    require_once 'config/Conexion.php';
}
class AreasComunesDAO extends Conexion{

     //////////REGISTRAR AREAS COMUNES MODELO//////////////

    public function registrarAreasComunesModelo($datos)
    {
        $sql = "INSERT INTO areas_comunitarias 
        (areas_comunitarias_nombre, areas_comunitarias_direccion)
        values(:nombreArea,:direccion)";
        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->bindParam(":nombreArea", $datos['nombreArea'], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);

            if ($stmt->execute()) {
                $conexion = null;
                $stmt = null;
                return "success";
            } else {
                return "error";
            }
        } catch (Exception $ex) {
            print "<p>Fallo<p>";
        }
        return true;
    }

    //////////LISTAS AREAS COMUNES MODELO//////////////
    public function listarAreaComunModelo()
    {
        $sql = "SELECT areas_comunitarias_id, areas_comunitarias_nombre,areas_comunitarias_direccion 
        FROM areas_comunitarias order by areas_comunitarias_nombre";
        // print $sql;
        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
            $conexion = null;
            $stmt = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //////////LISTAS AREAS COMUNES BY ID MODELO//////////////

    public function listarAreaComunByIdModelo($id)
    {
        $sql = "SELECT * FROM areas_comunitarias WHERE areas_comunitarias_id = :id";
        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $resultado = $stmt->fetch();
            if ($resultado) {
                return $resultado;
            } else {
                return null;
            }
            $conexion = null;
            $stmt = null;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //////////ACTUALIZAR AREAS COMUNES MODELO//////////////

    public function actualizarAreasComunesModelo($datos)
    {
        $sql = "UPDATE areas_comunitarias SET areas_comunitarias_nombre= :nombreArea, areas_comunitarias_direccion= :direccion WHERE areas_comunitarias_id= :id";

        try {
            $conexion = new Conexion();
            $stmt = $conexion->conectar()->prepare($sql);

            $stmt->bindParam(":nombreArea", $datos['nombreArea'], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount()) {
                $conexion = null;
                $stmt = null;
                return "success";
            } else {
                return "error";
            }
        } catch (Exception $ex) {
            return "error";
        }
    }


    //////////ELIMINAR AREAS COMUNES MODELO//////////////

    public function eliminarAreaComunModelo($id)
    {
        $sql = "DELETE FROM areas_comunitarias WHERE areas_comunitarias_id = :id";

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
            return "errForeign";
        }
    }

}