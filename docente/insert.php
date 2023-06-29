<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];

    $sql="INSERT INTO tb_docente VALUES(NULL,'$nombres','$apellidos','$dni','$fech_nac','$domicilio','$genero','$fech_contrat','$fech_fin_contrat','$especialidad')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>