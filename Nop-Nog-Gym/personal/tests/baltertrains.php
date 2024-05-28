<?php
    include('../../bankconnection/conexaobanco.php');

    $codtreino = $_GET['codtreino'];
    $categoria = $_POST['categoria'];
    $nome = $_POST['nome'];
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    $imagem_base64 = base64_encode($foto);
    $descricao = $_POST['descricao'];
    $repeticoes = (int)$_POST['repeticoes'];
    $execucoes = (int)$_POST['execucoes'];
    $intervalo = (int)$_POST['intervalo'];

    $sql = "update tbtreinos
            set categoria='$categoria', nome='$nome', foto='$imagem_base64', descricao='$descricao', repeticoes=$repeticoes, execucoes=$execucoes, intervalo=$intervalo
            where codtreino=$codtreino";


    $update = $conexao->query($sql);

    if($update == true) {
        header('Location: ../pages/trainsadmpage.php');
    } else {
        header('Location: ../index.php');
    }
?>