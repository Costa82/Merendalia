<?php
require_once 'Connection.php';

class Usuarios {
    
    // Propiedades de la tabla de la BBDD
    public $nick;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $email;
    public $password;
    public $fecha_registro;
    public $fecha_ultima_actualizacion;
    public $tipo_usuario;
    public $newsletter;
    public $estado;
    
    /**
     * comprobamos si existe algún usuario cuyo nombre de usuario codificado con md5 coincida con la cookie pasada como parámetro
     *
     * @param
     *            $valor_cookie
     * @return Boolean
     */
    public function comprobar_cookie($valor_cookie)
    {
        $this->query = "select * from usuarios where md5(email) = '$valor_cookie'";
        $this->get_results_from_query();
        if (count($this->rows) == 1)
            return $this->rows[0]['email'];
        else
            return false;
    }
    
}