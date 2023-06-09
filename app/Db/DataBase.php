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
 

    public function select($where = null, $order = null, $limit = null){
       $where = strlen($where) ? 'WHERE '.$where : '';
       $order = strlen($order) ? 'ORDER BY '.$order : '';
       $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT * FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
           
        return $this->execute($query);
    }


    public function update($where, $values){
        $filds = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,', $filds).'=? WHERE '.$where;
    $this->execute($query, array_values($values));
    return true;
    }

    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }

}