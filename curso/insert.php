<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $Nombre = $_POST['Nombre'];


    $sql="INSERT INTO tb_curso VALUES(NULL,'$Nombre')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './cursos.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>