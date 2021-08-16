<?php

namespace App\Controllers;

class Produtos extends BaseController {

    public function index() {
        $data = parent::indexview(new \App\Models\ProdutoModel(), 'produtos');
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('toptable', $data);
        echo view('produtos/produtos', $data);
        echo view('paginacao', $data);
        echo view('templates/footerindex');
    }

    public function create($id = 0) {
        $data['id'] = $id;
        $produtoModel = new \App\Models\ProdutoModel();
        $data['produto'] = $produtoModel->load($id);

        $data = validarSomenteLetrasENumeros(["descricao"], $produtoModel, $data, $this->request);
        $data = validaCamposObrigatorios(["descricao"], $produtoModel, $data, $this->request);

        $data = $produtoModel->store($id, $this->request, $data);
        
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('produtos/produtosadd', $data);
        echo view('templates/footer', $data);
    }

    public function excluir($produto_id) {
        $produtoModel = new \App\Models\ProdutoModel();
        $produtoModel->excluir($produto_id);
        return redirect()->to('/produtos');
    }

}
