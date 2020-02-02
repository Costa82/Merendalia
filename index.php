<?php
session_start();
require_once 'core/Connection.php';

// Incluimos automaticamente el model que sea necesario
function __autoload($class)
{
    require_once ("models/$class.php");
}

// Comprobamos la sesion
if (!isset($_SESSION['usuario'])) {
    
    // Compruebo si existe la cookie y si coincide con algun usuario
    if (isset($_COOKIE['usuario'])) {
        
        require_once 'models/Usuarios.php';
        $usuario = new Usuarios();
        $nombre_usuario = $usuario->comprobar_cookie($_COOKIE['usuario']);
        
        if ($nombre_usuario) {
            
            // Creamos la variable de sesion
            $_SESSION['usuario'] = $nombre_usuario;
            // Si estamos en inicio redirigimos a ver contactos
            if ($_GET['action'] == 'inicio') {
                header('location:inicio');
            }
        } else {
            header('location:inicio');
        }
    }
}

// Enrutamiento. Selecciona el controlador y la accion a ejecutar
$map = array(
	'administrador' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'administrador',
        'privada' => false
    ),'logueo' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'logueo',
        'privada' => false
    ),'pagina_administrador' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'pagina_administrador',
        'privada' => true
    ),
    'inicio' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'inicio',
        'privada' => false
    ),
    'galeria' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'galeria',
        'privada' => false
    ),
    'eventos' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'eventos',
        'privada' => false
    ),
    'espacio' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'espacio',
        'privada' => false
    ),
    'catering' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'catering',
        'privada' => false
    ),
    'blog_merendalia' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'blog_merendalia',
        'privada' => false
    ),
    'contacto' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'contacto',
        'privada' => false
    ),
    'aviso_legal' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'aviso_legal',
        'privada' => false
    ),
    'politica_privacidad_y_proteccion_datos' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'politica_privacidad_y_proteccion_datos',
        'privada' => false
    ),
    'cookies' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'cookies',
        'privada' => false
    ),
    'formulario_reserva' => array(
        'controller' => 'ControladorFormularios',
        'action' => 'formulario_reserva',
        'privada' => false
    ),
    'formulario_contacto' => array(
        'controller' => 'ControladorFormularios',
        'action' => 'formulario_contacto',
        'privada' => false
    ),
    'respuesta_envio' => array(
        'controller' => 'ControladorFormularios',
        'action' => 'respuesta_envio',
        'privada' => false
    )
);

// Parseo de la ruta
// Comprobamos si hay alguna accion que ejecutar, sino ejecutamos inicio
if (isset($_GET['action'])) {
    
    // Comprobamos que la accion existe en el mapa del enrutamiento, sino mostramos error 404
    if (isset($map[$_GET['action']])) {
        $action = $_GET['action'];
    } else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta ' . $_GET['action'] . ' </h1></body></html>';
        exit();
    }
} else {
    $action = 'inicio';
}

// La variable controlador contiene la clase del controlador a ejecutar y el metodo de dicha clase.
$controlador = $map[$action];

// Guardamos en variables el nombre de la clase controladora y del metodo que queremos ejecutar dentro de dicha clase
$clase_controlador = $controlador['controller'];
$metodo = $controlador['action'];

// Si la pagina es privada comprobamos si el usuario esta correctamente logueado, sino redirigimos a inicio
if ($controlador['privada'] && ! isset($_SESSION['usuario'])) {
    header('location:/Merendalia/inicio'); // Si lo ponemos en el servidor poner /Foro/inicio
    die();
}

// Creamos un objeto de la clase controladora y ejecutamos el metodo indicado en el action
require_once "controller/$clase_controlador.php";

$obj_controlador = new $clase_controlador();
$obj_controlador->$metodo();

?>
