<?php 

class DataBase{

    const server ="localhost";
    const userDb = "root";
    const passwordDb = "root";
    const nombreDb = "crudstore";

    public static function Conect() {
        try{
            $conexion = new PDO("mysql:host=".self::server.";dbname=".self::nombreDb.";charset=utf8",self::userDb,self::passwordDb);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }catch(PDOException $e){
            return "Fallo ".$e->getMessage();
        }

    }

}

?>