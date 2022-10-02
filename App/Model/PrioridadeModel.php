<?php

class PrioridadeModel
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
      include 'DAO/PrioridadeDao.php';

      $dao = new PrioridadeDao();
      $this->rows = $dao->select();
   }
}
