<?php

namespace App\Controllers;

class Produtos extends BaseController
{
	public function index()
	{
		$data = parent::indexview(new \App\Models\ProdutoModel(), 'produtos');
		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtos', $data);
		echo view('templates/footer');
	}

	public function inserir()
	{
		$data['acao'] = 'Inserir';
		$data['msg'] = '';
		$produtoModel = new \App\Models\ProdutoModel();
		$data['produto'] = $produtoModel->load(0);
		if ($this->request->getMethod() === 'post') {
			$produtoModel->descricao = $this->request->getPost('descricao');
			$produtoModel->insert();
			$data['msg'] = 'Produto inserido com sucesso';
		}

		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtosadd', $data);
		echo view('templates/footer');
	}

	public function editar($produto_id)
	{
		$data['acao'] = 'Editar';
		$data['msg'] = '';
		$produtoModel = new \App\Models\ProdutoModel();
		if ($this->request->getMethod() === 'post') {
			$produtoModel->descricao = $this->request->getPost('descricao');
			$produtoModel->edit($produto_id);
			$data['msg'] = 'Produto atualizado com sucesso';
		}
		$data['produto'] = $produtoModel->findOne($produto_id);

		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtosadd', $data);
		echo view('templates/footer');
	}
}
