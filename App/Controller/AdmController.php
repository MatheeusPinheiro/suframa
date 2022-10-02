<?php 

class AdmController {

	public static function index(){
		include 'Model/AreaAtuacaoModel.php';
		include 'Model/CargoModel.php';
		include 'Model/FuncionarioModel.php';
		include 'Model/LoginModel.php';


		$modelAreaAtuacao = new AreaAtuacaoModel();
		$modelAreaAtuacao ->getAllRows();

		$modelCargo = new CargoModel();
		$modelCargo ->getAllRows();

		$modelFuncionario = new FuncionarioModel();
		$modelFuncionario ->getAllRows();

		$modelLogin = new LoginModel();
		$modelLogin = $modelLogin->getByLogin($_SESSION['login']);

		include 'View/modules/Adm/adm.php';
	}

	public static function alterarFuncionario(){
		include 'Model/FuncionarioModel.php';
		include 'Model/AreaAtuacaoModel.php';
		include 'Model/CargoModel.php';

		$modelAreaAtuacao = new AreaAtuacaoModel();
		$modelAreaAtuacao ->getAllRows();

		$modelCargo = new CargoModel();
		$modelCargo ->getAllRows();

		$modelFuncionario = new FuncionarioModel();
		if (isset($_GET['id'])) {
            $modelFuncionario = $modelFuncionario->getById((int) $_GET['id']);
        }

		include 'View/modules/Adm/AtualizarFuncionario.php';
	}

	public static function excluirFuncionario()
    {
        include 'Model/FuncionarioModel.php';
        $modelFuncionario = new FuncionarioModel();

        $modelFuncionario->delete((int) $_GET['id']);

        header('location: /adm');
    }
}