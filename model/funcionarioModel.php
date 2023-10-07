<?php
require_once 'conexao.php';
require_once '../objetos/funcionario.php';

class FuncionarioModel {

	private $conexao;
	
	function __construct() { 			
	   //Conecta ao banco de dados
	   $this->conexao = (new Conexao())->abrirConexao();		
	}
	
	function criarFuncionario($funcionario){
		$nome = $funcionario->getNome();
        $sobreNome = $funcionario->getSobreNome();
        $cargo = $funcionario->getCargo();
        $dataDeNascimento = $funcionario->getDataDeNascimento();
        $salario = $funcionario->getSalario();
        
        $sql = "INSERT INTO funcionarios (nome, sobrenome, cargo, datadenascimento, salario) 
                                VALUES
                                (:nome,
                                :sobrenome,
                                :cargo,
                                :datadenascimento,
                                :salario)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobreNome);
        $stmt->bindParam(":cargo", $cargo);
        $stmt->bindParam(":datadenascimento", $dataDeNascimento);
        $stmt->bindParam(":salario", $salario);
	    $stmt->execute(); 
    }

    function listaFuncionarios()
    {
        $sql = "SELECT
                    funcionarios.*,
                    cargo.descricao
                FROM funcionarios
                INNER JOIN cargo
                    ON cargo.id = funcionarios.cargo"; 					
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();		

        // $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);
        date_default_timezone_set('America/Sao_Paulo');
        $arrayFuncionario = array();
        while ($temp = $stmt->fetch(PDO::FETCH_ASSOC)){
                    
            $dataAni = strtotime(date("Y-m-d",strtotime($temp['datadenascimento'])));            
            $today =  strtotime(date("Y-m-d"));
            
            if($dataAni == $today){
                $temp['aniversariante'] = "Parabéns por mais um ano de vida, Tenhas um dia repleto de felicidades.";
            }
            $arrayFuncionario[] = $temp;
        }
       
        return $arrayFuncionario;

    }
    
    function buscarFuncionario($funcionario)
    {
        $id = $funcionario->getId();

        $sql = "SELECT 
                    * 
                FROM funcionarios 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            
        $funcionario = new Funcionario();
        $funcionario->setId($linha['id']);
        $funcionario->setNome($linha['nome']);
        $funcionario->setSobreNome($linha['sobrenome']);
        $funcionario->setCargo($linha['cargo']);
        $funcionario->setDataDeNascimento($linha['datadenascimento']);
        $funcionario->setSalario($linha['salario']);
        return $funcionario;
    }

    function atualizarFuncionario($funcionario)
    {
        $id = $funcionario->getId();
        $nome = $funcionario->getNome();
        $sobreNome = $funcionario->getSobreNome();
        $cargo = $funcionario->getCargo();
        $dataDeNascimento = $funcionario->getDataDeNascimento();
        $salario = $funcionario->getSalario();
        $sql = "UPDATE 
                funcionarios 
                SET nome = :nome,
                    sobrenome = :sobrenome,
                    cargo = :cargo,
                    datadenascimento = :datadenascimento,
                    salario = :salario 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobreNome);
        $stmt->bindParam(":cargo", $cargo);
        $stmt->bindParam(":datadenascimento", $dataDeNascimento);
        $stmt->bindParam(":salario", $salario);
        $stmt->execute();
    }

    function deletarFuncionario($funcionario)
    {
        $id = $funcionario->getId();
        $sql = "DELETE FROM funcionarios 
                WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    
    function Aniversariante()
    {
        
        $sql = "SELECT id, nome, sobrenome, cargo, datadenascimento, salario, DAY(datadenascimento) 
                FROM funcionarios 
                WHERE DAY(datadenascimento) = DAY(CURDATE()) 
                AND MONTH(datadenascimento) = MONTH(CURDATE())";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        $aniversariantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $arrayFuncionario = [];
        
        if ($aniversariantes) {  
                
            foreach($aniversariantes as $linha) {
                $funcionario = new Funcionario();
                $funcionario->setId($linha['id']);
                $funcionario->setNome($linha['nome']);
                $funcionario->setSobreNome($linha['sobrenome']);
                $funcionario->setCargo($linha['cargo']);
                $funcionario->setDataDeNascimento($linha['datadenascimento']);
                $funcionario->setSalario($linha['salario']);
                $arrayFuncionario[] = $funcionario;
            }
        } 
        return $arrayFuncionario;

        
        
        
    }
}  

