<?php

namespace App\Models;

use App\Bean\OficinaBean;
use App\Config\Connection as ConfigConnection;
use Config\Connection;
use App\Vo\OficinaVo;

class OficinaModel
{
    private $bean;

    public function __construct()
    {
      $this->bean = new OficinaBean();    
    }

    public function getOficinaPorId(OficinaVo $oficina) 
    {
        return $this->bean->retornaOficinaPorId($oficina)
;    }
}