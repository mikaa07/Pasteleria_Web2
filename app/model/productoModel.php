<?php

class productoModel{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_pasteleria;charset=utf8', 'root', '');
    }

    public function getAllProducts() {
        // La conexion a la DB esta abierta arriba en el constructor
       
        // 2. ejecuto la sentencia, me traigo todo de la tabla producto
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();

        // 3. obtengo los resultados
        $productos = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $productos;
    }

    function getVariedad(){
        $sentencia = $this->db->prepare('SELECT id_variedad FROM variedad');
        $sentencia->execute(array());
        $variedades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $variedades;
    }

    function  addProducto($nombre_producto, $precio, $variedad){
        $sentencia = $this->db->prepare("INSERT INTO producto(nombre_producto,precio,id_variedad) VALUES(?,?,?)");
        $sentencia->execute(array($nombre_producto, $precio, $id_variedad));

    }

    function getTableProducto()
    {
        $sentencia = $this->db->prepare('SELECT * FROM producto');
        $sentencia->execute(array());
        $tablaProductos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaProductos;
    }
    

    public function searchIdVariedadByTableProductos($id_variedad){
        $sentencia = $this->db->prepare("SELECT id_variedad FROM producto WHERE id_variedad=?");
        $sentencia->execute(array($id_variedad));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteProducto($id_producto){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $sentencia->execute(array($id_producto));
    }

    public function editProducto($nombre_producto, $precio, $id_producto, $id_variedad){
        $sentencia = $this->db->prepare("UPDATE `producto` SET `nombre_producto`=?,`precio`=?,`id_producto`=? WHERE `id_variedad`=?");
        $sentencia->execute(array($nombre_producto, $precio, $id_producto, $id_variedad));
    }
    
}