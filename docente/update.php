<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $do_id = $_POST['do_id'];
 
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $fech_nac = $_POST['fech_nac'];
    $domicilio = $_POST['domicilio'];   
    $genero = $_POST['genero'];
    $fech_contrat = $_POST['fech_contrat'];
    $fech_fin_contrat = $_POST['fech_fin_contrat'];
    $especialidad = $_POST['especialidad'];

    $sql = "UPDATE tb_docente SET do_nombre='$nombres',do_apellido='$apellidos',do_dni='$dni',do_fecha_nac='$fech_nac',do_domicilio='$domicilio',do_genero='$genero',do_fecha_contrat='$fech_contrat',do_fech_fin_contrat='$fech_fin_contrat',do_especialidad='$especialidad' WHERE do_id='$do_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './docentes.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>