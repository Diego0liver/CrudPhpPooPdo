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
}