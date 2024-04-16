<?php

class Controlador {

    public function cargarTemplate() {
        include 'Views\template.php';
    }

    public function enlacesPaginaControlador() {
        if (isset($_GET["action"])) {
            if (isset($enlace) && count($enlace) > 1) {
                unset($enlace);
            }
            $enlace = explode("/", $_GET["action"]);
        } else {
            $enlace[0] = "menu";
        }

       // var_dump($enlace);
        $enlacePaginaModelo = new EnlacesPaginasModelo();
        $respuesta = $enlacePaginaModelo->enlacesPagina($enlace);
        include ($respuesta);
    }

}
