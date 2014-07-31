<?php 

	include('../../config/connection.php');
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM pages WHERE id = $id";
	$result = $db->query($query);
	 
	if ($result) {
		 
		 echo "Page deleted";
		
	} else {
		
		echo "Page cannot be deleted because: ";
		echo mysqli_error($db).'<br>';
		echo $query;
		
	}
	
 ?>