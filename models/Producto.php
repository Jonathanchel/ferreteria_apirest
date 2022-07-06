<?php
//Archivo que contiene los querys necesarios para recuperar los datos de las tablas
//Clase general para los productos
class Producto extends Conectar{
    // Método que recupera TODOS los productos de la tabla 
    // Donde su estado es 1
    public function get_producto(){
        $conectar = parent:: Conexion();
        parent:: set_names();
        $sql = "SELECT id, nombre,marca,descripcion,precio FROM productos WHERE estado=1";
        $sql = $conectar -> prepare($sql);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
    //Método que recupera un solo dato de la tabla
    public function get_producto_id($id_producto){
        $conectar = parent:: Conexion();
        parent:: set_names();
        $sql = "SELECT id, nombre,marca,descripcion,precio FROM productos WHERE estado=1 AND id=?";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1,$id_producto);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
    //Insertar un nuevo producto
    public function insert_producto($nombre, $marca, $descripcion, $precio){
        $conectar = parent:: Conexion();
        parent:: set_names();
        $sql = "INSERT INTO productos (id, nombre, marca, descripcion, precio, estado) VALUES (NULL, ?, ?, ?, ?, '1')";
        $sql = $conectar -> prepare($sql);
        $sql -> bindValue(1,$nombre);
        $sql -> bindValue(2,$marca);
        $sql -> bindValue(3,$descripcion);
        $sql -> bindValue(4,$precio);
        $sql -> execute();
        return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }
        //Actualizar un nuevo producto
        public function update_producto($id,$nombre, $marca, $descripcion, $precio){
            $conectar = parent:: Conexion();
            parent:: set_names();
            $sql = "UPDATE productos SET nombre = ?, marca = ?, descripcion = ?, precio = ? WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1,$nombre);
            $sql -> bindValue(2,$marca);
            $sql -> bindValue(3,$descripcion);
            $sql -> bindValue(4,$precio);
            $sql -> bindValue(5,$id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        //Borrar un nuevo producto logicamente
        public function delete_producto($id){
            $conectar = parent:: Conexion();
            parent:: set_names();
            $sql = "UPDATE productos SET estado = 0 WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1,$id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        public function kill_producto($id){
            $conectar = parent:: Conexion();
            parent:: set_names();
            $sql = "DELETE FROM productos WHERE id = ?";
            $sql = $conectar -> prepare($sql);
            $sql -> bindValue(1,$id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        public function get_Sucursales(){
            $conectar = parent:: Conexion();
            parent:: set_names();
            $sql = "SELECT * FROM sucursales";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        
}

?>