<?php
    include('../../bankconnection/conexaobanco.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from tbcliente where email='$email' and senha='$senha'";

    $select = $conexao->query($sql);

    if($select-> num_rows > 0) {
        $linha = $select->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['codusu'] = $linha['codusu'];
        header('location: ../pages/homeclient.php');
    }   else {
        header('location: ../index.php');
    }
?>