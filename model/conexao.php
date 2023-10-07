<?php

class Conexao {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "sistema_funcionarios";

    public function abrirConexao() {
        try {
            return new PDO('mysql:dbname=' . $this->database . ';host=' . $this->host . ';charset=UTF8', $this->user, $this->password);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

}
?>
