 <?php

	class FuncionarioModel
	{

		//CAMPOS DA TABELA FUNCIONARIO
		public $id, $avatar,
			$path, $nome, $cpf,
			$login, $senha, $cargo_id, $area_atuacao_id, $tipouser;

		public function save()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			$dao->insert($this);
		}

		public function update()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			$dao->update($this);

		}

		public function getAllRows()
		{
			include 'DAO/FuncionarioDao.php';

			$dao = new FuncionarioDao();
			$this->rows = $dao->select();
		}

		public function getById(int $id)
		{
			include 'DAO/FuncionarioDAO.php ';
			$dao = new FuncionarioDAO();

			$obj = $dao->selectById($id);
			if ($obj) {
				return $obj;
			} else {
				return new FuncionarioModel();
			}
		}

		public function delete(int $id)
		{
			include 'DAO/FuncionarioDAO.php ';
			$dao = new FuncionarioDAO();

			$dao->delete($id);
		}
	}
