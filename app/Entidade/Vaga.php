<?php

namespace App\Entidade;
use \PDO;

use \App\Db\DataBase;

class Vaga{

    public $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;


    public function cadastra(){
        $this->data = date('Y-m-d H:i:s');

        $obDatabase = new DataBase('vagas');
        $this->id=$obDatabase->insert([
          'titulo' => $this->titulo,
          'descricao' => $this->descricao,
          'ativo' => $this->ativo,
          'data' => $this->data
        ]);
       return true;
    }

    public static function getVagas($where = null, $order = null, $limit = null){
      return (new DataBase('vagas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getVagaId($id){
      return (new DataBase('vagas'))->select('id = '.$id)
      ->fetchObject(self::class);
    }


    public function atualizar(){
      return (new DataBase('vagas'))->update('id=' .$this->id,[
         'titulo' => $this->titulo,
         'descricao' => $this->descricao,
         'ativo' => $this->ativo,
         'data' => $this->data
       ]);
     }
 
     public function excluir(){
      return (new DataBase('vagas'))->delete('id =' .$this->id);
     }

}