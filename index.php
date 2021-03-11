<?php
session_start();
require_once 'core/Connection.php';

// Incluimos automaticamente el model que sea necesario
function my_autoloader($class)
{
    require_once ("models/$class.php");
}

spl_autoload_register('my_autoloader');

// Enrutamiento. Selecciona el controlador y la accion a ejecutar
$map = array(

	// Productos
	'subir_producto' => array(
        'controller' => 'ControladorProductos',
        'action' => 'subir_producto',
        'privada' => true
    ),
    'editar_producto' => array(
        'controller' => 'ControladorProductos',
        'action' => 'editar_producto',
        'privada' => true
    ),
    
    // Usuarios
	'merendalios' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'merendalios',
        'privada' => false
    ),
	'subir_usuario' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'subir_usuario',
        'privada' => true
    ),
	'documento_excel' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'documento_excel',
        'privada' => true
    ),
    'logueo' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'logueo',
        'privada' => false
    ),
    'pagina_administrador_merendalios' => array(
        'controller' => 'ControladorUsuarios',
        'action' => 'pagina_administrador_merendalios',
        'privada' => true
    ),
    
    // Páginas
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
    'cortometraje_restaurante_video' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'corto_hummus',
        'privada' => false
    ),
    'alquilar_local_fiestas_celebraciones_cumpleanos' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'reserva_el_espacio_en_ferias_de_valladolid',
        'privada' => false
    ),
    'restaurante_privado_coctel_catering' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'experiencia_merendalia_que_son_los_menus_privados',
        'privada' => false
    ),
    'merendalia_celebraciones_eventos_cumpleanos_catering' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'que_es_merendalia_y_por_que_elegirnos',
        'privada' => false
    ),
    'merienda_taller_ninos_infantil' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'arranque_de_las_meriendas_taller_de_merendalia',
        'privada' => false
    ),
    'consejos_evento_seguro_pandemia_covid_fiesta' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'consejos_pandemia',
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
    'declaracion_cookies' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'declaracion_cookies',
        'privada' => false
    ),
    'carta_bar' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'carta_bar',
        'privada' => false
    ),
    
    // Formularios
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
    ),
    
    // Páginas de error
    'page404' => array(
        'controller' => 'ControladorPaginas',
        'action' => 'page404',
        'privada' => false
    )
);

// Parseo de la ruta
// Comprobamos si hay alguna accion que ejecutar, sino ejecutamos inicio
if (isset($_GET['action'])) {
    
    // Hacemos un replace para las urls amigables con '-'
    $action_normalizado = str_replace("-", "_", $_GET['action']);
    
    // Comprobamos que la accion existe en el mapa del enrutamiento, sino mostramos error 404
    if (isset($map[$action_normalizado])) {
        $action = $action_normalizado;
    } else {
		$action = 'page404';
    }
    
} else {
    $action = 'inicio';
}

// La variable controlador contiene la clase del controlador a ejecutar y el metodo de dicha clase.
$controlador = $map[$action];

// Guardamos en variables el nombre de la clase controladora y del metodo que queremos ejecutar dentro de dicha clase
$clase_controlador = $controlador['controller'];
$metodo = $controlador['action'];

// Si la pagina es privada comprobamos si el usuario es administrador, sino redirigimos a inicio
if ($controlador['privada'] && (!isset($_SESSION['administrador']) || !$_SESSION['administrador'])) {
    header('location:./inicio');
    die();
}

// Creamos un objeto de la clase controladora y ejecutamos el metodo indicado en el action
require_once "controller/$clase_controlador.php";

$obj_controlador = new $clase_controlador();
$obj_controlador->$metodo();

?>
