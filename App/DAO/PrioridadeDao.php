<?php

class PrioridadeDao
{

	private $conexao;

	public function __construct()
	{
		$dsn = "mysql:host=localhost:3306;dbname=suframa";

		$this->conexao = new PDO($dsn, 'root', '1234');
	}


    public function select()
    {
        $sql = "SELECT *
        FROM prioridade
        ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
