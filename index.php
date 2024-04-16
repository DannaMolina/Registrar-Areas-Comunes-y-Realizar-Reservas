<?php

/* CONTROLADORES */
include_once 'Controllers\PaginasControlador.php';
include_once 'Controllers\ReservaControlador.php';
include_once 'Controllers\AreasComunesControlador.php';


/* MODELOS */
include_once 'Models\EnlacesPaginasModelo.php';
include_once 'Models\ReservaDAO.php';
include_once 'Models\AreasComunesDAO.php';

$controlador = new Controlador();
$controlador->cargarTemplate();
?>


