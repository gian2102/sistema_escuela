<?php
include("../conexion.php");
$con = conectar();

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

$sql = "SELECT * FROM tb_usuario where us_usuario = '$usuario' and us_contra = '$contra'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
if ($row['us_privilegio'] == '1') {
    if ($query) {
        $url = '../extensiones/menu_principal.php?us_id=' . '' . $row['us_id'];
        header('Location: ' . $url);

    }
} elseif ($row['us_privilegio'] == '2') {
    if ($query) {
        $url = '../extensiones/menu_principal.php?us_id=' . '' . $row['us_id'];
        header('Location: ' . $url);
    }
}
?>