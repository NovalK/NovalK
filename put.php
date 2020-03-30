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
		$Nama = $post_vars['Nama'];
        $Jenis_Kelamin = $post_vars['Jenis_Kelamin'];
        $Umur = $post_vars['Umur'];

		$sql = "UPDATE mahasiswa SET
					id = '$id',
					Nama = '$Nama',
					Jenis_Kelamin = '$Jenis_Kelamin',
                    Umur = '$Umur'
				WHERE id = '$id'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data di update";
		$result['result'] = array(
			"id"=>$id,
			"Nama"=>$Nama,
            "Jenis_Kelamin"=>$Jenis_Kelamin,
            "Umur" =>$Umur
		);

	}else{
		$result['status']['code'] = 400;
	}

	echo json_encode($result);
?>