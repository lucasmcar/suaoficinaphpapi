<?php

namespace App\Config;

class ConfigConnection 
{

    private static $rootPath;

    private function __construct()
    { 
    }

    /**
     * Método que seta configuração de conexão ao banco
     * @return array
     */
    public static function setConfigConnection($file) 
    {
        self::$rootPath = $_SERVER['DOCUMENT_ROOT'];

        $file = realpath(self::$rootPath.'//SuaOficina-APIPHP//'.$file);
        $envFile = parse_ini_file($file);
        return $envFile;
        
    }
}

