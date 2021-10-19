<?php 
    session_start();
  
    if(!$_SESSION['codigo']){
        header('location:login.php');
    }
 
?>
<h1>Bienvenido <?php echo ucfirst($_SESSION['nombre']); ?></h1>

<?php include("template/cabecera.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bienvenido al Estacionamiento</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/stylesm.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Estacionamiento UNIFRANZ</h1>
                <img src="img/unifranz.png" alt="unifranz">
                <h3 class="mb-5"><em>Dicen que cuando llegues a la estación correcta comprenderás por que tanta veces "te dejo el tren".</em></h3>
                <a class="btn btn-primary btn-xl" href="vehiculo.php">Registrar vehiculo</a>
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-warning" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-6">
                        <h2>Mision</h2>
                        <p class="lead mb-3">
                        Forjar una Universidad transformadora comprometida a atraer y promover talento diverso y de clase mundial, creando un ambiente de alta colaboración que promueva el libre intercambio de ideas con el fin de impulsar la innovación, creatividad, investigación y alta capacidad de liderazgo para formar capital humano competitivo con valores éticos, morales y responsabilidad social.
                        </p>
                        
                    </div>
                </div>  
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-6">
                        <h2>Mision</h2>
                        <p class="lead mb-8">
                        Forjar una Universidad transformadora comprometida a atraer y promover talento diverso y de clase mundial, creando un ambiente de alta colaboración que promueva el libre intercambio de ideas con el fin de impulsar la innovación, creatividad, investigación y alta capacidad de liderazgo para formar capital humano competitivo con valores éticos, morales y responsabilidad social.
                        </p>
                        <a class="btn btn-dark btn-xl" href="https://miportal.unifranz.edu.bo/">ingresar a la plataforma</a>
                    </div>
                </div>     
            </div>
        </section>
        <!-- Services-->
       
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Proyecto implementado</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Estacionamiento</div>
                                    <p class="mb-0">Amplios lugares, para diferentes tipos de tamaño de vehiculos!!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/estacionamiento.jpg" alt="estacionamiento" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Parqueo moderno</div>
                                    <p class="mb-0">Niveles de estacionamiento!!!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/sistemaestaciona.jpg" alt="sistema" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Control del vehiculo</div>
                                    <p class="mb-0">Se controla la entrada y salida del vehiculo!!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/parqueo.jpg" alt="parqueo" />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Seguridad</div>
                                    <p class="mb-0">Camaras de seguridad para el resguardo del motorizado</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/camara.jpg" alt="camara" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/Estacionamiento-Unifranz-107285435074836/"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="https://getbootstrap.com/"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="https://github.com/fidelpinto/proyecto-web"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scriptsm.js"></script>
    </body>
</html>


