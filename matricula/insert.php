<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $sal_grado = $_POST['sal_grado'];
    $sal_seccion = $_POST['sal_seccion'];
    $est_id = $_POST['est_id'];


    $sql="INSERT INTO tb_matricula VALUES(NULL,'$sal_grado','$sal_seccion','$est_id')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './matriculas.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>