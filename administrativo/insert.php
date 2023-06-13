<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $nombre = $_POST['Nombre'];
    $telefono = $_POST['Telefono'];
    $usuario = $_POST['Usuario'];
    $contra = $_POST['Contra'];
    $privilegio = $_POST['Privilegio'];


    $sql="INSERT INTO tb_usuario VALUES(NULL,'$usuario','$contra','$nombre','$telefono','$privilegio')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './administradores.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>