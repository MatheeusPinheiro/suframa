<?php

class FuncionarioController
{

	public static function index()
	{
		include 'Model/LoginModel.php';
		include 'Model/TipoDemandaModel.php';
		include 'Model/PrioridadeModel.php';
		include 'Model/AndamentoModel.php';
		include 'Model/DemandaModel.php';

		$modelTipoDemanda = new TipoDemandaModel();
		$modelTipoDemanda->getAllRows();

		$modelPrioridade = new PrioridadeModel();
		$modelPrioridade->getAllRows();

		$modelAndamento = new AndamentoModel();
		$modelAndamento->getAllRows();


		$modelLogin = new LoginModel();
		$modelLogin = $modelLogin->getByLogin($_SESSION['login']);

		$modelDemanda = new DemandaModel();
		$modelDemanda = $modelDemanda->getById($modelLogin->funcId);

		include 'View/modules/Funcionario/PaginaInicial.php';
	}

	public static function update()
	{
		include 'Model/FuncionarioModel.php';

		$model = new FuncionarioModel();
		$model->id = $_POST['id'];
		$model->nome = $_POST['nome'];
		$model->cpf = $_POST['cpf'];
		$model->login = $_POST['login'];
		$model->senha = $_POST['senha'];
		$model->cargo_id = $_POST['cargo_id'];
		$model->area_atuacao_id = $_POST['area_atuacao_id'];
		$model->tipouser = $_POST['usuario'];

		$model->update();
		
		header('location: /adm');
	}

	public static function save()
	{
		include 'Model/FuncionarioModel.php';

		$model = new FuncionarioModel();

		$arquivo = $_FILES['avatar'];
		if ($arquivo["error"])
			die("falha ao enviar arquivo");

		$pasta = "upload/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));


		$model->nome = $_POST['nome'];
		$model->cpf = $_POST['cpf'];
		$model->login = $_POST['login'];
		$model->senha = $_POST['senha'];
		$model->cargo_id = $_POST['cargo_id'];
		$model->area_atuacao_id = $_POST['area_atuacao_id'];
		$model->tipouser = $_POST['usuario'];

		$path = $pasta . $novoNomeDoArquivo . "." . $extensao;

		$model->avatar = $nomeDoArquivo;
		$model->path = $path;

		if ($extensao !== "jpg" && $extensao !== "png" && $extensao !== "jpeg" && $extensao !== 'gif')
			die("Tipo de arquivo não aceito");

		move_uploaded_file($arquivo["tmp_name"], $path);

		$model->save();
		header('location: /adm');

	}
}
