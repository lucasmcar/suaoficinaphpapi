<?php

namespace App\Dao;

use App\Config\Connection;

class OficinaDao
{

    private $con;

    public function getOficinaPorId($id)
    {
        try{
            $this->con = Connection::getConnection();
            $sql = "SELECT nmoficina AS Oficina FROM oficina WHERE cdoficina = :cdoficina";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':cdoficina', intval($id));
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }
        } catch(\PDOException $ex){
            return "Erro ao procurar: " .$ex->getMessage();
        }
        
    }

    public function getTodasOficinas()
    {
        try{
            $this->con = Connection::getConnection();
            $sql = "SELECT nmoficina as Oficina FROM oficina";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
               return  $stmt->fetchAll(\PDO::FETCH_ASSOC);
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