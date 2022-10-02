<?php

class AreaAtuacaoModel
{
    public $id;
    public $nome;
    private $conexao;

    public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '1234');
	}

	public function getAllRows()
    {
        include 'DAO/AreaAtuacaoDao.php';

        $dao = new AreaAtuacaoDao();
        $this->rows = $dao->select();
    }
}
