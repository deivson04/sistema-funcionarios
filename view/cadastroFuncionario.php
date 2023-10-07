<?php

require_once '../model/cargoModel.php';

$cargoModel = new CargoModel();

$cargoBanco = $cargoModel->listaCargos();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Cadastro de Funcionários</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
<div class='container'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5">
      Cadastrar Funcionários
    </a>
</nav> 
</header>
<br>
<form action="../controller/cadastroFuncionarioController.php" method="post"> 

<div class="form-group"> 
<div class="col-md-6 offset-md-3">
  <label for="nome" class="form-label">Nome:</label>
  <input type="text" value="" name="nome" class="form-control" id="" style="min-width:300px;"  placeholder="Seu Nome" required>
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="sobreNome" class="form-label">SobreNome:</label>
  <input type="text" value="" name="sobrenome" class="form-control" id="" style="min-width:300px;"  placeholder="Seu SobreNome" required>
</div>  
<br>  
<div class="col-md-6 offset-md-3">
<label for="descricao">Cargo:</label>
  <select class="form-select" id="" name="cargo" aria-label="Default select example">
  <?php foreach($cargoBanco as $cargo) { ?>
      <option value="<?php echo $cargo->getId() ?>"><?php echo $cargo->getDescricao() ?></option>
    <?php } ?>
  </select>  
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="descricao" class="form-label">Data De Nascimento:</label>
  <input type="date" value="" name="datadenascimento" class="form-control" id="" style="min-width:300px;" data-format="00/00/0000"  placeholder="dd/mm/yyyy" required>
</div>  
<br>
<div class="col-md-6 offset-md-3">
  <label for="salario" class="form-label">Salário:</label>
  <input type="text" value="" name="salario" class="form-control" id="" style="min-width:300px;"  placeholder="Seu Salário" required>
</div>  
<br>  
<div class="text-center">
   <button type="submit" class="btn btn-primary btn-lg" href="../view/cadastroFuncionario.php">Salvar</button>
</div>

</div>      
</form>    

<a href="funcionarioView.php" class="btn btn-primary" >Voltar</a>

  <script src="js/bootstrap.min"></script>
  <script src="js/sistemaGerenciamento.js"></script> 

</body>
</html>
















