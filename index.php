<?php
//Archivo de configuración.
require_once("config/config.php");

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';
if ($url == '/'){
    require_once("includes/header.php");
    require_once("views/inicio.php");
    require_once("includes/footer.php");
}else{
    // 0 => carpeta/entidad, 1 => archivo
    $carpeta = $url[0];
    $archivo = isset($url[1]) ? $url[1] : null;
    if($carpeta != 'ajax'){
        require_once("includes/header.php");
        if($archivo == null){
            if(file_exists("views/".$carpeta."/index.php")){
                require_once("views/".$carpeta."/index.php");
            }else{
                require_once("404.php");
            }
        }else{
            if(file_exists("views/".$carpeta."/".$archivo.".php")){
                require_once("views/".$carpeta."/".$archivo.".php");
            }else{
                require_once("404.php");
            }
        }
        require_once("includes/footer.php");
    }else{
        if($archivo == null){
            if(file_exists("views/".$carpeta."/index.php")){
                require_once("views/".$carpeta."/index.php");
            }else{
                require_once("404.php");
            }
        }else{
            if(file_exists("views/".$carpeta."/".$archivo.".php")){
                require_once("views/".$carpeta."/".$archivo.".php");
            }else{
                require_once("404.php");
            }
        }
    }
}
?>