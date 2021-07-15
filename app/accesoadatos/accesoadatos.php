<?php
class AccesoDatos{
    private static $objAccesoDatos;
    private $objetoPDO;


    private function __construct()
    {
        try {
           
            //$this->objetoPDO = new PDO('mysql:host=remotemysql.com:3306;dbname=oPl5yOpaH6;charset=utf8', 'oPl5yOpaH6','vNDdAYfeGb',array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->objetoPDO = new PDO('mysql:host= localhost; dbname=usuarios ;charset=utf8', "root", '', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $this->objetoPDO->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error: " . $e->getMessage();
            die();
        }
    }

    public static function obtenerInstancia(){
        if (!isset(self::$objAccesoDatos)) {
            self::$objAccesoDatos = new AccesoDatos();
        }
        return self::$objAccesoDatos;
    }

    public function prepararConsulta($consultaSQL)
    {
        return $this->objetoPDO->prepare($consultaSQL);
    }

    public function obtenerUltimoId()
    {
        return $this->objetoPDO->lastInsertId();
    }

    public function __clone()
    {
        trigger_error('ERROR: La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}    
?>