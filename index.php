<?php 
session_start();
if($_SESSION['username'])
{
	header('Location: php/zapiski.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="style/main.css">
	<title>Auth</title>


</head>
<body>
	<div class="container">
		<form action="php/action.php" class="auth-form" method="post">
			<input type="hidden" id="hlogin" name="hlogin" value="login">

			<input type="text" name="log_user" id="log_username" class="form form-control" placeholder="Enter your username">
			
			<input type="password" name="log_pass" id="pass" class="form form-control" placeholder="Enter your password">

			<button id="log_send" class="btn btn-success btn-log">Sign in</button><br>

			<h6>No account? - <a href="php/registration.php">Sign up</a></h6>
		</form>
	</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>