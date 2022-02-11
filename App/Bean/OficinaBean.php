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

    public function retornaOficinaPorId(OficinaVo $vo)
    {
        if(is_numeric($vo->__get('cdOficina')) && !empty($vo->__get('cdOficina'))){
            return json_encode(array('status' => 'success', 'data' => $this->dao->getOficinaPorId($vo)));
        }
        return 0;
    }

}