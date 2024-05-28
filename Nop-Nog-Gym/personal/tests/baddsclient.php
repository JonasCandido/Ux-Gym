<?php
    include('../../bankconnection/conexaobanco.php');

    $codusu = $_GET['codusu'];
    $dica = $_POST['dica'];

    $sql = "insert into tbclientedicas values(null, $codusu, '$dica')";
    $insert = $conexao->query($sql);

    if($insert == true) {
        header('location: ../pages/addsclient.php?codusu='.$codusu);
    } else {
        header('location: ../index.php');
    }
?>