<?php

class controller{

    protected function filteroutput($string){
    }
    
    protected function view($view, $data = array()){
        require_once __DIR__."/../views/".$view.".php";
    }

    protected function deliverJSONResponse($status, $statusMessage, $data){
        header("Content-Type:application/json");
        header("HTTP/1.1 $status $statusMessage");

        $response["status"] = $status;
        $response["statusMessage"] = $statusMessage;
        $response["data"] = $data;

        $jsonResponse = json_encode($response);
        echo $jsonResponse;

    }

    protected function database(){
        $handler = false;
        try{
            $handler = new PDO("mysql:host=127.0.0.1;dbname=takshak;charset=utf8", "root", "");
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
            $handler = false;
        }
        return $handler;
    }

}