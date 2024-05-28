<?php
    include('../../bankconnection/conexaobanco.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select * from tbadmnistrador where email='$email' and senha='$senha'";

    $select = $conexao->query($sql);

    if($select-> num_rows > 0) {
        $linha = $select->fetch_array(MYSQLI_ASSOC);
        session_start();
        $_SESSION['codadm'] = $linha['cod_adm'];
        $_SESSION['nome'] = $linha['nome'];
        header('location: ../pages/homeadm.php');
    } else {
        header('location: ../index.php');
    }
?>