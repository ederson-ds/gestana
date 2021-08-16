<?php

namespace App\Controllers;

class Clientes extends BaseController {

    public function index() {
        $data = parent::indexview(new \App\Models\ClienteModel(), 'clientes');
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('toptable', $data);
        echo view('clientes/clientes', $data);
        echo view('paginacao', $data);
        echo view('templates/footerindex');
    }

    public function create($id = 0) {
        $data['id'] = $id;
        $clienteModel = new \App\Models\ClienteModel();
        $data['cliente'] = $clienteModel->load($id);

        $data = validarSomenteLetrasENumeros(["nome", "cpf"], $clienteModel, $data, $this->request);
        $data = validaCamposObrigatorios(["nome"], $clienteModel, $data, $this->request);

        $data = $clienteModel->store($id, $this->request, $data);
        
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('clientes/clientesadd', $data);
        echo view('templates/footer', $data);
    }

    public function excluir($id) {
        $clienteModel = new \App\Models\ClienteModel();
        $clienteModel->excluir($id);
        return redirect()->to('/clientes');
    }

}
