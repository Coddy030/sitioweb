<?php 
    session_start();
    if(!$_SESSION['codigo']){
        header('location:login.php');
    }
?>
<h1>Bienvenido <?php echo ucfirst($_SESSION['nombre']); ?></h1>
<?php include("template/cabecera.php");?>

<?php include 'cabecerav.php' ?>
<?php 
    include_once "conexion.php";
    $sentencia = $bd -> query("select * from vehiculo");
    $vehiculo = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($vehiculo);
?>
      <div class="container mt-5">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <!-- Inicio alerta -->
                  <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php 
                  }
                  ?>

                  <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Registrado!</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php 
                  }
                  ?>

                  <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                  ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Vuelve a intentarlo.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php 
                  }
                  ?>

                  <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Editado!!</strong> Los datos fueron actualizados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php 
                  }
                  ?>

                  <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
                  ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Eliminado!!</strong> Los datos fueron eliminados.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php 
                  }
                  ?>
                  <!-- Final alerta -->
                  <div class="card">
                      <div class="card-header bg-warning">
                          Lista de vehiculos
                      </div>
                      <div class="p-4">
                          <table class="table aling-middle">
                              <thead>
                                  <tr>
                                      <th scope="col">Placa</th>
                                      <th scope="col">Codigo</th>
                                      <th scope="col">Modelo</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Descripcion</th>
                                      <th scope="col">Ingreso</th>
                                      <th scope="col">Salida</th>
                                      <th scope="col" colspan="2">Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php 
                                    foreach($vehiculo as $dato){

                                  ?>
                                  <tr>
                                      <td scope="row"><?php echo $dato->placa; ?></td>
                                      <td><?php echo $dato->codigo; ?></td>
                                      <td><?php echo $dato->modelo; ?></td>
                                      <td><?php echo $dato->color; ?></td>
                                      <td><?php echo $dato->descripcion; ?></td>
                                      <td><?php echo $dato->ingreso; ?></td>
                                      <td><?php echo $dato->salida; ?></td>
                                      <td><a href="editar.php?placa=<?php echo $dato->placa;?>" class="text-success"><i class="bi bi-pencil-square"></a></i></td>
                                      <td><a href="eliminar.php?placa=<?php echo $dato->placa;?>" class="text-danger"><i class="bi bi-trash"></a></i></td>
                                      
                                  </tr>
                                  <?php 
                                  }
                                  ?>
                              </tbody>
                          </table>
                          
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card">
                      <div class="card-header bg-warning">
                          Ingresar datos:
                      </div>
                      <form class="p-4" method="POST" action="registrar.php">
                          <div class="mb-3">
                              <label class="form-label">Placa:</label>
                              <input type="text" class="form-control" name="txtPlaca" autofocus required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Codigo:</label>
                              <input type="text" class="form-control" name="txtCodigo" autofocus required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Modelo:</label>
                              <input type="text" class="form-control" name="txtModelo" autofocus required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Color:</label>
                              <input type="text" class="form-control" name="txtColor" autofocus required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Descripcion:</label>
                              <input type="text" class="form-control" name="txtDescripcion" autofocus required>
                          </div>
                          <div class="mb-3">
                              <label class="form-label">Salida:</label>
                              <input type="datetime" class="form-control" name="txtSalida" autofocus required>
                          </div>
                          <div class="d-grid">
                              <input type="hidden" name="oculto" value="1">
                              <input type="submit" class="btn btn-primary" value="Registrar">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

<?php include 'piev.php' ?>
