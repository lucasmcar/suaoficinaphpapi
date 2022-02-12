<?php

namespace App\Models;

use App\Bean\OficinaBean;

class OficinaModel
{
    private $bean;

    public function __construct()
    {
      $this->bean = new OficinaBean();    
    }

    public function getOficinaPorId($id) 
    {
        return $this->bean->retornaOficinaPorId($id);
    }

    public function getTodasOficinas() 
    {
        return $this->bean->retornaTodasOficinas();
    }
}