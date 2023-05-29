<?php 
require_once 'includes/connect.php';

	$userId = $_POST['user_id'];

	$update = mysqli_query($conn,"UPDATE members SET invite = 1 WHERE id = $userId");

	if($update){
		echo 1;
	}else{
		echo 0;
	}

?>