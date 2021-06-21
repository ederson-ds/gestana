<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['teste'] = "Testando";

		echo view('templates/header', $data);
		echo view('templates/sidebar');
		echo view('pagina1');
		echo view('templates/footer');
	}
}
