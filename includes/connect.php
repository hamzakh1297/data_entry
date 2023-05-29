<?php 

	$conn = mysqli_connect("localhost","root","","marriage") or die("Database Connection Failed.");


	function select($query){
		global $conn;
		$data = [];
		$select = mysqli_query($conn,$query);
		if($select){
			if(mysqli_num_rows($select) > 0){
				while($rows = mysqli_fetch_assoc($select)){
					array_push($data,$rows);
				}
			}else{
				echo "<p class='text-danger'>No Members Found!</p>";
			}
		}else{
			echo "Query Failed.";
		}
		return $data;
	}

?>