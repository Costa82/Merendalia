<?php

/**
 * Clase UtilsProductos para los productos
 */
class UtilsProductos {

	/**
	 * Guardamos la imagen en la carpeta de destino
	 * @param string $carpetaDestino
	 * @param string $archivo
	 */
	public static function guardarImagen($carpetaDestino, $archivo) {

		$guardado = false;

		# si es un formato de imagen
		if($archivo["type"]=="image/jpeg" || $archivo["type"]=="image/pjpeg" ||
		$archivo["type"]=="image/png")
		{
			# si exsite la carpeta o se ha creado
			if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
			{
				$origen=$archivo["tmp_name"];
				$destino=$carpetaDestino.$archivo["name"];

				# movemos el archivo
				if(@move_uploaded_file($origen, $destino))
				{
					$guardado = true;
				}else{
						
					// Error al mover el archivo
					$_SESSION['error'] = 604;
					$guardado = false;
				}
			}else{

				// Error al crear la carpeta
				$_SESSION['error'] = 605;
				$guardado = false;
			}
		}else{
				
			// Error en el formato del fichero
			$_SESSION['error'] = 606;
			$guardado = false;
		}

		return $guardado;
	}

}
