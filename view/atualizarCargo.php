<?php

require_once '../objetos/cargo.php';
require_once '../model/cargoModel.php';

$cargo = new Cargo();

$cargo->setId($_GET['id']);

$cargoModel = new CargoModel();

$cargoBanco = $cargoModel->buscarCargo($cargo);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Atualizar Cargo</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<div class='container'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5" href="#">
      Atualizar Cargo
    </a>
</nav>
<br> 
</header>
<br>
<form action="../controller/atualizarCargoController.php" method="post"> 

<div class="form-group"> 
 <div class="col-md-6 offset-md-3"> 
  <label for="descricao" class="form-label">Descrição:</label>
  <input type="text" value="<?php echo $cargoBanco->getDescricao(); ?>" name="descricao" class="form-control" id="" style="min-width:300px;"  placeholder="Descrição do Cargo" required>
  <input type="hidden" name="id" value="<?php echo $cargoBanco->getId(); ?>">
</div> 
  <br>
  <div class="text-center">
   <button type="submit" class="btn btn-primary btn-lg" href="../view/cadastroCargo.php">Salvar</button>
  </div> 
</div> 
</form>
<a href="cargoView.php" class="btn btn-primary" >Voltar</a>       
    

  <script src="js/bootstrap.min"></script>
  <script src="js/sistemaGerenciamento.js"></script> 

</body>
</html>
















