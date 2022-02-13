<?php

namespace App\Bean;

use App\Dao\VeiculoDao;

class VeiculoBean
{
    private $dao;

    public function __construct()
    {
        $this->dao = new VeiculoDao();
    }

    public function retornaVeiculoPorId($idveiculo)
    {
        if(is_numeric($idveiculo)){
            return json_encode(array('status' => 'success', 'data' => $this->dao->getVeiculoPorId($idveiculo)), JSON_PRETTY_PRINT);
        } 
        return 0;
    }

    public function retornaVeiculoPorPlaca($placa)
    {
         return json_encode(array('status' => 'success', 'data' => $this->dao->getVeiculoPorPlaca($placa)),  JSON_OBJECT_AS_ARRAY);
    }

    public function retornaTodosVeiculos()
    {
         return json_encode(array('status' => 'success', 'data' => $this->dao->getTodosVeiculos()),  JSON_OBJECT_AS_ARRAY);
    }
}