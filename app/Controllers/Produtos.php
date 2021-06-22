<?php

namespace App\Controllers;

class Produtos extends BaseController
{
	private $registros = array("5", "2", "10", "25", "50", "100");
	public function index()
	{
		$data['registros'] = 5;
		$data['registrosList'] = $this->registros;
		$data['pagina'] = 1;
		if ($this->request->getMethod() === 'post') {
			$data['registros'] = $this->request->getPost('registros');
			$data['pagina'] = $this->request->getPost('pagina');
		}
		$skip = $data['pagina'] * $data['registros'] - $data['registros'];
		$produtoModel = new \App\Models\ProdutoModel();
		$data['produtos'] = $produtoModel->findAll($data['registros'], $skip);
		$data['totalItems'] = $produtoModel->countAllResults();
		echo view('templates/header');
		echo view('templates/sidebar');
		echo view('produtos/produtos', $data);
		echo view('templates/footer');
	}

	public function inserir()
	{
		$data['acao'] = 'Inserir';
		$data['msg'] = '';

		if ($this->request->getMethod() === 'post') {
			$produtoModel = new \App\Models\ProdutoModel();
			$produtoModel->set('descricao', $this->request->getPost('descricao'));
			if ($produtoModel->insert()) {
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
