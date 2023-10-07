<?php
require_once '../objetos/cargo.php';
require_once '../model/cargoModel.php';

$cargo = new Cargo();
$cargo->setId($_GET["id"]);

$cargoModel = new CargoModel();
$cargoBanco = $cargoModel->deletarCargo($cargo);
header('Location: ../view/cargoDeletado.php');