<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $Nombre = $_POST['Nombre'];
    $Apellidos   = $_POST['Apellidos'];
    $Apoderado = $_POST['Apoderado'];
    $Telefono = $_POST['Telefono'];
    $Fechanac = $_POST['Fechanac'];


    $sql="INSERT INTO tb_estudiante VALUES(NULL,'$Nombre','$Apellidos','$Apoderado','$Telefono','$Fechanac')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './estudiantes.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>