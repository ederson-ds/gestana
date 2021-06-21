<?php

namespace App\Controllers;

class Produtos extends BaseController
{
	public function index()
	{
		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtos');
		echo view('templates/footer');
	}

	public function inserir() {
		$data['acao'] = 'Inserir';
		$data['msg'] = '';

		if($this->request->getMethod() === 'post') {
			$produtoModel = new \App\Models\ProdutoModel();
			$produtoModel->set('descricao', $this->request->getPost('descricao'));
			if($produtoModel->insert()) {
				$data['msg'] = 'Produto inserido com sucesso';
			} else {
				$data['msg'] = 'Erro ao inserir';
			}
		}

		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtosadd', $data);
		echo view('templates/footer');
	}
}
