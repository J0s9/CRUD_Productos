<?php
    class Conectar{
        private $dbh;

        protected function Conexion(){
        try{
            $conectar = $this->dbh = new PDO("pgsql:dbname=postgres;host=localhost;","postgres","123");
            return $conectar;

        }catch(Exception $e){
            print "ERROR EN LA CONEXIÓN EN LA BD".$e->getMessage()."<br/>";
            die();
        }
    }
}
?>