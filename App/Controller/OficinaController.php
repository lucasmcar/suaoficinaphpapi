<?php

namespace App\Controller;

use App\Vo\OficinaVo;
use App\Models\OficinaModel;

class OficinaController
{
    public static function get($id = null)
    {
        $oficina = new OficinaModel();
        if(is_numeric($id))
        {
            return $oficina->getOficinaPorId($id);
        } else {
            return $oficina->getTodasOficinas();
        }
    }

    public static function post()
    {

    } 
}