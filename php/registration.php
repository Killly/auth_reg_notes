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
	<link rel="stylesheet" href="../style/main.css">
	<title>Reg</title>


</head>
<body>
	<div class="container">
		<form id="reg_form" class="auth-form" method="post" action="action.php">

			<input type="text" name="user_reg" id="reg_username" class="form form-control" placeholder="Enter your username">
			
			<input type="password" name="pass_reg" id="reg_pass" class="form form-control" placeholder="Enter your password">

			<button id="reg_send" class="btn btn-success btn-log">Sign up</button><br>

			<h6>Have an account? - <a href="../index.php">Sign in</a></h6>
		</form>
	</div>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>
</body>
</html>