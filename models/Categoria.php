<?php
/**
 * Clase para manejar las operaciones relacionadas con la tabla de categorías en la base de datos.
 */
class Categoria extends Conectar{
    /**
     * Obtiene todas las categorías activas de la base de datos.
     * @return array Un array de categorías.
     */
    public function get_categoria(){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="SELECT * FROM tm_categoria WHERE est=1";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }

    /**
     * Obtiene una categoría específica por su ID.
     * @param int $cat_id El ID de la categoría a obtener.
     * @return array Un array que representa la categoría.
     */
    public function get_categoria_x_id($cat_id){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="SELECT * FROM tm_categoria WHERE est=1 AND cat_id = ?";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->bindValue(1,$cat_id);
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }

    /**
     * Inserta una nueva categoría en la base de datos.
     * @param string $cat_nom El nombre de la categoría.
     * @param string $cat_obs La descripción de la categoría.
     * @return array El resultado de la operación.
     */
    public function insert_categoria($cat_nom,$cat_obs){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_obs, est) VALUES (NULL, ? , ? , '1');";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }

    /**
     * Actualiza una categoría en la base de datos.
     * @param int $cat_id El ID de la categoría a actualizar.
     * @param string $cat_nom El nuevo nombre de la categoría.
     * @param string $cat_obs La nueva descripción de la categoría.
     * @return array El resultado de la operación.
     */
    public function update_categoria($cat_id,$cat_nom,$cat_obs){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="UPDATE tm_categoria set cat_nom = ?, cat_obs = ? WHERE cat_id = ?";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->bindValue(1,$cat_nom);
        $sql->bindValue(2,$cat_obs);
        $sql->bindValue(3,$cat_id);
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }

    /**
     * Elimina una categoría cambiando su estado a inactivo en la base de datos.
     * @param int $cat_id El ID de la categoría a eliminar.
     * @return array El resultado de la operación.
     */
    public function delete_categoria($cat_id){
        $conectar = parent::conexion(); // Llama a la cadena de conexión
        parent::set_names();
        $sql="UPDATE tm_categoria set est = '0' WHERE cat_id = ?";
        $sql=$conectar->prepare($sql); // Prepara la sentencia.
        $sql->bindValue(1,$cat_id);
        $sql->execute(); // Ejecuta la sentencia.
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC); // Devuelve un resultado.
    }
}

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
