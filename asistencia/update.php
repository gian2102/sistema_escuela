<?php

    include("conexion.php");
    $con = conectar();

    $id = $_POST['id'];

    $alumno_id = $_POST['alumno_id']; 
 
    $alumno_id = $_POST['Alumno_id']; 
    $fecha = $_POST['Fecha'];
    $asistencia = $_POST['Asistencia'];
    $observacion = $_POST['Observacion'];

    $sql = "UPDATE tb_asistencia SET do_nombre='$nombres',do_apellido='$apellidos',do_dni='$dni',do_fecha_nac='$fech_nac',do_domicilio='$domicilio',do_genero='$genero',do_fecha_contrat='$fech_contrat',do_fech_fin_contrat='$fech_fin_contrat',do_especialidad='$especialidad' WHERE alumno_id='$alumno_id'";
    $query = mysqli_query($con, $sql);

    if($query){
        $url = './asistencias.php?us_id='. $id;
        header('Location: ' . $url);
        
    }else {
    }
?>