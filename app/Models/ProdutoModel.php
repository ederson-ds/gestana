<?php

namespace App\Models;

use R;

class ProdutoModel extends RedbeanModel {

    public $table = "produto";
    protected $searchColumn = 'descricao';
    public $descricao;
    
    public function load($id) {
        $produto = R::load($this->table, $id);
        $this->descricao = $produto->descricao;
        return $produto;
    }
    
    public function store($id, $self, $data) {
        if (!$data['error'] && $self->getMethod() === 'post') {
            $produto = R::load($this->table, $id);
            $produto->descricao = $this->descricao;
            R::store($produto);
            if ($id) {
                $data['msg'] = "Produto editado com sucesso!";
            } else {
                $data['msg'] = "Produto cadastrado com sucesso!";
                $produto->descricao = "";
                $data[$this->table] = $produto;
            }
        }
        return $data;
    }

}
