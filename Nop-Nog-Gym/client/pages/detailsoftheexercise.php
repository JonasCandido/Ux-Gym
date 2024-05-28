<?php
    session_start();
    $codusu = $_SESSION['codusu'];
    $codtreino = $_GET['codtreino'];
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
    <style>
        .homeclienttitle{
            color:  #2859EB;
        }
        #barraicone{
            color:  #2859EB;
        }
        #linkfooter{
            color: #2859EB;
        }
        #linktreino{
            color: #2859EB;
            border-color: #2859EB;
        }
        .content .navbar .navbar-nav .nav-link:hover, .content .navbar .navbar-nav .nav-link.active {
            color: #2859EB;
        }
    </style>
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
                <a href="homeclient.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="homeclienttitle"><i class="fa fa-solid fa-dumbbell me-2"></i>Nop.Nog.Gym</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="homeclient.php" id="linktreino" class="nav-item nav-link active">Treino</a>
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
                <a href="../index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="homeclienttitle mb-0"><i class="fa fa-solid fa-dumbbell"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars" id="barraicone"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <?php
                                include('../../bankconnection/conexaobanco.php');
                                $sql = "select foto from tbcliente
                                        where codusu = $codusu";
                                $select = $conexao -> query($sql);
                                if($select -> num_rows > 0) {
                                    $linha = $select->fetch_array(MYSQLI_ASSOC);
                                    $foto = base64_decode($linha['foto']);
                                }
                            ?>
                              <img class="rounded-circle me-lg-2" src="data:image/jpeg;base64,<?php echo base64_encode($foto); ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['nome']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../tests/sairclient.php" class="dropdown-item">Sair</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Treinos</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Repetições</th>
                                    <th scope="col">Execuções</th>
                                    <th scope="col">Intervalo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php
                                    $sql2 = "select * from tbtreinos
                                             where codtreino = $codtreino";
                                    $select2 = $conexao->query($sql2);
                                    if($select2 -> num_rows > 0) {
                                        $linha2 = $select2->fetch_array(MYSQLI_ASSOC);
                                        echo '<td>'.$linha2['nome'].'</td>';
                                        echo '<td>'.$linha2['categoria'].'</td>';
                                        echo '<td>'.$linha2['descricao'].'</td>';
                                        echo '<td>'.$linha2['repeticoes'].'</td>';
                                        echo '<td>'.$linha2['execucoes'].'</td>';
                                        echo '<td>'.$linha2['intervalo'].'</td>';
                                    }
                                ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
                                    
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <?php
                        $foto2 = base64_decode($linha2['foto']);
                        echo '<td><img class="me-lg-2" src="data:image/jpeg;base64,'.base64_encode($foto2).'" alt="" style="width: 400px; height: 400px;"></td>';
                    ?>
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a id="linkfooter" href="#">Nop.Nog.Gym</a>, Todos os direitos reservados. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
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