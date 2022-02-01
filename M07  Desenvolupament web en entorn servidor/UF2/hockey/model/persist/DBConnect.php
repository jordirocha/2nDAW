<?php
class DBConnect
{
    //atributs 
    private $dsn = "mysql:host=localhost;dbname=minerva_db";
    private $user = "minerva";
    private $password = "minerva";
    private $dbh;
    private static $_instance;

    public function __construct()
    {
        $this->connect();
    }

    private function __clone()
    {
    }

    //el metode per dirigir-me al constructor
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    //mètode que necessitem per connectar-nos des dels altres
    //mètodes
    private function connect()
    {
        $flag = true;

        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            $flag = false;
        }
        return $flag;
    }

    //ens desconnectem de la base de dades
    private function disconnect()
    {
        $this->dbh = null;
    }



    public function myQuery($sql, $vector)
    {
        $sentencia = null;
        //select, insert, update,delete
        if ($this->connect()) {

            try {
                $sentencia = $this->dbh->prepare($sql);
            } catch (PDOException $e) {
            }

            if ($sentencia->execute($vector) != false) {
                $this->disconnect();
            }
        }

        return $sentencia;
    }
}
