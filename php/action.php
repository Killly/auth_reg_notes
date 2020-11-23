<?php 
session_start();
if(isset($_POST["action"]))
{

	if($_POST["action"] == 'insert')
	{
		$login = $_SESSION['username'];
		$form_data = array(
			'tag' => $_POST['tag'],
			'message' => $_POST['message']
		);

		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=insert&login=".$login."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);

		foreach ($result as $keys => $values) 
		{
			if($result[$keys]['success'] == '1')
			{
				echo 'insert';
			}
			else 
			{
				echo 'error';
			}
		}
	}


	if($_POST["action"] == 'fetch_single')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=fetch_single&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client); 
		echo $response;
	}

	if($_POST["action"] == 'update')
	{
		$form_data = array(
			'tag' => $_POST['tag'],
			'message' => $_POST['message'],
			'id' => $_POST['hidden_id']
		);

		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=update";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client); 
		curl_close($client);
		$result = json_decode($response, true);
		foreach ($result as $keys => $values) 
		{

			if($result[$keys]['success'] == '1')
			{
				echo 'update';
			}
			else
			{
				echo 'error';
			}
		}
	}


	if($_POST["action"] == 'delete')
	{
		$id = $_POST["id"];
		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=delete&id=".$id."";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		echo $response;
	}
}

if(isset($_POST["user_reg"]) && isset($_POST["pass_reg"]))
{
	$form_data = array(
			'username' => $_POST['user_reg'],
			'password' => $_POST['pass_reg']
		);

		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=insertuser";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);

		foreach ($result as $keys => $values) 
		{
			if($result[$keys]['success'] == '1')
			{
				// echo 'insertuser';
				$_SESSION['username'] = $_POST['user_reg'];
				header('Location: zapiski.php');

			}
			else 
			{
				header('Location: registration.php');
			}
		}

}


if($_POST["hlogin"] == 'login')
{
	$form_data = array(
			'username' => $_POST['log_user'],
			'password' => $_POST['log_pass']
		);

		$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=auth";
		$client = curl_init($api_url);
		curl_setopt($client, CURLOPT_POST, true);
		curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($client);
		curl_close($client);
		$result = json_decode($response, true);

		foreach ($result as $keys => $values) 
		{
			if($result[$keys]['success'] == '1')
			{
				$_SESSION['username'] = $_POST['log_user'];

				header('Location: zapiski.php');
				// echo "col=".$result[$keys]['count'];
			}
			else 
			{
				$_SESSION['mess'] = 'Wrong password or login';
				header('Location: ../index.php');
			}
		}
}

 ?>

