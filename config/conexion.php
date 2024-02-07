<?php
/**
 * Clase para manejar la conexión a la base de datos.
 */
class Conectar{
    /** @var PDO $dbh La instancia de PDO para la conexión a la base de datos. */
    protected $dbh;

    /**
     * Establece la conexión a la base de datos.
     * @return PDO La instancia de PDO para la conexión establecida.
     */
    protected function conexion(){
        try{
            $conectar = $this->dbh = new PDO('mysql:host=localhost;dbname=andercode_webservice','root','');
            return $conectar;
        }catch(Exception $e){
            print "Error en la conexión" . $e->getMessage() ."<br/>";
            die();
        }
    }

    /**
     * Establece la codificación de caracteres a utf8 para la conexión.
     * @return PDOStatement|false Retorna el resultado de la consulta SET NAMES 'utf8'.
     */
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
