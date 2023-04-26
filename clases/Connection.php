<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/crud-mongo/vendor/autoload.php";

class Connection{

    public function connection(){
        try{

            $server = "localhost";
            $username = "adriano";
            $password = "123456";
            $bd = "crud";
            $port = "27017";

            $con = "mongodb://". 
                $username. ":" . 
                $password . "@" . 
                $server . ":" .
                $port . "/" . 
                $bd;

            $client = new MongoDB\Client($con);

            return $client->selectDatabase($bd);

        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
}
