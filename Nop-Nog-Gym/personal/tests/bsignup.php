<?php
    include('../../bankconnection/conexaobanco.php');

    $usuario = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    $imagem_base64 = base64_encode($foto);
    $exercicio_text = $_POST['treinosc'];

    $array_exercicios = explode('/', $exercicio_text);

    $sql = "insert into tbcliente values(null,'$usuario','$email','$senha','$imagem_base64','$telefone')";

    $insert = $conexao->query($sql);

    if($insert == true) {
        $sql2 = "select codusu from tbcliente where email = '$email' and senha = '$senha'";
        $select = $conexao->query($sql2);
        if($select -> num_rows > 0) {
            $linha = $select->fetch_array(MYSQLI_ASSOC);
            $codusu = $linha['codusu'];
        } else {
            header('location: ../signinadm.php');
        }
        $count = 0;
        while($count < count($array_exercicios)) {
            $codtreino = $array_exercicios[$count];
            $sql3 = "insert into tbexercicio values(null, $codusu, $codtreino)";
            $insert2 = $conexao->query($sql3);
            if($insert2 == true) {
                $count++;
            } else {
                header('location: ../index.php');
            }
        }
        header('location: ../pages/clientsadmpage.php');
    } else {
        header('location: ../index.php');
    }
?>