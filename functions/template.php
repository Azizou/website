<?php  
	function nav_main($db, $path){
		
		$query = "select* from pages";
    		$result = $db->query($query);
			$dropdown = array();
			
    		while ($nav = $result->fetch_assoc()) {
    			# code...
    			//if (count_array($nav)>2) {
    			if (!in_array($nav['id'], $dropdown)) {
					
				
    			if ($nav["dropdown"] != null) {
    				# code...
    				$dropdown = spliti(" ", $nav["dropdown"]); 
    				
    				$list_of_results = array();
					
					foreach ($dropdown as $value) {
						
						$data = data_page($db, $value);
						
						array_push($list_of_results,$data);
						
					}
    				
    				?>
    				
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nav["label"];?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							<!--<li><a href="#"><?php echo $row["menu_item"]; ?></a></li>-->
							<?php 

								
								foreach ($list_of_results as $value) {?>
									
									<li><a href="<?php echo $value['slug']; ?>"><?php echo $value['label'];?></a></li>
									
								<?php } // end of foreach loop.?>
							</ul>
						</li>
    			<?php } else {
    				# code...?>
    				<li<?php selected($path['call_parts'][0], $nav["slug"], ' class="active"') ?>><a href="<?php echo $nav['slug']; ?>"><?php echo $nav["label"]; ?></a></li>
    				
    			<?php }
    			
				} //end of outer if.
    			?>
    		<?php } //end of while.
	}//end of function.
?>