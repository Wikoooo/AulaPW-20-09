<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Inserir Usuários</title>
</head>
<body>
    
    <div class="login"> 
        <h2>Registro</h2>
        
        <form  method="POST" action="">
            <div class="box-user">
                <label for="nome">Digite seu nome:</label><br>
                <input type="text" id="nome" name="nome"><br><br>
            </div>
            <div class="box-user">
                <label for="email">Digite seu email:</label><br>
                <input type="text" id="email" name="email"><br><br>
            </div>
            <div class="box-user">
                <label for="senha">Digite sua senha:</label><br>
                <input type="text" id="senha" name="senha"><br><br>
            </div>
            <input class="btn" type="submit" value="Logar" name="btnLogar">
            <input class="btn" type="submit" value="Cadastrar" name="btnCadastrar">
            </form> 
        <br>
    </div>   
</body>
</html>
<?php

require"Contato.class.php";

$contato = new Contato();

if(isset($_POST['btnCadastrar'])){
    $email = $_POST["email"];
    $dados = $contato->checkUser($email);
    if(!empty($dados)){
        echo "<script>
        alert(`Usuário já cadastrado!`)
     </script>";
    }else{
        echo "<script>
        alert(`Usuário logado com sucesso!`)
     </script>";
    }
}



   

