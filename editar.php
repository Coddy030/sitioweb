<?php 
    session_start();
    if(!$_SESSION['codigo']){
        header('location:login.php');
    }
?>
<h1>Bienvenido <?php echo ucfirst($_SESSION['nombre']); ?></h1>
<?php include("template/cabecera.php");?>

<?php include("cabecerae.php");?>

<?php 
    if(!isset($_GET['placa'])){
        header('Location:vehiculo.php?mensaje=error');
        exit();
    }
    include_once 'conexion.php';
    $placa = $_GET['placa'];
    $sentencia = $bd->prepare("select * from vehiculo where placa = ?;");
    $sentencia->execute([$placa]);
    $vehiculo = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($vehiculo);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
                    <div class="card">
                      <div class="card-header bg-warning">
                          Editar datos:
                      </div>
                      <form class="p-4" method="POST" action="editarProceso.php">
                          
                          <div class="mb-3">
                              <label class="form-label">Modelo:</label>
                              <input type="text" class="form-control" name="txtModelo" required value="<?php echo $vehiculo->modelo; ?>">
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Color:</label>
                              <input type="text" class="form-control" name="txtColor" required value="<?php echo $vehiculo->color; ?>">
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Descripcion:</label>
                              <input type="text" class="form-control" name="txtDescripcion" required value="<?php echo $vehiculo->descripcion; ?>">
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Salida:</label>
                              <input type="datetime" class="form-control" name="txtSalida" required value="<?php echo $vehiculo->salida; ?>">
                          </div>
                          <div class="d-grid">
                              <input type="hidden" name="placa" value="<?php echo $vehiculo->placa; ?>">
                              <input type="submit" class="btn btn-primary" value="Editar">
                          </div>
                      </form>
                  </div>
        </div>
    </div>
</div>
<?php include("piev.php");?>
