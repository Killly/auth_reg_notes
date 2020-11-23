<?php 
session_start();
include('api.php');

$api_object = new API();

if($_GET["action"] == 'fetch_all')
{
	$data = $api_object->fetch_all($_GET["login"]);
}

if($_GET["action"] == 'insert')
{
	$data = $api_object->insert($_GET["login"]);
}

if($_GET["action"] == 'fetch_single')
{
	$data = $api_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'update')
{
	$data = $api_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $api_object->delete($_GET["id"]);
}

if($_GET["action"] == 'insertuser')
{
	$data = $api_object->insertuser();
}

if($_GET["action"] == 'auth')
{
	$data = $api_object->auth();
}
echo json_encode($data);
 ?>
