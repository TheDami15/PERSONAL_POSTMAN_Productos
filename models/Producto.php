<?php
/**
 * Clase para manejar las operaciones relacionadas con la tabla de productos en la base de datos.
 */
class Producto extends Conectar{
    /**
     * Obtiene todos los productos de la base de datos.
     * @return array Un array de productos.
     */
    public function get_productos(){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="SELECT * FROM tm_producto";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }

    /**
     * Inserta un nuevo producto en la base de datos.
     * @param string $pro_nom El nombre del producto.
     * @param string $pro_obs La descripción del producto.
     * @param int $cat_id El ID de la categoría del producto.
     * @return array El resultado de la operación.
     */
    public function insert_producto($pro_nom,$pro_obs,$cat_id){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql= "INSERT INTO tm_producto (pro_id,pro_nom,pro_obs,cat_id) VALUES (NULL, ? , ? , ?);";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->bindValue(1,$pro_nom);
        $sql->bindValue(2,$pro_obs);
        $sql->bindValue(3,$cat_id);
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }
}
?>