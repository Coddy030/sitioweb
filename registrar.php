
<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtPlaca"]) || empty($_POST["txtCodigo"]) || empty($_POST["txtModelo"]) || empty($_POST["txtColor"]) || empty($_POST["txtDescripcion"]) || empty($_POST["txtSalida"])){
        header('Location:vehiculo.php?mensaje=falta');
        exit();
    }
    include_once 'conexion.php';
    $placa = $_POST['txtPlaca'];
    $codigo = $_POST['txtCodigo'];
    $modelo = $_POST['txtModelo'];
    $color = $_POST['txtColor'];
    $descripcion = $_POST['txtDescripcion'];
    $salida = $_POST['txtSalida'];

    $sentencia = $bd->prepare("INSERT INTO vehiculo(placa,codigo,modelo,color,descripcion,salida) VALUES(?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$placa,$codigo,$modelo,$color,$descripcion,$salida]);

    if ($resultado === TRUE) {
        header('Location: vehiculo.php?mensaje=registrado');
    } else {
        header('Location:vehiculo.php?mensaje=error');
        exit();
    }
    
?>