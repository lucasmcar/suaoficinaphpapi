<?php

namespace App\Dao;

use App\Config\Connection;

class VeiculoDao
{
    public function getVeiculoPorId($idveiculo)
    {
        try{
            $this->con = Connection::getConnection();
            $sql = "SELECT nmoveiculo AS Modelo FROM veiculo WHERE cdveiculo = :cdveiculo";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':cdveiculo', intval($idveiculo));
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }
        } catch(\PDOException $ex){
            return "Erro ao procurar: " .$ex->getMessage();
        }
        
    }

    public function getVeiculoPorPlaca($placa)
    {
        try{
            $this->con = Connection::getConnection();
            $sql = "SELECT nmveiculo AS Modelo FROM veiculo WHERE placa = :placa";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':placa', $placa);
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                return $stmt->fetch(\PDO::FETCH_ASSOC);
            }
        } catch(\PDOException $ex){
            return "Erro ao procurar: " .$ex->getMessage();
        }
        
    }

    public function getTodosVeiculos()
    {
        try{
            $this->con = Connection::getConnection();
            $sql = strval(Connection::getSelectcolumns('veiculo', array('nmveiculo', 'nrporta', 'placa', 'cor')));
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