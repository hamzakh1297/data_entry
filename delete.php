<?php 
	require_once 'includes/connect.php';

	$userId = $_POST['user_id'];


	$delete = mysqli_query($conn,"DELETE FROM members WHERE id = '$userId' ");

	if($delete){
		echo "1";
	}else{
		echo "0";
	}

?>