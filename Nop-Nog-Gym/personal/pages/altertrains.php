<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="homeadm.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-solid fa-dumbbell me-2"></i>Nop.Nog.Gym</h3>
                </a>
                <div class="navbar-nav w-100" style="margin-bottom: 10px;">
                    <a href="homeadm.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Visualização de clientes e treinos</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="trainsadmpage.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Treinos</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                <div class="navbar-nav w-100" style="margin-top: 10px;">
                    <a href="clientsadmpage.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Clientes</a>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-solid fa-dumbbell"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['nome']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../tests/sairadm.php" class="dropdown-item">Sair</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4" style="margin-top: 10px;">
                    <h6 class="mb-4">Alterar treino</h6>
                    <form method="POST" action="../tests/baltertrains.php?codtreino=<?php echo $_GET['codtreino'] ?>" enctype="multipart/form-data">
                        <?php
                            include('../../bankconnection/conexaobanco.php');

                            $sql = "select * from tbtreinos
                                    where codtreino = ".$_GET['codtreino'];

                            $select = $conexao->query($sql);

                            if($select->num_rows > 0) {
                                $linha = $select->fetch_array(MYSQLI_ASSOC);
                            }
                        ?>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria"
                                aria-describedby="emailHelp" value="<?php echo $linha['categoria']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                aria-describedby="emailHelp" value="<?php echo $linha['nome']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label" style="color: white;">Foto do exercício:</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao"
                                aria-describedby="emailHelp" value="<?php echo $linha['descricao']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="repeticoes" class="form-label">Repetições</label>
                            <input type="text" class="form-control" id="repeticoes" name="repeticoes"
                                aria-describedby="emailHelp" value="<?php echo $linha['repeticoes']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="execucoes" class="form-label">Execuções</label>
                            <input type="text" class="form-control" id="execucoes" name="execucoes"
                                aria-describedby="emailHelp" value="<?php echo $linha['execucoes']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="intervalo" class="form-label">Intervalo</label>
                            <input type="text" class="form-control" id="intervalo" name="intervalo"
                                aria-describedby="emailHelp" value="<?php echo $linha['intervalo']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Alterar treino</button>
                    </form>
                </div>
            </div>
            
                    
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Nop.Nog.Gym</a>, Todos os direitos reservados. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/chart/chart.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</body>

</html>