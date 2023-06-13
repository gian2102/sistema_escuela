<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $Bloque = $_POST['Bloque'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];

    $sql="INSERT INTO tb_horario VALUES(NULL,'$Bloque','$inicio','$fin')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './horarios.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>