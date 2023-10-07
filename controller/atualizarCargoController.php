<?php
require_once '../objetos/cargo.php';
require_once '../model/cargoModel.php';

$cargoModel = new CargoModel();

$cargo = new Cargo();

$cargo->setId($_POST["id"]);
$cargo->setDescricao($_POST['descricao']);

$cargoBanco = $cargoModel->atualizarCargo($cargo);
header('Location: ../view/cargoAtualizado.php');

