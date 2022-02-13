<?php
header('Content-Type: application/json');
require_once('../vendor/autoload.php');


if($_GET['url']){

    $url = explode('/',$_GET['url']);

    if($url[0] === 'api'){
        array_shift($url);
        $controller = 'App\Controller\\'.ucfirst($url[0])."Controller";
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try{
            http_response_code(200);
            $response = call_user_func_array(array(new $controller, $method), $url);
            echo $response;
            
        } catch (\Exception $e) {

        }
    }

}