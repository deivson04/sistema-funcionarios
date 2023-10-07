<?php

class Funcionario {

	private $id;
	private $nome;
    private $sobreNome;
    private $cargo;
    private $dataDeNascimento;
    private $salario;
	private $descricaoCargo;
	private $aniversariante;
	
	function getId(){
		return $this->id;
	}
    
    function getNome() {
		return $this->nome;
	}

    function getSobreNome() {
		return $this->sobreNome;
	}

    function getCargo() {
		return $this->cargo;
	}

    function getDataDeNascimento() {
		return $this->dataDeNascimento;
	}

    function getSalario() {
		return $this->salario;
	}

	function getDescricaoCargo() {
		return $this->descricaoCargo;
	}

	function getAniversariante() {
		return $this->aniversariante;
	}

	function setId($valor){
			$this->id = $valor;
	}
    
	function setNome($valor) {
		$this->nome = $valor;
	}

    function setSobreNome($valor) {
		$this->sobreNome = $valor;
	}
	
    function setCargo($valor) {
		$this->cargo = $valor;
	}

    function setDataDeNascimento($valor) {
		$this->dataDeNascimento = $valor;
	}

    function setSalario($valor) {
		$this->salario = $valor;
	}

	function setDescricaoCargo($valor) {
		$this->descricaoCargo = $valor;
	}

	function setAniversariante($valor) {
		$this->aniversariante = $valor;
	}
}
?>