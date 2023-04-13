<?php 
    $conexion=null;
    $servidor="localhost";
    $db="DB_PROYECTO";
    $usuario="root";
    $pass="";
    try{
        $conexion=new PDO ("mysql:host=$servidor;dbname=$db",$usuario,$pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $prueba_conexion = "Conexion realizada satisfactoriamente";
    }
    catch(PDOException $e){
        echo "La conexion ha fallado: ".$e->getMessage();
    }
    return $conexion;
    //$conexion=null;
?>