<?php
session_start();
require_once('config.php');
 
if(isset($_POST['submit']))
{
    if(isset($_POST['codigo'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['contrasenia']) && !empty($_POST['codigo']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['correo']) && !empty($_POST['contrasenia']))
    {
        $code = trim($_POST['codigo']); 
        $firstName = trim($_POST['nombre']);
        $lastName = trim($_POST['apellido']);
        $email = trim($_POST['correo']);
        $password = trim($_POST['contrasenia']);
        
        //$hashPassword = $password;
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'select * from usuario where correo = :correo';
            $stmt = $pdo->prepare($sql);
            $p = ['correo'=>$email];
            
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into usuario (codigo, nombre, apellido, correo, `contrasenia`, creado, modificado) values(:vcodigo,:vnombre,:vapellido,:correo,:contrasenia,:creado,:modificado)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':vcodigo'=>$code,
                        ':vnombre'=>$firstName,
                        ':vapellido'=>$lastName,
                        ':correo'=>$email,
                        ':contrasenia'=>$hashPassword,
                        ':creado'=>$date,
                        ':modificado'=>$date
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'Usuario creado correctamente!!';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $valCode = $code; 
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;
                
 
                $errors[] = 'el Email ya esta registrado';
            }
        }
        else
        {
            $errors[] = "el Email no es valido";
        }
    }
    else
    {
        if(!isset($_POST['codigo']) || empty($_POST['codigo']))
        {
            $errors[] = 'el codigo es requerido';
        }
        else
        {
            $valFirstName = $_POST['codigo'];
        }
        if(!isset($_POST['nombre']) || empty($_POST['nombre']))
        {
            $errors[] = 'el nombre es requerido';
        }
        else
        {
            $valFirstName = $_POST['nombre'];
        }
        if(!isset($_POST['apellido']) || empty($_POST['apellido']))
        {
            $errors[] = 'el apellido es requerido';
        }
        else
        {
            $valLastName = $_POST['apellido'];
        }
 
        if(!isset($_POST['correo']) || empty($_POST['correo']))
        {
            $errors[] = 'El correo es requerido';
        }
        else
        {
            $valEmail = $_POST['correo'];
        }
 
        if(!isset($_POST['contrasenia']) || empty($_POST['contrasenia']))
        {
            $errors[] = 'el Password es requerido';
        }
        else
        {
            $valPassword = $_POST['contrasenia'];
        }
        
    }
 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/stylesl.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrese!!</h3></div>
                                    <div class="card-body">
                                        <?php 
                                            if(isset($errors) && count($errors) > 0)
                                            {
                                                foreach($errors as $error_msg)
                                                {
                                                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                                                }
                                            }
                                            
                                            if(isset($success))
                                            {
                                                
                                                echo '<div class="alert alert-success">'.$success.'</div>';
                                            }
                                        ?>
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" name="codigo" id="inputCode" type="text" placeholder="name@example.com" />
                                                    <label for="inputCode">Codigo</label>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" name="nombre" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                            <label for="inputFirstName">Nombre</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input class="form-control" name="apellido" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                            <label for="inputLastName">Apellido</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="correo" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo Institucional</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="contrasenia" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Contraseña</label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Si esta registrado!! entrar</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Unifranz Ingenieria de Sistemas 2021</div>
                            
                               
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
