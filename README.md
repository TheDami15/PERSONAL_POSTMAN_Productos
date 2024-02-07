# **Descripción del Proyecto**
Este repositorio contiene un proyecto que proporciona servicios para gestionar categorías y productos a través de una API RESTful. Los servicios se pueden consumir mediante una aplicación como Postman para probar su funcionalidad.

# **Archivos del Proyecto**
**conexion.php:** Este archivo establece la conexión a la base de datos utilizando PDO (PHP Data Objects). Es necesario para interactuar con la base de datos.

**Categorias.php:** Contiene la clase Categoria, que maneja las operaciones relacionadas con las categorías y los productos. Proporciona métodos para obtener todas las categorías, obtener una categoría por su ID, insertar una nueva categoría, actualizar una categoría existente y eliminar una categoría.

**categoria.php:** Este archivo consume los servicios de categoría proporcionados por la clase Categoria en el archivo Categorias.php.

**productos.php:** Este archivo consume los servicios de productos proporcionados por la clase Categoria en el archivo Categorias.php.

# **Uso**
Para utilizar los servicios proporcionados por este proyecto, se puede utilizar una aplicación como Postman para enviar solicitudes HTTP a las URL correspondientes a los archivos categoria.php y productos.php. Las solicitudes pueden ser de tipo GET, POST, PUT o DELETE según la acción que se desee realizar.

# **Notas**
Este proyecto está diseñado para ser una API simple para la gestión de categorías y productos. Se recomienda revisar y comprender los archivos de código fuente para un uso correcto de la API. Los servicios pueden ser utilizados en aplicaciones web o móviles para administrar datos relacionados con categorías y productos en una base de datos.
