<?php

namespace App\Db;

use \PDO;

class DataBase{

    const HOST = 'localhost';
    const NAME = 'dev_vagas';
    const USER = 'root';
    const PASS = '';

    private $table;

    private $conexao;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConexao();
    }


    private function setConexao(){
        try{
       $this->conexao = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
       $this->conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
    }catch(PDOException $e){
          die("ERRO:" .$e->getMenssage());
        }

    }

    public function execute($query,$params = []){
        try{
           $statement = $this->conexao->prepare($query);
           $statement->execute($params);
           return $statement;
        }catch(PDOException $e){
            die("ERRO:" .$e->getMenssage());
          }
    }
    
     
    public function insert($values){

        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');
    
    

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUE ('.implode(',',$binds).')';
        $this->execute($query,array_values($values));

        return $this->conexao->lastInsertId();
    }
 
}