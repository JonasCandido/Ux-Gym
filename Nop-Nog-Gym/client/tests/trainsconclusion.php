<?php
    include('../../bankconnection/conexaobanco.php');
    session_start();

    $data = $_POST['dia'];
    $codusu = (int)$_SESSION['codusu'];

    $sql = "insert into tbrealizacoes values (null, $codusu, '$data')";

    $insert = $conexao->query($sql);

    if($insert == true) {
        header('location: ../pages/homeclient.php');
    } else {
        header('location: ../index.php');
    }
?>