<?php

// Validaciones usuario
define("USER_NOEXIS", 201);   // El usuario no está registrado
define("CLAVE_NOEXIS", 202);  // La contraseña es incorrecta

// Validaciones Productos
define("PRODUCTO_SUBIDO_OK", 601); //Producto subido correctamente.
define("PRODUCTO_SUBIDO_KO", 602); //Error al subir el producto.
define("PRODUCTO_SUBIDO_KO_TITLE_ALT", 603); //No se puede subir imagen sin title o alt.
define("ERROR_SUBIDA_IMAGEN_MOVER_ARCHIVO", 604); //Error al mover el archivo.
define("ERROR_SUBIDA_IMAGEN_CREACION_CARPETA", 605); //Error al crear la carpeta.
define("ERROR_SUBIDA_IMAGEN_FORMATO_INCORRECTO", 606); //Imagen con formato incorrecto.

// Error general
define("ERROR_GENERAL", 1000); //Error General

// Definiciones
$mensaje[USER_NOEXIS] = "El usuario no está registrado.";
$mensaje[CLAVE_NOEXIS] = "La contraseña es incorrecta";

$mensaje[PRODUCTO_SUBIDO_OK] = "Producto subido correctamente.";
$mensaje[PRODUCTO_SUBIDO_KO] = "Error al subir el producto.";
$mensaje[PRODUCTO_SUBIDO_KO_TITLE_ALT] = "No se puede subir imagen sin title o alt.";
$mensaje[ERROR_SUBIDA_IMAGEN_MOVER_ARCHIVO] = "Error al mover el archivo.";
$mensaje[ERROR_SUBIDA_IMAGEN_CREACION_CARPETA] = "Error al crear la carpeta.";
$mensaje[ERROR_SUBIDA_IMAGEN_FORMATO_INCORRECTO] = "Imagen con formato incorrecto.";

$mensaje[ERROR_GENERAL] = "Error General.";
?>
