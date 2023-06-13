<?php
    include("conexion.php");
    $con=conectar();

    $id = $_POST['id'];

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fech_nac = $_POST['fech_nac'];
    $domicilio = $_POST['domicilio'];   
    $genero = $_POST['genero'];
    $fech_contrat = $_POST['fech_contrat'];
    $fech_fin_contrat = $_POST['fech_fin_contrat'];
    $especialidad = $_POST['especialidad'];


    $sql="INSERT INTO tb_docente VALUES(NULL,'$nombres','$apellidos','$dni','$fech_nac','$domicilio','$genero','$fech_contrat','$fech_fin_contrat','$especialidad')";
    $query= mysqli_query($con,$sql);

    if($query){
        $url = './docentes.php?us_id='. $id;
        header('Location: ' . $url);
    }else {
    }
?>