<?php
	header("Content-Type:application/json");
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mahasiswa";

    $conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];

	if($smethod == $smethod){

		 parse_str(file_get_contents("php://input"),$post_vars);
    	$id = $post_vars['id'];

		$sql = "DELETE FROM mahasiswa WHERE id = '$id'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data dihapus";
		$result['result'] = array(
			"id" =>$id,
		);

	}else{
		$result['status']['code'] = 400;
	}


	echo json_encode($result);
?>