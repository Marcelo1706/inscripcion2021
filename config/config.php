<?php
class Configuracion{

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $res_url;

    public function __construct()
    {
        $this->host = "localhost";
        $this->dbname = "inscrip2_inscripcion2021";
        $this->username = "inscrip2_inscripcion2021";
        $this->password = ',@Y9(HB0MDF$vM.6L_';
    }

    public function __get($name){
        switch($name){
            case "host":
                return $this->gethost();
            break;
            case "dbname":
                return $this->getdbname();
            break;
            case "username":
                return $this->getusername();
            break;
            case "password":
                return $this->getpassword();
            break;
            case "res_url":
                return $this->getres_url();
            break;
            default: 
                return "No existe esa variable";
            break;
        }
    }

    public function __set($name,$value){
        switch($name){
            case "host":
                return $this->sethost($value);
            break;
            case "dbname":
                return $this->setdbname($value);
            break;
            case "username":
                return $this->setusername($value);
            break;
            case "password":
                return $this->setpassword($value);
            break;
            case "res_url":
                return $this->setres_url($value);
            break;
            default: 
                return "No existe esa variable";
            break;
        }
    }

    //Getters
    private function gethost(){
        return $this->host;
    }

    private function getdbname(){
        return $this->dbname;
    }

    private function getusername(){
        return $this->username;
    }

    private function getpassword(){
        return $this->password;
    }

    private function getres_url(){
        return $this->res_url;
    }

    //Setters
    private function sethost($value){
        $this->host = $value;
    }

    private function setdbname($value){
        $this->dbname = $value;
    }

    private function setusername($value){
        $this->username = $value;
    }

    private function setpassword($value){
        $this->password = $value;
    }

    private function setres_url($value){
        $this->res_url = $value;
    }
}

?>