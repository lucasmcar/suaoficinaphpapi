<?php

namespace App\Controller;

use App\Vo\OficinaVo;
use App\Models\VeiculoModel;

class VeiculoController
{
    public static function get($idveiculo = null, $placa = null)
    {
        $veiculo = new VeiculoModel();
        if(is_numeric($idveiculo))
        {
            return $veiculo->getVeiculoPorId($idveiculo);
        } else if($placa !== null && $placa !== ''){
            return $veiculo->getVeiculoPorPlaca($placa);
        } else {
            return $veiculo->getTodosVeiculos();
        }
    }

    public static function post()
    {

    } 
}