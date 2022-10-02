<?php

class DemandaModel
{

	//CAMPOS DA TABELA FUNCIONARIO
	public $id, $descricao,
		$data_inicio, $data_termino, $observacao,
		$prioridade_id, $tipo_demanda_id, $andamento_id, $funcionario_id, $porcentagem;

	public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '1234');
	}

	public function save()
	{
		include 'DAO/DemandaDao.php';

		$dao = new DemandaDao();

		$dao->insert($this);
	}

	public function getById(int $id)
    {
        include 'DAO/DemandaDAO.php';
        $dao = new DemandaDAO();

        $obj = $dao->selectById($id);
        if($obj){
            return $obj;
        }
    }

	public function getAllRows()
    {
        include 'DAO/DemandaDao.php';

        $dao = new DemandaDao();
        $this->rows = $dao->selectAll();
    }
}
