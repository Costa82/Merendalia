<?php

// Validaciones Usuario
define("USER_NOEXIS", 201); //El usuario no es administrador
define("CLAVE_NOEXIS", 202); //La contraseña es incorrecta

// Validaciones Correo
define("ERROR_ENVIO", 501); //Error al enviar el correo.
define("ERROR_ENVIO_NOMBRE_MAIL", 502); //Error al enviar el correo, falta el nombre o el mail.
define("ERROR_ENVIO_CAPTCHA", 503); //Error al enviar el correo, error en el Recaptcha.

// Validaciones Productos
define("PRODUCTO_SUBIDO_OK", 601); //Producto subido correctamente.
define("PRODUCTO_SUBIDO_KO", 602); //Error al subir el producto.
define("PRODUCTO_SUBIDO_KO_TITLE_ALT", 603); //No se puede subir imagen sin title o alt.
define("ERROR_SUBIDA_IMAGEN_MOVER_ARCHIVO", 604); //Error al mover el archivo.
define("ERROR_SUBIDA_IMAGEN_CREACION_CARPETA", 605); //Error al crear la carpeta.
define("ERROR_SUBIDA_IMAGEN_FORMATO_INCORRECTO", 606); //Imagen con formato incorrecto.
define("LISTADO_PRODUCTO_SUBIDO_KO", 607); //Error al subir el listado del producto.
define("PRODUCTO_NO_EXISTE", 608); //El producto no existe.
define("PRODUCTO_ACTUALIZADO_OK", 609); //Producto actualizado correctamente.
define("PRODUCTO_ACTUALIZADO_KO", 610); //Error al actualizar el producto.

// Error general
define("ERROR_GENERAL", 1000); //Error General

// Definiciones
$mensaje[USER_NOEXIS] = "El usuario no es administrador.";
$mensaje[CLAVE_NOEXIS] = "La contraseña es incorrecta";

$mensaje[ERROR_ENVIO] = "Error al enviar el correo.";
$mensaje[ERROR_ENVIO_NOMBRE_MAIL] = "Error al enviar el correo, falta el nombre o el mail.";
$mensaje[ERROR_ENVIO_CAPTCHA] = "Error al enviar el correo, error en el Recaptcha.";

$mensaje[PRODUCTO_SUBIDO_OK] = "Producto subido correctamente.";
$mensaje[PRODUCTO_SUBIDO_KO] = "Error al subir el producto.";
$mensaje[PRODUCTO_SUBIDO_KO_TITLE_ALT] = "No se puede subir imagen sin title o alt.";
$mensaje[ERROR_SUBIDA_IMAGEN_MOVER_ARCHIVO] = "Error al mover el archivo.";
$mensaje[ERROR_SUBIDA_IMAGEN_CREACION_CARPETA] = "Error al crear la carpeta.";
$mensaje[ERROR_SUBIDA_IMAGEN_FORMATO_INCORRECTO] = "Imagen con formato incorrecto.";
$mensaje[LISTADO_PRODUCTO_SUBIDO_KO] = "Error al subir el listado del producto.";
$mensaje[PRODUCTO_NO_EXISTE] = "El producto no existe.";
$mensaje[PRODUCTO_ACTUALIZADO_OK] = "Producto actualizado correctamente.";
$mensaje[PRODUCTO_ACTUALIZADO_KO] = "Error al actualizar el producto.";

$mensaje[ERROR_GENERAL] = "Error General.";
?>
