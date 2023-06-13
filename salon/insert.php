<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $grado = $_POST['grado'];
    $seccion   = $_POST['seccion'];
    $capacidad = $_POST['capacidad'];
    $docente = $_POST['docente'];
    $horario = $_POST['horario'];
    $curso = $_POST['curso'];


    $sql="INSERT INTO tb_salon VALUES
    (NULL,'$grado','$seccion','$capacidad','$docente','$horario','$curso')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './salones.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>