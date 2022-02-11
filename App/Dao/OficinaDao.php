<?php

namespace App\Dao;

use App\Vo\OficinaVo;
use App\Config\Connection;

class OficinaDao
{

    private $con;

    public function getOficinaPorId(OficinaVo $vo)
    {
        try{
            $this->con = Connection::getConnection();
            $sql = "SELECT nmoficina FROM oficina WHERE cdoficina = :cdoficina";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':cdoficina', $vo->__get('cdOficina'));
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                json_encode($stmt->fetch(\PDO::FETCH_ASSOC));
            }else 
            {
                return [
                    '1' => 'nenhum usuario encontrado'
                ];
            }
        } catch(\PDOException $ex){
            return "Erro ao procurar: " .$ex->getMessage();
        }
        
    }
    
}