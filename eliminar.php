<?php 
    if(!isset($_GET['placa'])){
        header('Location:vehiculo.php?mensaje=error');
        exit();
    }
    include 'conexion.php';
    $placa = $_GET['placa'];
    $sentencia = $bd->prepare("DELETE FROM vehiculo where vehiculo.placa = ?;");
    $resultado = $sentencia->execute([$placa]);

    if ($resultado ===TRUE) {
        header('Location:vehiculo.php?mensaje=eliminado');
    } else {
        header('Location:vehiculo.php?mensaje=error');
    }
    
?>