<?php
include 'Contato.class.php';

$contato = new Contato();

$resultado = $contato->insertUser($_POST["nome"],$_POST[ "email"], $_POST["senha"]);
if($resultado == true) {
     echo"
     <script>
         alert('Registro inserido com sucesso')
     </script>";    
}



