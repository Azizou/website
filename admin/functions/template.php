<?php  
	function nav_main($db,$pageid){
		$query = "select* from navigation_bar";
    		$result = $db->query($query);
    		while ($nav = $result->fetch_assoc()) {
    			# code...
    			if (count_array($nav)>2) {
    				# code...?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nav["menu"];?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							<!--<li><a href="#"><?php echo $row["menu_item"]; ?></a></li>-->
							<?php 
								if ($nav["menu_item"] != null) {/*foreach ($row as $key => $value) {*/
									# code...
									echo '<li><a href="#">'.$nav["menu_item"].'</a></li>';
								}
								if ($nav["sub_menu_item"] != null) {/*foreach ($row as $key => $value) {*/
									# code...
									echo '<li><a href="#">'.$nav["sub_menu_item"].'</a></li>';
								}
								if ($nav["second_sub_menu_item"] != null) {
									# code...
									echo '<li><a href="#">'.$nav["second_sub_menu_item"].'</a></li>';
								}
							?>
							</ul>
						</li>
    			<?php } else {
    				# code...?>
    				<li<?php if($pageid==$nav["index"]) {echo ' class="active"';} ?>><a href="index.php?page=<?php echo $nav['index']; ?>"><?php echo $nav["menu"]; ?></a></li>
    			<?php }?>
    		<?php } //end of while.
	}//end of function.
?>