<?php

//require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre,bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado(){
        session_start();

    if (!$_SESSION['login']) {
        header('Location:/');
    }
}

function debugear($variable){
   
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapar/ Sanitizar del HTML
function s($html){
  $s = htmlspecialchars($html);
  return $s;
}

//Validar typo de contenido
function ValidarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

//Muestra los Mensajes
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo)
    {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
        $mensaje = false;
    }
    return $mensaje;
}