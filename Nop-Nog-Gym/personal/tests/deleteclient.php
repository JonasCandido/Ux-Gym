<?php
    include('../../bankconnection/conexaobanco.php');
    $codusu = $_GET['codusu'];
    
    $sql = "delete from tbrealizacoes where
             codusu = $codusu"; 

    $delete = $conexao->query($sql);

    $sql2 = "delete from tbclientedicas
    where codusu = $codusu";

    $delete2 = $conexao->query($sql2);

    $sql3 = "delete from tbcliente where 
            codusu = $codusu";
    
    $delete3 = $conexao->query($sql3);

    if($delete == true && $delete2 == true && $delete3 == true) {
        header('Location: ../pages/clientsadmpage.php');     
    } else {
        header('Location: ../index.php');
    }
?>