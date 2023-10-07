<?php

require_once '../objetos/funcionario.php';
require_once '../model/funcionarioModel.php';
require_once '../model/cargoModel.php';
$funcionario = new Funcionario();

$funcionario->setId($_GET['id']);

$funcionarioModel = new FuncionarioModel();

$funcionarioBanco = $funcionarioModel->buscarFuncionario($funcionario);

$cargoModel = new CargoModel();

$cargoBanco = $cargoModel->listaCargos();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Atualizar Funcionários</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<div class='container'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5" href="#">
      Atualizar Funcionários
    </a>
</nav>
<br> 
</header>
<br>
<form action="../controller/atualizarFuncionarioController.php" method="post"> 

<div class="form-group"> 
<div class="col-md-6 offset-md-3">
  <label for="nome" class="form-label">Nome:</label>
  <input type="text" value="<?php echo $funcionarioBanco->getNome(); ?>" name="nome" class="form-control" id="" style="min-width:300px;"  placeholder="Seu Nome" required>
  
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="sobreNome" class="form-label">SobreNome:</label>
  <input type="text" value="<?php echo $funcionarioBanco->getSobreNome(); ?>" name="sobrenome" class="form-control" id="" style="min-width:300px;"  placeholder="Seu SobreNome" required>
</div>  
<br>  
<div class="col-md-6 offset-md-3">
<label for="descricao">Cargo:</label>
  <select class="form-select" id=""  name="cargo" aria-label="Default select example">
  <?php foreach($cargoBanco as $cargo) { ?>
      <?php if($cargo->getId() == $funcionarioBanco->getCargo()) { ?>
              <option selected value="<?php echo $cargo->getId(); ?>"><?php echo $cargo->getDescricao(); ?></option>
      <?php } else { ?>
              <option value="<?php echo $cargo->getId(); ?>"><?php echo $cargo->getDescricao(); ?></option>
    <?php   } 
          } ?>
</select>
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="descricao" class="form-label">Data De Nascimento:</label>
  <input type="date" value="<?php echo $funcionarioBanco->getDataDeNascimento(); ?>" name="datadenascimento" class="form-control" id="" style="min-width:300px;" data-format="00/00/0000"  placeholder="dd/mm/yyyy" required>
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="salario" class="form-label">Salário:</label>
  <input type="text" value="<?php echo $funcionarioBanco->getSalario(); ?>" name="salario" class="form-control" id="" style="min-width:300px;"  placeholder="Seu Salário" required>
</div>  
<br>  
<div class="text-center">  
<input type="hidden" name="id" value="<?php echo $funcionarioBanco->getId(); ?>">  
<button type="submit" class="btn btn-primary btn-lg" href="../view/cadastroFuncionario.php">Salvar</button> 
</div>

</div>      

</form>    
<a href="funcionarioView.php" class="btn btn-primary" >Voltar</a>     
    

  <script src="js/bootstrap.min"></script>
  <script src="js/sistemaGerenciamento.js"></script> 

</body>
</html>
















