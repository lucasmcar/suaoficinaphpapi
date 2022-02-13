<?php

namespace App\Models;

use App\Bean\VeiculoBean;

class VeiculoModel
{
    private $bean;

    public function __construct()
    {
      $this->bean = new VeiculoBean();    
    }

    public function getVeiculoPorId($idveiculo) 
    {
        return $this->bean->retornaVeiculoPorId($idveiculo);
    }

    public function getVeiculoPorPlaca($placa) 
    {
        return $this->bean->retornaVeiculoPorPlaca($placa);
    }

    public function getTodosVeiculos() 
    {
        return $this->bean->retornaTodosVeiculos();
    }
}