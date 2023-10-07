<?php

class Cargo {

	private $id;
	private $descricao;
	
	function getId(){
		return $this->id;
	}
    
    function getDescricao() {
		return $this->descricao;
	}

	function setId($valor){
			$this->id = $valor;
	}
    
	function setDescricao($valor) {
		$this->descricao = $valor;
	}
		
}
?>