<?php
require_once '../objetos/funcionario.php';
require_once '../model/funcionarioModel.php';

$funcionario = new Funcionario();

$funcionario->setNome($_POST['nome']);
$funcionario->setSobreNome($_POST['sobrenome']);
$funcionario->setCargo($_POST['cargo']);
$funcionario->setDataDeNascimento($_POST['datadenascimento']);
$funcionario->setSalario($_POST['salario']);

$funcionarioModel = new FuncionarioModel();

$funcionarioModel->criarFuncionario($funcionario);

header('Location: ../view/funcionarioCriado.php');
exit;

