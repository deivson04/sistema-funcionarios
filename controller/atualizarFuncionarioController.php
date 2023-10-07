<?php
require_once '../objetos/funcionario.php';
require_once '../model/funcionarioModel.php';

$funcionarioModel = new FuncionarioModel();

$funcionario = new Funcionario();

$funcionario->setId($_POST["id"]);
$funcionario->setNome($_POST["nome"]);
$funcionario->setSobreNome($_POST["sobrenome"]);
$funcionario->setCargo($_POST["cargo"]);
$funcionario->setDataDeNascimento($_POST["datadenascimento"]);
$funcionario->setSalario($_POST["salario"]);

$funcionarioBanco = $funcionarioModel->atualizarFuncionario($funcionario);

header('Location: ../view/funcionarioAtualizado.php');

