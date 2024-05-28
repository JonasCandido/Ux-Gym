<?php
    session_start();
    $codusu = $_SESSION['codusu'];
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
        #botaovisualizar{
            background-color:  #2859EB;
            color: white;
        }
        #botaoadicionar{
            background-color:  #2859EB;
            color: white;
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
                    <a href="homeclient.php" class="nav-item nav-link active" id="linktreino">Treino</a>
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
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql2 = "select tbtreinos.codtreino,tbtreinos.nome, tbtreinos.foto, tbtreinos.categoria,tbtreinos.descricao,tbtreinos.repeticoes,tbtreinos.execucoes,tbtreinos.intervalo from tbtreinos
                                            inner join tbexercicio on tbexercicio.codtreino = tbtreinos.codtreino
                                            inner join tbcliente on tbexercicio.codusu = tbcliente.codusu
                                            where tbexercicio.codusu = $codusu";
                                            
                                    $select2 = $conexao->query($sql2);

                                    if($select2 -> num_rows > 0) {
                                        while($linha = $select2->fetch_array(MYSQLI_ASSOC)){
                                            echo '<tr>';
                                            echo '<td>'.$linha['nome'].'</td>';
                                            echo '<td>'.$linha['descricao'].'</td>';
                                            echo '<td><a class="btn btn-sm" id="botaovisualizar" href="detailsoftheexercise.php?codtreino='.$linha['codtreino'].'">Visualizar</a></td>';
                                            echo '</tr>';
                                        }    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col">
                        <div class="h-100 bg-secondary rounded p-4" id="diascontainer">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Dias concluidos</h6>
                            </div>
                           
                                <form action="../tests/trainsconclusion.php" method="POST">
                                    <div class="d-flex mb-2">
                                        <input class="form-control bg-dark border-0" type="date" id="dia" name="dia">
                                        <button type="submit" class="btn ms-2" id="botaoadicionar" onclick="adicionarBloco()">Adicionar</button>  
                                    </div>          
                                </form>     
                            <div class="d-flex align-items-center border-bottom py-2">
                                Dia
                            </div>
                            <?php
                                $sql3 = "select datarealizacao from tbrealizacoes where codusu=$codusu";

                                $select3 = $conexao->query($sql3);
                                if($select3->num_rows > 0){
                                    while($linha2 = $select3->fetch_array(MYSQLI_ASSOC)){
                                        echo '<div class="d-flex align-items-center border-bottom py-2">'.
                                        $linha2['datarealizacao'].'</div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#" id="linkfooter">Nop.Nog.Gym</a>, Todos os direitos reservados. 
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
    <script>
        function adicionarBloco() {
            var dia = document.getElementById('dia').value;
            var container = document.getElementById('diascontainer');
            var blocoOriginal = container.querySelector('.d-flex.align-items-center.border-bottom.py-2');
            var novoBloco = blocoOriginal.cloneNode(true);
            novoBloco.innerHTML = dia;
            container.appendChild(novoBloco);
        }
    </script>
</body>

</html>