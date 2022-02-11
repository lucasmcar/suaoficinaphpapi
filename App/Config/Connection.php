<?php

namespace App\Config;

use App\Config\ConfigConnection;
use PDO;
use PDOException;

class Connection
{
    private static $instance;

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
}