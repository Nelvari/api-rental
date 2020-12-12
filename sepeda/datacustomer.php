<?php
    $roleuser = $_POST['roleuser'];
	$con = mysqli_connect("localhost","root","","dbrentalsepeda");
	$sql = "SELECT * FROM tbuser where roleuser = '$roleuser'";
	$json["STATUS"] = array();
	$json["MESSAGE"] = array();
	$result = mysqli_query($con, $sql);
	$count = mysqli_num_rows($result);
	if ($result) {
		$json["STATUS"] = "SUCCESS";
		$json["MESSAGE"] = "SUCCESS";
		if ($count > 0) {
			$json["PAYLOAD"] = [];
			while ($row = mysqli_fetch_array($result)) {
				$id = $row["id"];
				$email = $row['email'];
				$nama = $row['nama'];
				$nohp = $row['nohp'];
				$alamat = $row['alamat'];
				$noktp = $row['noktp'];
				$array["id"] = $id;
				$array["email"] = $email;
				$array["nama"] = $nama;
				$array["nohp"] = $nohp;
				$array["alamat"] = $alamat;
				$array["noktp"] = $noktp;
				$array["roleuser"] = $row["roleuser"];
				array_push($json["PAYLOAD"], $array);
			}
		} else {
			$json["PAYLOAD"]["USER_INFO"] = "null";
		}
	} else {
		$json["STATUS"] = "FAILED";
		$json["MESSAGE"] = mysqli_error($con);
	}
	echo json_encode($json);
?>