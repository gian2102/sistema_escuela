<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $id_us = $_POST['id_us'];

    $sql = "DELETE FROM tb_usuario WHERE us_id='$id_us'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './administradores.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>