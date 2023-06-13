<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $mat_id = $_POST['mat_id'];
 
    $grado = $_POST['grado'];
    $seccion = $_POST['seccion'];
    $est_id = $_POST['est_id'];

    $sql = "UPDATE tb_matricula SET grado='$grado',seccion='$seccion', est_id='$est_id' WHERE mat_id='$mat_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './matriculas.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>