<?php

/**
 * @author Fabio Claret
 * data agosto/2024
 * Classe com conexao a banco de dados
 * @return boolean 
 */

class Contato{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    /**
     * @author Fabio Claret
     * data agosto/2024
     * Metodo de conexao ao banco de dados
     * @return boolean 
     */
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
       
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setEmail($mail){
        $this->email = $email;
    }

    function __construct(){
        #o PDO precisa de 3 parametros 
        $dsn    = "mysql:dbname=etimcontato;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);

            /* echo "<script>
                   alert('Conectado ao banco')
                </script>";*/

        } catch (\Throwable $th) {
            echo "<script>
                    alert(`Banco indisponivel, tente mais tarde!`)
                 </script>";
            // echo $th;
        }
    }
       
    function insertUser($nome,$email,$senha){
        //passo 1  cria uam variavel com a consulta SQL
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha =:s;";

        //passo 2 quando tem apelidos temos que usar o metodo prepare
        $sql = $this->pdo->prepare($sql);

        //passo 3 depois do prepare usar o bindValue, um pra cada apelido
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);

        //passo 4 executar o comando
        return $sql->execute();
    }

    function insertAtvd($nome,$idade,$celular){
        $atvd = "INSERT INTO atividade SET nome = :nm, idade = :y, celular = :cll";

        $atvd = $this->pdo->prepare($atvd);

        $atvd->bindValue(":nm",$nome);
        $atvd->bindValue(":cll",$celular);
        $atvd->bindValue(":y",$idade);

        return $atvd->execute();
    }
    function checkUser($email){
        $check= "SELECT email, id FROM usuarios WHERE email = :em";
        $check = $this->pdo->prepare($check);
        $check->bindValue(":em", $email);
        $check->execute();
        
        if($check->rowCount() > 0){
            return $check->fetch();  
        }else{
            return array();
        }
      }
}