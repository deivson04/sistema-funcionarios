<?php
require_once '../objetos/cargo.php';
require_once '../model/cargoModel.php';

$cargo = new Cargo();

$cargo->setDescricao($_POST['descricao']);

$cargoModel = new CargoModel();

$cargoModel->criarCargo($cargo);

header('Location: ../view/cargoCriado.php');
exit;

