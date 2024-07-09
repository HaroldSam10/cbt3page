<?php
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
session_start();
$_SESSION['usuario'] = $usuario;

include('conexion.php');

// Usar sentencias preparadas para evitar inyecciones SQL
$consulta = "SELECT * FROM login WHERE usuario = ? AND contraseña = ?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("ss", $usuario, $contra);
$stmt->execute();
$resultado = $stmt->get_result();

$filas = $resultado->num_rows;

if ($filas) {
    header("Location: addir.php");
} else {
    include("directorio.php");
}

$stmt->free_result();
$stmt->close();
$conexion->close();
?>

