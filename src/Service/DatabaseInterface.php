<?php
namespace App\Service;

use \PDO;

class DatabaseInterface
{

public function getAllLegos(){
    $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=mysql", "root", "root");
    $answer = $cnx->query("SELECT * FROM lego"); 
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    json_encode($res);
    return $res;
}

public function getLegosByCollection($collection) :array{
    $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=mysql", "root", "root");
    $answer = $cnx->query("SELECT * FROM lego WHERE collection = '$collection'"); 
    $res = $answer->fetchAll(PDO::FETCH_OBJ);
    json_encode($res);
    return $res;
}

}