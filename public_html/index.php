<?php

require_once('../vendor/autoload.php');


if($_GET['ur']){

    $url = explode('/',$_GET['url']);

    if($url[0] === 'api'){
        array_shift($url);
        $controller = ucfirst($url[0])."Service";
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try{
            $response = call_user_func_array(array(new $controller, $method), $url);
            return $response;
        } catch (\Exception $e) {

        }


    }

}