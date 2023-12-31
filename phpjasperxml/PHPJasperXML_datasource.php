<?php

namespace simitsdk\phpjasperxml;

trait PHPJasperXML_datasource{
    protected bool $uselastserializedata=false;
    protected $db = null;
    protected $rows = [];
    protected $rowcount = 0 ;
    protected $dataloaded=false;
    protected array $connectionsetting;
    protected string $cachefile = '';
    
    public function setDataSource(array $setting):self
    {
        $this->cachefile = sys_get_temp_dir().'/phpjasperxml.cache';
        
        if(empty($setting['driver']))
        {
            die('undefined db driver');
        }
        else
        {
            $driver = $setting['driver'];
            $this->connectionsetting = $setting;
            $driverfile = __DIR__.'/datadrivers/'.ucfirst($driver).'_driver.php';
            if(!file_exists($driverfile))
            {
                die("$driverfile does not exists");
            }
            else
            {
                require_once ('C:\\xampp\htdocs\\gerenciamentoDeFuncionarios\\phpjasperxml\\datadrivers\\' . ucfirst($driver).'_driver.php');
                $classname = ucfirst($driver)."_driver";
                $this->db = new $classname($setting);
                $this->fetchData();
                return $this;           
            }
        }   
    }


    public function fetchData() : self
    {
        $sql = $this->parseExpression($this->querystring);
        
        $data =$this->db->fetchData($sql);

        $this->loadData($data);        
        return $this;
    }

    public function loadData(array $data):self
    {
        $this->dataloaded=true;
        $this->rowcount = count($data);
        
        if(!$this->uselastserializedata)
        {
            $this->rows = $data;
            $this->storeCache();
        }
        else
        {
            if(file_exists($this->cachefile))
            {
                // $this->console("use cache file $this->cachefile");
                $file = file_get_contents($this->cachefile);
                $this->rows = unserialize($file);
                // print_r($this->rows);
            }
            else
            {
                $this->rows = $data;
                $this->storeCache();
            }
        }
        
        return $this;
    }

    protected function storeCache()
    {
        $storecache = serialize($this->rows);
        file_put_contents($this->cachefile, $storecache, LOCK_EX);
    }

}