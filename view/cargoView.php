<?php
require_once '../model/cargoModel.php';

$cargoModel = new CargoModel();

$cargos = $cargoModel->listaCargos();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Listar Cargos</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<div class='container'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5">
      Lista Cargos
    </a>
</nav>
<br> 
</header>
<br>
<section>
<a href="cadastroCargo.php" class="btn btn-primary" >Cadastrar Cargo</a>
<br>
<br>
<table class="table-responsive">
 <tr> 
   <div class="row align-items-start"> 

    <th class="col-1 border">ID</th>
    <th class="col-2 border">Descrição</th>
</tr> 
</div>    
<br>
<?php  
    
    while($cargo  = array_shift($cargos)){                               						
?>
    
 <div class=" align-items-start">
       <tr> 
        <td class="col "><?php echo $cargo->getId() ?></td>
        <td class="col "><?php echo $cargo->getDescricao() ?></td>
        <td class="col-1 "><a class="btn btn-primary" href="atualizarCargo.php?id=<?= $cargo->getId(); ?>">Alterar</a></td>
        <td class="col "><a class="btn btn-primary" href="../controller/deletarFuncionarioController.php?id=<?= $cargo->getId(); ?>">Remover</a></td>
    </tr>
 </div>    
<?php                
   }
?>
</table>    
  
  <script src="js/bootstrap.min"></script>
  <script src="js/sistemaGerenciamento.js"></script> 

</body>
</html>
















