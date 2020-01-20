<?php
require_once 'Connection.php';

abstract class BBDDController {
	
	abstract protected function __construct();
	
	abstract protected function getById($id);
	
	abstract protected function getAll();
	
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

}