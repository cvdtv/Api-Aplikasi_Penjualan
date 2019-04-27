<?php

    require_once ('koneksi.php');

	class usr{}

	$email = $_POST["email"];
	$password = $_POST["password"];
    
	if ((empty($email)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM pengguna WHERE email='$email' AND password='$password'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['email'];
		$response->idpengguna = $row['idpengguna'];
        $response->email = $row['email'];
        $response->password = $row['password'];
        $response->keycustomer = $row['keycustomer'];
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "email atau password salah";
		die(json_encode($response));
	}
	
	mysqli_close($con);

?>