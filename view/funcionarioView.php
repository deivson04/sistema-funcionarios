<?php
require_once '../model/funcionarioModel.php';

$funcionarioModel = new FuncionarioModel();

$funcionarios = $funcionarioModel->listaFuncionarios();

$aniversariante = $funcionarioModel->Aniversariante();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <title>Listar Funcionários</title>
    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<div class='container p-3'>

<header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand offset-sm-5">
      Lista Funcionários
    </a>
</nav>
<br> 
</header>
<br>
<section>
<a href="cadastroFuncionario.php" class="btn btn-primary" >Cadastrar Funcionário</a>
<a href="gerarPdf.php" class="btn btn-primary" target ="_blank" >Relatório Pdf</a>
<a href="gerarExcel.php" class="btn btn-primary" >Relatório excel</a>
<br>
<br>
<?php
   foreach ($aniversariante as $obj) {
    ?> 
    <p>Parabéns por mais um ano de vida, Tenhas um dia repleto de felicidades. <b><?php echo $obj->getNome() ?></b></p>  
  <?php 
  }
  ?>
 
 <table class="table-responsive">
 <tr> 
   <div class="row align-items-start"> 

    <th class="col-1 border">ID</th>
    <th class="col-1 border">Nome</th>
    <th class="col-1 border">SobreNome</th>
    <th class="col-1 border">Cargo</th>
    <th class="col-1 border">Data De Nascimento</th>
    <th class="col-1 border">Salário</th>
</tr> 
</div>    
<br>
<?php  
    
    while($funcionario  = array_shift($funcionarios)){                               						
?>
    
 <div class=" align-items-start">
       <tr> 
        <td class="col-1"><?php echo $funcionario['id'] ?></td>
        <td class="col-1 "><?php echo $funcionario['nome'] ?></td>
        <td class="col-1"><?php echo $funcionario['sobrenome'] ?></td>
        <td class="col-1"><?php echo $funcionario['descricao'] ?></td>
        <td class="col-1"><?php echo date('d/m/Y', strtotime( $funcionario['datadenascimento'])) ?></td>
        <td class="col-1"><?php echo $funcionario['salario'] ?></td>
        <td class="col-1"><a class="btn btn-primary" href="atualizarFuncionario.php?id=<?= $funcionario['id']; ?>">Alterar</a></td>
        <td class="col-1"><a class="btn btn-primary" href="../controller/deletarFuncionarioController.php?id=<?= $funcionario['id']; ?>">Remover</a></td>
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
















