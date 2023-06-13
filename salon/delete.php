<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $sal_id = $_POST['sal_id'];

    $sql = "DELETE FROM tb_salon WHERE sal_id='$sal_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './salones.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>