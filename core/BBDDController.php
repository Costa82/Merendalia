<?php
require_once 'Connection.php';

abstract class BBDDController {

	abstract protected function __construct();

	abstract protected function getById($id);

	/************ MÉTODOS COMUNES ************/

	/**
	 * Ejecutamos la query
	 * 
	 * @param unknown_type $conexion
	 * @param unknown_type $consulta
	 */
	public function ejecutarQuery($conexion, $consulta) {
			
		$resultado = $conexion->query($consulta);

		if ($resultado->num_rows != 0) {
			while ($row = $resultado->fetch_assoc()) {
				$rows[] = $row;
			}
			$datos = array(
	                'numero' => $resultado->num_rows,
	                'filas_consulta' => $rows
			);
			return $datos;
		} else {
			return $datos = array(
	                'numero' => 0
			);
		}
	}

	/**
	 * Sacamos todos los valores de la tabla
	 * 
	 * @param unknown_type $tabla
	 * @param unknown_type $conexion
	 */
	public function getAll($tabla, $conexion)
	{
		$consulta = "SELECT * FROM " . $tabla . " WHERE estado = 'ACTV'";
		return BBDDController::ejecutarQuery($conexion, $consulta);
	}

	/**
	 * Buscamos todos los resultados por columna y valor
	 * 
	 * @param unknown_type $tabla
	 * @param unknown_type $conexion
	 * @param unknown_type $column
	 * @param unknown_type $value
	 */
	public function getBy($tabla, $conexion, $column, $value)
	{
		$sql = "SELECT * FROM " . $tabla . " WHERE " . $column . " = '" . $value . "'";

		if ($conexion->real_query($sql)) {
			if ($resul = $conexion->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}
	
    /**
     * Buscamos un campo específico de la tabla por columna y valor
     * 
     * @param unknown_type $tabla
     * @param unknown_type $conexion
     * @param unknown_type $campo
     * @param unknown_type $column
     * @param unknown_type $value
     */
    public function getCampoBy($tabla, $conexion, $campo, $column, $value)
    {
        $sql = "SELECT " . $campo . " FROM " . $tabla . " WHERE " . $column . " = '" . $value . "'";
        
        if ($conexion->real_query($sql)) {
            if ($resul = $conexion->store_result()) {
                $mostrar = $resul->fetch_assoc();
                
                return $mostrar[$campo];
            }
        } else {
            echo $conexion->errno . " -> " . $conexion->error;
        }
    }

}
