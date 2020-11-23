<?php 
session_start();
class API
{
	private $connect = '';

	function __construct() 
	{
		$this->database_connection();
	}

	function database_connection() 
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=zapiski", "root", "root");
	}

	function fetch_all($login)
	{
		$query = "SELECT * FROM `notes` WHERE `login` = '$login' ORDER BY `id` DESC";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while ($row = $statement->fetch(PDO::FETCH_ASSOC)) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function auth()
	{
		// $form_data = array(
		// 	':username' => $_POST['username'],
		// 	':password' => $_POST['password']
		// );
		$login = $_POST["username"];
		$pass = $_POST["password"];
		// $query = "SELECT COUNT(*) FROM users WHERE username = :username AND password = :password";
		$query = "SELECT COUNT(*) FROM users WHERE username = '$login' AND password = '$pass'";
		// $statement = $this->connect->prepare($query);
		// $result = $statement->execute($form_data);
		$stmt = $this->connect->query($query);
		$count = $stmt->fetchColumn();
		if($count > 0)
		{

			$data[] = array(
					'success' => '1',
					'count' => $count
				);

		}
		else 
		{
			
			$data[] = array(
				'success' => '0'
			);
		}
		return $data;
	}

	function insert($login)
	{
		if(isset($_POST["tag"]))
		{
			$form_data = array(
				':tag' => $_POST["tag"],
				':message' => $_POST["message"],
				':login' => $login
			);
			$query = "INSERT INTO notes (id, tag, message, login) VALUES (NULL, :tag, :message, :login)";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success' => '1'
				);
			}
			else 
			{
				$data[] = array(
					'success' => '0'
				);
			}
		}
		else
		{
			$data[] = array(
					'success' => '0'
				);
		}
		return $data;
	}


	function insertuser()
	{
			$form_data = array(
				':username' => $_POST["username"],
				':password' => $_POST["password"]
			);
			$query = "INSERT INTO users (id, username, password) VALUES (NULL, :username, :password)";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success' => '1'
				);
			}
			else 
			{
				$data[] = array(
					'success' => '0'
				);
			}
	
		return $data;
	}


	function fetch_single($id)
	{
		$query = "SELECT * FROM notes WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach ($statement->fetchAll() as $row) 
			{
				$data['tag'] = $row['tag'];
				$data['message'] = $row['message'];
			}
			return $data;
		}
	}


	function update()
	{
		if(isset($_POST["tag"]))
		{
			$form_data = array(
				':tag' => $_POST['tag'],
				':message' => $_POST['message'],
				':id' => $_POST['id']
			);

			$query = "UPDATE notes SET tag = :tag, message = :message WHERE id = :id";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success' => '1'
				);
			}
			else 
			{
				$data[] = array(
					'success' => '0'
				);
			}
		}
		else
		{
			$data[] = array(
					'success' => '0'
				);
		}
		return $data;
		
	}


	function delete($id)
	{
		$query = "DELETE FROM notes WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success' => '1' 
			);
		}
		else
		{
			$data[] = array(
				'success' => '0' 
			);
		}
		return $data;
	}
}
 ?>
