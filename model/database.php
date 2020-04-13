<?php
class Database{
   
    public static function conexionDB()
    {
        try{
            $dbconexion = new PDO('mysql:host=localhost;dbname=tienda;charset=utf8', 'root', '');
            $dbconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        } catch (Exception $ex) {
           echo "ERROR: " . $ex->getMessage();
        }
        
        return $dbconexion;
    }
}