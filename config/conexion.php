<?php
    //Clase para establecer la conexión de la BD usando PDO
    class Conectar{
        protected $dbhost; //Es una variable protegida, reconocida en su clase
        //funcion para conectar la BD
        protected function conexion(){
            try {
                //$conectar = $this -> dbhost = new PDO("mysql:host=localhost; dbname=ferreteria_apirest", "root","");
                $conectar = $this -> dbhost = new PDO("mysql:host=us-cdbr-east-06.cleardb.net; dbname=heroku_d39d9e406f46c4e", "b0987d2e30c092","e5be8d0c");
                return $conectar;
            } catch (Exception $e) {
                print "¡¡¡Error!!!".$e -> getMessage()." <br>";
                die();
            }
        }
        //Función para la codificación de los caracteres UTF8
        public function set_names(){
            return $this -> dbhost -> query("SET NAMES 'utf8'");
        }
    }
?>