<?php 
	function data_setting_value($db, $id){
		//querry for debug button and console debug status.
		$query = "select* from settings where id = '$id'";
		$result = $db->query($query);
		$data = $result->fetch_assoc();
		return $data['value'];
			
	}
	function data_page($db, $id){
		
		if (is_numeric($id)) {
			$cond = "where id = $id";
		} else {
			$cond = "where slug = '$id'";
		}
		
		$query = "select * from pages $cond";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		$row["content_nohtml"] = strip_tags($row["content"]);
		
		if($row["content"] == $row["content_nohtml"]){
			$row["content_formatted"] = '<p>'.$row["content"].'</p>'; //it is a safety precotion just in case content does not have html tags.
		}
		else {
			$row["content_formatted"] = $row["content"];
		}
		
		return $row;
	}

	function data_page2($db,$query){
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		return $row;
	}

	function count_array($array){
		$count = 0;
		foreach ($array as $key => $value) {
			# code...
			if ($value != null) {
				# code...
				$count++;
			}
		}
		return $count;
	}
 ?>