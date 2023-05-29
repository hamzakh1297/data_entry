<?php 
	$conn = mysqli_connect("localhost","root","","marriage") or die("Database Connection Failed.");

	function send($data){
		echo json_encode($data);
		die();
	}
	function validate($name){
		$name = trim($name);
		$name = htmlspecialchars($name);
		$name = stripslashes($name);
		$name = addslashes($name);
		return $name;
	}

		$name = validate($_POST['name']);
		$members = validate($_POST['members']);
		$invitation = validate($_POST['invitation']);
		$address = validate($_POST['address']);


		$insert = mysqli_query($conn,"INSERT INTO members(name,members,invitation,address)
		VALUES('$name','$members','$invitation','$address')
		");

		if($insert){
		$response = [
			"name" => $name,
			"members" => $members,
			"invitation" => $invitation,
			"address" => $address
		];
			send($response);
		}else{
			die("Error");
		}

?>