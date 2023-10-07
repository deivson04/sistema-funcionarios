<?php

require_once '../model/funcionarioModel.php';

require_once ('../objetos/MyReport.php');

$funcionarioModel = new FuncionarioModel();

$funcionarios = $funcionarioModel->listaFuncionarios();

$myreporte = new MyReport();
$filename = "C:\Users\Deivson\JaspersoftWorkspace\my_projects\Relatorio.jrxml";
$myreporte->gerarRelatorio($funcionarios, $filename, "Xlsx" );