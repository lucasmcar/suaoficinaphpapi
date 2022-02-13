<?php

namespace App\Config;

use App\Config\ConfigConnection;
use PDO;
use PDOException;

class Connection
{
    private static $instance;
    private static $columns;

    public static function getConnection(){

        self::$instance = null;
        $arrayConnectionData = ConfigConnection::setConfigConnection("env.ini");
        try{
            self::$instance = new PDO(
                'mysql:host='.$arrayConnectionData['host'].';
                 port='.$arrayConnectionData['dbport'].';
                 dbname='.$arrayConnectionData['database'], 
                 $arrayConnectionData['user'], 
                 $arrayConnectionData['password']);
            self::$instance->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
            return self::$instance;
        } catch(PDOException $ex){
            return $ex->getMessage();
        }
    }

    /**
     * Retorna a query Select passando as colunas por parâmentro em um array
     * @param $columns array() valor default *
     * @param $table nome da tabela
     * @return $newSql vai ser tratada se as colunas forem array 
     * @return $sql default caso não seja passado o array por parametro
     * 
     */
    public static function getSelectcolumns($table, $columns = '*',  $join = false)
    {
        $sql = "SELECT ";
        if(is_array($columns)){
            foreach($columns as $column)
            {
                $sql .= $column. ", " ;
            }
            $lastPos = strripos($sql, ", ");
            $str = substr($sql, 0, $lastPos);
            $newSql =  "${str}  FROM  ${table}";
            return $newSql;
        } else {
            $sql .= "${columns} FROM ${table}";
            return $sql;
        }
        
    }
}