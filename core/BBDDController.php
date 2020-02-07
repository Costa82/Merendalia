<?php
require_once 'Connection.php';

abstract class BBDDController {

	abstract protected function __construct();

	abstract protected function getById($id);

	/************ MÉTODOS COMUNES ************/

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

	public function getAll($tabla, $conexion)
	{
		$consulta = "SELECT * FROM " . $tabla . " WHERE estado = 'ACTV'";
		return BBDDController::ejecutarQuery($conexion, $consulta);
	}

	public function getBy($tabla, $conexion, $column, $value)
	{
		$sql = "SELECT * FROM " . $tabla . " WHERE $column = '$value'";

		if ($conexion->real_query($sql)) {
			if ($resul = $conexion->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}

}
