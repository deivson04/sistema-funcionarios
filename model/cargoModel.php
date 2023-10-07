<?php
require_once 'conexao.php';
require_once '../objetos/cargo.php';

class CargoModel {

	private $conexao;
	
	function __construct() { 			
	   //Conecta ao banco de dados
	   $this->conexao = (new Conexao())->abrirConexao();		
	}
	
	function criarCargo($cargo){
		$descricao = $cargo->getDescricao();
        
        $sql = "INSERT INTO cargo (descricao) 
                                VALUES
                                (:descricao)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":descricao", $descricao);
	    $stmt->execute(); 
    }

    public function listaCargos()
    {
        $sql = "SELECT 
                    *   
                FROM cargo"; 					
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();		

        $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $arrayCargo = [];
        
        if ($listagem) {  
                
            foreach($listagem as $linha) {
                $cargo = new Cargo();
                $cargo->setId($linha['id']);
                $cargo->setDescricao($linha['descricao']);
                $arrayCargo[] = $cargo;
            }
        } 
        return $arrayCargo;

    }
    
    function buscarCargo($cargo)
    {
        $id = $cargo->getId();

        $sql = "SELECT 
                    * 
                FROM cargo 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            
        $cargo = new Cargo();
        $cargo->setId($linha['id']);
        $cargo->setDescricao($linha['descricao']);
        return $cargo;
    }

    function atualizarCargo($cargo)
    {
        $id = $cargo->getId();
        $descricao = $cargo->getDescricao();
        $sql = "UPDATE 
                cargo 
                SET descricao = :descricao
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->execute();
    }

    function deletarCargo($cargo)
    {
        $id = $cargo->getId();
        $sql = "DELETE FROM cargo 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}  

