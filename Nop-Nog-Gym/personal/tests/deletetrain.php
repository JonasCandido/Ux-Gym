<?php
    include('../../bankconnection/conexaobanco.php');
    $codtreino = $_GET['codtreino'];
    
    $sql = "delete from tbexercicio where
            codtreino=$codtreino";

    $delete = $conexao->query($sql);

    $sql2 = "delete from tbtreinos where 
            codtreino = $codtreino";
    
    $delete2 = $conexao->query($sql2);

    if($delete == true && $delete2 == true) {
        header('Location: ../pages/trainsadmpage.php');     
    } else {
        header('Location: ../index.php');
    }
?>