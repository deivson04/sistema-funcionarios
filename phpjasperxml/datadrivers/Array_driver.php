<?php

use simitsdk\phpjasperxml\datadrivers\DataInterface;

require_once ('C:\\xampp\htdocs\\gerenciamentoDeFuncionarios\\phpjasperxml\\datadrivers\\DataInterface.php');

class Array_driver implements DataInterface
{
    protected $conn;
    protected array $data=[];
    public function __construct(array $config)
    {
        if(!isset($config['data']))
        {
            die('Undefine data in array driver');
        }
        else
        {
            $this->data=$config['data'];
        }
    }
    public function fetchData(mixed $querypara):array
    {
        
        return $this->data;
    }

}
