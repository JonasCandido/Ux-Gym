<?php
    include('../../bankconnection/conexaobanco.php');

    $codusu = $_GET['codusu'];
    $usuario = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    $imagem_base64 = base64_encode($foto);
    $exercicio_text = $_POST['treinosc'];

    $array_exercicios = explode('/', $exercicio_text);

    $sql = "update tbcliente
            set nome='$usuario', email='$email', senha='$senha', telefone='$telefone', foto='$imagem_base64'
            where codusu=$codusu";

    $update = $conexao->query($sql);

    $sql2 = "delete from tbexercicio where
    codusu = $codusu";
    $delete = $conexao->query($sql2);

    $count = 0;
    while($count < count($array_exercicios)){
        $codtreino = $array_exercicios[$count];
        
        $sql3 = "insert tbexercicio values (null, $codusu, $codtreino)";
        $insert = $conexao->query($sql3); 

        if($insert == false) {
            header('Location: ../index.php');
        }
        $count++;
    }
    
    if($update == true) {
        header('Location: ../pages/alterclients.php?codusu='.$codusu);
    } else {
        header('Location: ../index.php');
    }
?>