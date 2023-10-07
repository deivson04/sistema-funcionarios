<?php

error_reporting(E_ERROR | E_PARSE);

 use simitsdk\phpjasperxml\PHPJasperXML;

 require_once "../phpjasperxml/PHPJasperXML.php";

 class MyReport {
    // $filename = "C:\Users\Deivson\JaspersoftWorkspace\my_projects\Blank_A4.jrxml";

    function gerarRelatorio($dados, $filename, $tipo)
    {
        $report = new PHPJasperXML();
    
    // $funcao = array(array("ID" => 1, "NOME"=>"Itamar"));
    $config = ['driver' => 'array', 'data' => $dados];
    
    $report = new PHPJasperXML();
    $report->load_xml_file($filename)
        ->setDataSource($config)
        ->export($tipo);
    }
    
 }




















