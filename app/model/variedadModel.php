<?php

class variedadModel{

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_pasteleria;charset=utf8', 'root', '');
    }

    public function getAllVarieties() {
        // La conexion a la DB ya esta abierta arriba en el constructor

        // 2. ejecuto la sentencia, traigo todo lo de la tabla variedad
        $query = $this->db->prepare("SELECT * FROM variedad");
        $query->execute();

        // 3. obtengo los resultados
        $variedades = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $variedades;
    }

    function addVariedad($nombre_variedad){
        $sentencia = $this->db->prepare("INSERT INTO variedad(nombre_variedad) VALUES(?)");
        $sentencia->execute(array($nombre_variedad));
    }

    function getTableOfVariedades(){
        $sentencia = $this->db->prepare('SELECT * FROM variedad');
        $sentencia->execute(array());
        $tablaVariedades = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $tablaVariedades;
    }

    public function deleteVariedad($id_variedad){
        $sentencia = $this->db->prepare("DELETE FROM variedad WHERE id_variedad=?");
        $sentencia->execute(array($id_variedad));
    }

    public function editVariedad($nombre_variedad, $id_variedad){
        $sentencia = $this->db->prepare("UPDATE `variedad` SET `nombre_variedad`=? WHERE `id_variedad`=?");
        $sentencia->execute(array($nombre_variedad, $id_variedad));
    }
    
}