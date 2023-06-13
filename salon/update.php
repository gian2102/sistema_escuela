<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $sal_id = $_POST['sal_id'];
 
    $sal_grado = $_POST['grado'];
    $sal_seccion = $_POST['seccion'];
    $sal_capacidad = $_POST['capacidad'];
    $doc_id = $_POST['doc_id'];
    $hor_id = $_POST['hor_id'];
    $cur_id = $_POST['cur_id'];

    $sql = "UPDATE tb_salon SET sal_grado='$sal_grado',sal_seccion='$sal_seccion',sal_capacidad='$sal_capacidad',doc_id='$doc_id',hor_id='$hor_id',cur_id='$cur_id' WHERE sal_id='$sal_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './salones.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>