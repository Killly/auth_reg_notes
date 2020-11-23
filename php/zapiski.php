<?php session_start(); 
// if(!$_SESSION['username'])
// {
// 	header('Location: ../index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/main.css">
</head>
<body>
	<header class="notes-header">
		<span id="uname">Hello -  <b><?= " ".$_SESSION['username']; ?></b></span>
		<a href="logout.php"><div style="color:white; background: #4D4251FF; padding: 5px; border-radius: 4px;">Log out</div></a>
	</header>
	<div class="zcontainer">
		<button type="button" name="add_button" id="add_button" class="btn btn-success">Add</button>
		<table class="table table-bordered table-striped">
			<thead>
				<tr style="text-align: center">
					<th>Note tag</th>
					<th>Note message</th>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>



</body>
</html>
<div id="apicrudModal" class="modal" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add data</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="">Enter Tag</label>
						<input type="text" name="tag" id="tag" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Enter Message</label>
						<input type="text" name="message" id="message" class="form-control">
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="hidden_id" id="hidden_id">
					<input type="hidden" name="action" id="action" value="insert">
					<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert">
					<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
				</div>

			</form>
		</div>
	</div>
</div>	

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="../js/main.js"></script>