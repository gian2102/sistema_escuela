<?php
    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $cur_id = $_POST['cur_id'];

    $sql = "DELETE FROM tb_curso WHERE cur_id='$cur_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './cursos.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>