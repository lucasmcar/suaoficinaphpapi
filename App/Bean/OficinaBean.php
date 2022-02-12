<?php

namespace App\Bean;

use App\Dao\OficinaDao;
use App\Vo\OficinaVo;

class OficinaBean
{

    private $dao;

    public function __construct()
    {
        $this->dao = new OficinaDao();
    }

    /**
     * Método que retorna a oficina para tela no formato json
     * @return 0 se não encontrar dados
     */

    public function retornaOficinaPorId($id)
    {
        if(is_numeric($id)){
            return json_encode(array('status' => 'success', 'data' => $this->dao->getOficinaPorId($id)), JSON_PRETTY_PRINT);
        }
        return 0;
    }

    public function retornaTodasOficinas()
    {
         return json_encode(array('status' => 'success', 'data' => $this->dao->getTodasOficinas()),  JSON_OBJECT_AS_ARRAY);
    }

}