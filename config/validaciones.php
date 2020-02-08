<?php
require_once 'Defines.php';

/**
 * La esContrasena debe tener al entre 4 y 8 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
 * No puede tener otros s�mbolos.
 *
 * @param
 *            $pass
 * @return true si cumple con los requisitos
 */
function esContrasena($pass)
{
    /* ("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{4,8}$/",$pass) */
    if (preg_match("/^\S{4,16}$/", $pass)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Función que valida que el teléfono no sea raro
 *
 * @param
 *            $value
 * @return boolean
 */
function validarTelefono($value)
{
    $expresion = '/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/';
    
    if (preg_match($expresion, $value)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Función que compara la dos contraseñas que introduce el usuario por el formulario cuando tiene la opción de
 * modificar la contrasena
 *
 * @param
 *            $passNueva
 * @param
 *            $passRep
 * @return boolean true si ambas coinciden. False si la contrase�a repetida no es igual que la contraseña nueva
 */
function validarContrasena($passNueva, $passRep)
{
    if ($passNueva == $passRep) {
        return true;
    } else {
        return false;
    }
}

/**
 * Definimos los mensajes de error para darles un texto comprensible por el usuario
 *
 * @global type $mensaje
 * @param
 *            $num
 * @return $mensaje[]
 */
function validacion($num)
{
    global $mensaje; // importante la variable global para que reconozca $mensaje de 'DSefines.inc.php'
    if ($num == 201) {
        return $mensaje[USER_NOEXIS];
    } elseif ($num == 202) {
        return $mensaje[CLAVE_NOEXIS];
    } elseif ($num == 204) {
        return $mensaje[EMAIL_REPE];
    } elseif ($num == 205) {
        return $mensaje[ERROR_FECHA_NACIMIENTO];
    } elseif ($num == 206) {
        return $mensaje[TFNO_INCORRECTO];
    } elseif ($num == 207) {
        return $mensaje[NOMBRE_INCORRECTO];
    } elseif ($num == 208) {
        return $mensaje[APELLIDO_INCORRECTO];
    } elseif ($num == 209) {
        return $mensaje[EMAIL_INCORRECTO];
    } elseif ($num == 210) {
        return $mensaje[PASS_DIFERENTES];
    } elseif ($num == 211) {
        return $mensaje[NICK_INCORRECTO];
    } elseif ($num == 212) {
        return $mensaje[ADMIN_NO_PERMISOS];
    } elseif ($num == 213) {
        return $mensaje[TITULO_EXISTE];
    } elseif ($num == 214) {
        return $mensaje[AUTOR_INCORRECTO];
    } elseif ($num == 215) {
        return $mensaje[GENERO_INCORRECTO];
    } elseif ($num == 216) {
        return $mensaje[CODIGO_INCORRECTO];
    } elseif ($num == 217) {
        return $mensaje[CARACTERES_ESPECIALES];
    } elseif ($num == 300) {
        return $mensaje[USER_EXISTE];
    } elseif ($num == 301) {
        return $mensaje[USER_CORRECTO];
    } elseif ($num == 303) {
        return $mensaje[USER_INCORRECTO];
    } elseif ($num == 305) {
        return $mensaje[PASS_INCORRECTO];
    } elseif ($num == 306) {
        return $mensaje[CONF_REGISTRO];
    } elseif ($num == 307) {
        return $mensaje[ENVIO_MENSAJE_OK];
    } elseif ($num == 401) {
        return $mensaje[TEXTO_SUBIDO_OK];
    } elseif ($num == 402) {
        return $mensaje[TEXTO_SUBIDO_KO];
    } elseif ($num == 501) {
        return $mensaje[FORMULARIO_OK];
    } elseif ($num == 502) {
        return $mensaje[FORMULARIO_KO_NOMBRE_MAIL_OBLIGATORIO];
    } elseif ($num == 503) {
        return $mensaje[FORMULARIO_KO_RECAPTCHA];
    } elseif ($num == 601) {
        return $mensaje[PRODUCTO_SUBIDO_OK];
    } elseif ($num == 602) {
        return $mensaje[PRODUCTO_SUBIDO_KO];
    } elseif ($num == 603) {
        return $mensaje[PRODUCTO_SUBIDO_KO_TITLE_ALT];
    } elseif ($num == 604) {
        return $mensaje[ERROR_SUBIDA_IMAGEN_MOVER_ARCHIVO];
    } elseif ($num == 605) {
        return $mensaje[ERROR_SUBIDA_IMAGEN_CREACION_CARPETA];
    } elseif ($num == 606) {
        return $mensaje[ERROR_SUBIDA_IMAGEN_FORMATO_INCORRECTO];
    }
}

/**
 * Se valida el nick que tiene que tener de 4 a 8 caracteres, letras ó números
 *
 * @param
 *            $nick
 */
function esNick($nick)
{
    if (preg_match("/^[A-Z \-áéíóúÁÉÍÓÚñÑ0-9.]{4,8}$/i", $nick)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Un nombre ó apellido es válido si tiene un mímimo de 3 caracteres y un máximo de 20
 * Además, que no empiece por números,puede contener espacios en blanco y que no contenga caracteres especiales
 *
 * @param
 *            $nombre
 * @return boolean true si se cumplen las reglas. False en caso contrario
 */
function esNombreValido($nombre)
{
    /**
     * Que no empiece por números,puede contener espacios en blanco y que no contenga caracteres especiales,
     * un mímimo de 3 caracteres y un máximo de 20
     */
    if (preg_match("/^[A-Z \-áéíóúÁÉÍÓÚñÑ\\s]{3,20}/i", $nombre)) {
        return true;
    } else {
        
        return false;
    }
}

/**
 * tieneCaracteresEspeciales( $palabra )
 * Una palabra no puede contener caracteres especiales
 *
 * @param
 *            $palabra
 * @return boolean true si se cumplen las reglas. False en caso contrario
 */
function tieneCaracteresEspeciales($palabra)
{
    if (preg_match("/[]{}*=+\-\\/#%_$&|]/", $palabra)) {
        return true;
    } else {
        return false;
    }
    return false;
}

/**
 * esCodigoCorrecto($codigo)
 * Comprueba que el codigo introducido es el correcto
 *
 * @param
 *            $palabra
 * @return boolean true si se cumplen las reglas. False en caso contrario
 */
function esCodigoCorrecto($codigo)
{
    $codigoCorrecto = "FERIADELLIBRO";
    if ($codigoCorrecto == $codigo) {
        return true;
    } else {
        return false;
    }
}

/**
 * Con un filtro validamos la direccion de correo electronico
 *
 * @param
 *            $mail
 * @return boolean true si es valido. False en caso contrario
 */
function esMailValido($mail)
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
        return true;
    return false;
}