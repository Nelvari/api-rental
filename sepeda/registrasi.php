<?php
    $noktp = $_POST['noktp'];
    $email = $_POST['email'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$nohp = $_POST['nohp'];
	$alamat = $_POST['alamat'];
	$json["hasil"] = array();
	$con = mysqli_connect("localhost","root","","dbrentalsepeda");
	$query = "SELECT id FROM tbuser WHERE email = '$email'";
	$check = mysqli_num_rows(mysqli_query($con, $query));
	if ($check == 0) {
		$sql = "INSERT INTO tbuser(noktp, email, nama, password, nohp, alamat, roleuser) VALUES ('$noktp', '$email', '$nama', '$password', '$nohp', '$alamat', 2)";
		$result = mysqli_query($con, $sql);
		if ($result) {
			$json["hasil"]["STATUS"] = "SUCCESS";
			$json["hasil"]["MESSAGE"] = "SUCCESS";
		} else {
			$json["hasil"]["STATUS"] = "FAILED";
			$json["hasil"]["MESSAGE"] = mysqli_error($con);
		}
	} else {
		$json["hasil"]["STATUS"] = "FAILED";
		$json["hasil"]["MESSAGE"] = "Duplicated Username";
	}
	echo json_encode($json);
?>