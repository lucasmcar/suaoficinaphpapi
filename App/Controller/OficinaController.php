<?php

namespace App\Controller;

use App\Vo\OficinaVo;
use App\Models\OficinaModel;

class OficinaController
{
    public static function get(OficinaVo $vo)
    {
        if(isset($vo) && is_numeric($vo->__get('cdOficina')))
        {
            $oficina = new OficinaModel();
            return $oficina->getOficinaPorId($vo);
        }
    }

    public static function post()
    {

    } 
}