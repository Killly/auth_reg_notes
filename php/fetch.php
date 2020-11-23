<?php 
session_start();
$login = $_SESSION['username'];
$api_url = "http://localhost/auth_reg_zametkibackuptest/api/test_api.php?action=fetch_all&login=".$login."";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach ($result as $row) 
	{
		$output .= '
		<tr>
			<td style="text-align:center">'.$row->tag.'</td>
			<td style="display:flex">
			<div style="flex: 0 0 70%">'.$row->message.'</div>
			<div style="flex: 0 0 30%"><button type="button" name="edit" class="btn btn-warning edit" id="'.$row->id.'">Edit</button>
			<button type="button" name="delete" class="btn btn-danger delete" id="'.$row->id.'">Delete</button></div>
			</td>
		</tr>
		';	
	}
}
else 
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';

}

echo "$output";
 ?>