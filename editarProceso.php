<?php 
//print_r($_POST);
    if(!isset($_POST['placa'])){
        header('Location:vehiculo.php?mensaje=error');
    }
    include 'conexion.php';
    $placa = $_POST['placa'];
    $modelo = $_POST['txtModelo'];
    $color = $_POST['txtColor'];
    $descripcion = $_POST['txtDescripcion'];
    $salida = $_POST['txtSalida'];

    $sentencia = $bd->prepare("UPDATE vehiculo SET modelo = ?, color = ?, descripcion = ?, salida = ? WHERE vehiculo.placa = ?;");
    $resultado = $sentencia->execute([$modelo, $color, $descripcion, $salida, $placa]);
    if ($resultado === TRUE) {
        //echo "ok";
        header('Location:vehiculo.php?mensaje=editado');
    } else {
        //echo "no";
        header('Location:vehiculo.php?mensaje=error');
    }
    
?>