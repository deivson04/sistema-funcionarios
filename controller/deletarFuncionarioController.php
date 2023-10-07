<?php
require_once '../objetos/funcionario.php';
require_once '../model/funcionarioModel.php';

$funcionario = new Funcionario();
$funcionario->setId($_GET["id"]);

$funcionarioModel = new FuncionarioModel();
$funcionarioBanco = $funcionarioModel->deletarFuncionario($funcionario);
header('Location: ../view/funcionarioDeletado.php');