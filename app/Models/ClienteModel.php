<?php

namespace App\Models;

use R;

class ClienteModel extends RedbeanModel {

    public $table = "cliente";
    protected $searchColumn = 'nome';
    public $nome;
    public $cpf;
    
    public function load($id) {
        $cliente = R::load($this->table, $id);
        $this->nome = $cliente->nome;
        $this->cpf = $cliente->cpf;
        return $cliente;
    }
    
    public function store($id, $self, $data) {
        if (!$data['error'] && $self->getMethod() === 'post') {
            $cliente = R::load($this->table, $id);
            $cliente->nome = $this->nome;
            $cliente->cpf = $this->cpf;
            R::store($cliente);
            if ($id) {
                $data['msg'] = "Cliente editado com sucesso!";
            } else {
                $data['msg'] = "Cliente cadastrado com sucesso!";
                $cliente->nome = "";
                $cliente->cpf = "";
                $data[$this->table] = $cliente;
            }
        }
        return $data;
    }

}
