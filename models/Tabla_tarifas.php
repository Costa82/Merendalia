<?php
require_once 'abstract/AbstractBBDD.php';
require_once './config/Utils.php';

class Tabla_tarifas extends AbstractBBDD {

	// Propiedades de la tabla de la BBDD
	public $dia;
	public $sup;
	public $hora_cierre;
	public $precio_3_primeras_horas;
	public $precio_4_hora;
	public $orden;
	public $estado;

	protected $c;
	protected $tabla;

	public function __construct()
	{
		$bd = Connection::dameInstancia();
		$this->c = $bd->dameConexion();
		$this->tabla = "tabla_tarifas";
	}

	public function getById($dia) {
			
		$sql = "SELECT * FROM " . $this->tabla . " WHERE dia = " . $dia . "";

		if ($this->c->real_query($sql)) {
			if ($resul = $this->c->store_result()) {
				if ($resul->num_rows > 0) {
					return $resul->fetch_assoc();
				}
			}
		}
	}

	/**
	 * Recupera todos los títulos de la tabla
	 */
	public function getTitulosTabla()
	{
		$consulta = "SELECT * FROM titulo_tabla_tarifas WHERE estado = 'ACTV' ORDER BY orden ASC";
		return Tabla_tarifas::ejecutarQuery($consulta);
	}

	/**
	 * Muestra la tabla de las tarifas
	 */
	public function mostrarTablaTarifas() {
			
		$resultados = Tabla_tarifas::getAll();
		$resultados1 = Tabla_tarifas::getTitulosTabla();
			
		echo '<h3>Tarifas</h3>
				<p class="explicacion_tarifas">
					<sup>(*)</sup> Los horarios se pueden ver modificados por las medidas sanitarias
					tomadas por el Covid-19.
				</p>
				<table border="1">
					<tr>';

		// Línea de los títulos de la tabla
		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {

			for ($i = 0; $i < count($resultados1['filas_consulta']); $i ++) {
					
				echo '<td class="titulo_verde"><p>';

				foreach ($resultados1['filas_consulta'][$i] as $key => $value) {

					$linea = null;
						
					if ($key == "titulo") {
						$titulo = '<strong>' . $value . ' </strong>';
						$linea = $titulo;
					}
						
					if ($key == "sup") {
							
						if ($value != null && $value != '') {
							$sup = '<sup>(' . $value . ')</sup>';
							$linea = $linea.$sup;
						}
					}
						
					if ($key == "subtitulo") {
							
						if ($value != null && $value != '') {
							$subtitulo = '<p class="subtitulo">' . $value . '</p>';
							$linea = $linea.$subtitulo;
						}
					}
						
					echo $linea;
				}

				echo '</p></td>';
			}
		}
		echo '</tr>';

		// Líneas de datos
		if ($resultados == 0 || $resultados['numero'] == 0) {
			// No hay datos para mostrar
		} else {

			for ($i = 0; $i < count($resultados['filas_consulta']); $i ++) {
					
				echo '<tr>';

				foreach ($resultados['filas_consulta'][$i] as $key => $value) {

					$linea = null;
						
					if ($key == "dia") {
						$titulo = '<td class="titulo_amarillo">
									<p><strong>' . $value . '</strong>';
						$linea = $linea.$titulo;
					}

					if ($key == "sup") {
							
						if ($value != null && $value != '') {
							$sup = '<sup> (' . $value . ')</sup></p></td>';
							$linea = $linea.$sup;
						}
					}

					if ($key == "hora_cierre") {
						$hora_cierre = '<td><p>' . $value . '</p></td>';
						$linea = $linea.$hora_cierre;
					}

					if ($key == "precio_3_primeras_horas") {
						$precio_3_primeras_horas = '<td><p>' . $value . '</p></td>';
						$linea = $linea.$precio_3_primeras_horas;
					}

					if ($key == "precio_4_hora") {
						$precio_4_hora = '<td><p>' . $value . '</p></td>';
						$linea = $linea.$precio_4_hora;
					}

					echo $linea;
				}

				echo '</tr>';
			}
		}

		echo '</table>';
	}

}