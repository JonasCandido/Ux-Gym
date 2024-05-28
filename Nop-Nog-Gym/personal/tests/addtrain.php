<?php
    session_start();
    include('../../bankconnection/conexaobanco.php');

    $categoria = $_POST['categoria'];
    $nome = $_POST['nome'];
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    $imagem_base64 = base64_encode($foto);
    $descricao = $_POST['descricao'];
    $repeticoes = (int)$_POST['repeticoes'];
    $execucoes = (int)$_POST['execucoes'];
    $intervalo = (int)$_POST['intervalo'];
    $codadm = (int)$_SESSION['codadm'];

    $sql = "insert into tbtreinos values(null,'$nome','$imagem_base64','$categoria','$descricao',$repeticoes,$execucoes,$intervalo,$codadm)";

    $insert = $conexao->query($sql);

    if($insert==true){
        header('Location: ../pages/trainsadmpage.php');
    } else{
        header('Location: ../index.php');
    }
?>