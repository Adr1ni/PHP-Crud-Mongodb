<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/crud-mongo/vendor/autoload.php";

class Connection{

    public function connection(){
        try{
            $bd = "test";
            $con = 'mongodb://mongo:HishARmlShynwMh6IWZP@containers-us-west-64.railway.app:7290';

            $client = new MongoDB\Client($con);

            return $client->selectDatabase($bd);

        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
}
