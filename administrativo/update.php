<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $id_us = $_POST['id_us'];
 
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    $privilegio = $_POST['privilegio'];

    $sql = "UPDATE tb_usuario SET us_nombre='$nombre',us_telf='$telefono',us_usuario='$usuario',us_contra='$contra',us_privilegio='$privilegio' WHERE us_id='$id_us'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './administradores.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>